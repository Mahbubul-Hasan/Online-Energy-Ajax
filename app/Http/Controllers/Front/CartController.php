<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.cart-products.allCart-product');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::select(["id", "name", "price", "Offer_price", "photo"])->where("id", $request->id)->first();
        
        Cart::add(
            [
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $request->quantity,
                'price' => $product->Offer_price > 0 ? $product->Offer_price : $product->price,
                'weight' => 0,
                'options' => [
                    'photo' => $product->photo,
                ]
            ]
        );

        return response()->json(Cart::count());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function cartUpdate(Request $request, $rowId)
    {
        $quantity = $request->quantity;
        Cart::update($rowId, $quantity);

        return response()->json(Cart::count());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return response()->json(Cart::count());
    }

    public function cartsRemoveAll()
    {
        Cart::destroy();
        return response()->json(Cart::count());
    }

    public function cartPriceCount()
    {
        $data["cart_count"] = Cart::count();
        $data["cart_price"] = Cart::subtotal();
        return response()->json($data);
    }
}
