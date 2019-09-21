<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    function saveCategoryInfo($request, $category)
    {
        $category->name = $request->name;
        $category->description = $request->description;
        $category->active = $request->active;

        $category->save();
    }
}
