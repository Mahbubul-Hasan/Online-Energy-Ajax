<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
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
            "name" => "required|min:5|max:100|unique:products",
            "category_id" => "required|numeric",
            "photo" => "required|max:1024",
            "code" => "required|min:2|max:20|unique:products",
            "price" => "required|regex:/^\d*(\.\d{2})?$/",
            "Offer_price" => "nullable|regex:/^\d*(\.\d{2})?$/",
            "short_description" => "required",
            "long_description" => "required",
            "popular" => "required",
            "active" => "required",
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());
        else {

            $photo = $request->file("photo");

            $imgURL = $this->saveImage($photo);

            $product = new Product();
            $product->saveProductInfo($request, $product, $imgURL);

            return response()->json("seccess");
        }
    }


    function saveImage($photo)
    {
        $folder = "asset/admin/img/products/";
        $name = "IMG_" . date("Ymd_his") . "." . $photo->getClientOriginalExtension();

        Image::make($photo)->resize(640, 480)->save($folder . $name);

        $imgURL = $folder . $name;
        return $imgURL;
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
        $product = Product::with("category")->where("id", $id)->first();
        return $product;
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
            "name" => "required|min:5|max:100|unique:products,name," . $id,
            "category_id" => "required|numeric",
            "photo" => "nullable|max:1024",
            "code" => "required|min:2|max:20|unique:products,name," . $id,
            "price" => "required|regex:/^\d*(\.\d{2})?$/",
            "Offer_price" => "nullable|regex:/^\d*(\.\d{2})?$/",
            "short_description" => "required",
            "long_description" => "required",
            "popular" => "required",
            "active" => "required",
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());
        else {
            $product = Product::find($id);

            if ($photo = $request->file("photo")) {

                if (file_exists($product->photo)) {
                    unlink($product->photo);
                }
                $imgURL = $this->saveImage($photo);
            } else
                $imgURL = $product->photo;

            $product->saveProductInfo($request, $product, $imgURL);

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
        $product = Product::find($id);
        if (file_exists($product->photo)) {
            unlink($product->photo);
        }
        $product->delete();

        return response()->json("Delete");
    }

    public function productSearch()
    {
        $key = \Request::get("key");

        if ($key != null) {
            $data["products"] = Product::with("category")->where("name", "LIKE", "%$key%")
                ->orWhere("code", "LIKE", "%$key%")
                ->orWhere("price", "LIKE", "%$key%")
                ->orWhere("Offer_price", "LIKE", "%$key%")
                ->orWhere("short_description", "LIKE", "%$key%")
                ->orWhere("long_description", "LIKE", "%$key%")
                ->orWhere("long_description", "LIKE", "%$key%")
                ->orderBy("id", "desc")
                ->paginate(10);
        } else
            $data["products"] = Product::with("category")->orderBy("id", "desc")->paginate(5);

        return view("admin.product.getAllProduct")->with($data);
    }
}
