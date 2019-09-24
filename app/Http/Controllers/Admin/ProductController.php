<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["products"] = Product::with("category")->orderBy("id", "desc")->paginate(5);
        $data["categories"] = Category::all();
        return view("admin.product.product")->with($data);
    }
    
    public function getAllProduct()
    {
        $data["products"] = Product::with("category")->orderBy("id", "desc")->paginate(5);
        return view("admin.product.getAllProduct")->with($data);
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
        $validator = Validator::make($request->all(), [
            "name" => "required|min:5|max:100",
            "category_id" => "required|numeric",
            "photo" => "required",
            "code" => "required|min:2|max:20",
            "price" => "required|regex:/^\d*(\.\d{2})?$/",
            "Offer_price" => "nullable|regex:/^\d*(\.\d{2})?$/",
            "short_description" => "required",
            "long_description" => "required",
            "popular" => "required",
            "active" => "required",
        ]);

        if ($validator->fails()) 
            return response()->json($validator->errors());
        else{
            return $request->all();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with("category")->where("id", $id)->first();
        return $product;
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return response()->json("Delete");
    }
}
