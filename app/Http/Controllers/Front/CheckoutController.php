<?php

namespace App\Http\Controllers\Front;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function checkoutView()
    {
        $data["cart_count"] = Cart::count();
        $data["cart_products"] = Cart::content();

        return view("front.checkout.checkout")->with($data);
    }

    public function checkout(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'phone' => 'required|numeric|regex:/\+?(88)?0?1[2-9][0-9]{8}\b/',
            'email' => 'required|email',
            'location' => 'required',
            'address' => 'required',
        ]);

        if ($validator->fails()) 
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        else {
            $order = new Order();
            $order = $order->saveOrderInfo($order, $request);
            
            foreach (Cart::content() as $cart) {
                $orderProduct = new OrderProduct();
                $orderProduct->saveOrderProductInfo($orderProduct, $cart, $order);
            }

            Cart::destroy();
            return redirect()->route("/");
        }
    }
}
