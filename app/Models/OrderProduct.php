<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function saveOrderProductInfo($orderProduct, $cart, $order)
    {
        $orderProduct->order_id = $order->id;
        $orderProduct->product_id = $cart->id;
        $orderProduct->quantity = $cart->qty;

        $orderProduct->save();
    }
}
