<?php

namespace App\Models;

use App\Models\User;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Facades\Cart;

class Order extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(OrderProduct::Class);
    }

    public function saveOrderInfo($order, $request)
    {
        
        $order->user_id = Auth::user()->id;
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->location = $request->location;
        $order->address = $request->address;

        $subtotal =  preg_replace("/([^0-9\\.])/i", "", Cart::subtotal());
        $order->totalPrice = $subtotal + ($request->location * Cart::count());

        $order->save();

        return $order;
    }

}
