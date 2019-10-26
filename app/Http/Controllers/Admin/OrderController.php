<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Mail\OrderStatusMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["orders"] = Order::with("user")->orderBy("id", "DESC")->paginate(5);
        $data["orderProducts"] = "";
        return view("admin.order.order")->with($data);
    }
    public function allOrder()
    {
        $data["orders"] = Order::with("user")->orderBy("id", "DESC")->paginate(5);
        return view("admin.order.allOrder")->with($data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data["orderProducts"] = OrderProduct::with("product")->where("order_id", $id)->orderBy("id", "DESC")->get();
        return view("admin.order.orderProducts")->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return response()->json($order);
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
        $validator = Validator::make($request->all(), [
            "name" => "required",
            'phone' => 'required|numeric|regex:/\+?(88)?0?1[2-9][0-9]{8}\b/',
            "email" => "required|email",
            "location" => "required",
            "address" => "required",
            "totalPrice" => "required||regex:/^\d*(\.\d{2})?$/",
            "status" => "required",
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors());
        }
        else {
            $order = Order::with("user")->where("id", $id)->first();
            $order->saveOrderInfoByAdmin($request, $order);
            
            Mail::to($order->user->email)->queue(new OrderStatusMail($order->user, $order));
            return response()->json("seccess");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return response()->json("delete");
    }
}
