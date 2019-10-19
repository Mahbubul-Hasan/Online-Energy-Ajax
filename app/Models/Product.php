<?php

namespace App\Models;

use App\Models\Category;
use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function saveProductInfo($request, $product, $imgURL)
    {
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->code = $request->code;
        $product->price = $request->price;
        $product->Offer_price = $request->Offer_price;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->popular = $request->popular;
        $product->active = $request->active;
        $product->photo = $imgURL;

        $product->save();
    }
}
