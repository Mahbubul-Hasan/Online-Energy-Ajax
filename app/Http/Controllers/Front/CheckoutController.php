<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function checkoutView()
    {
        $data["cart_count"] = Cart::count();
        $data["cart_products"] = Cart::content();

        return view("front.checkout.checkout")->with($data);
    }
}
