<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data["offer_products"] = Product::select("id", "name", "photo", "price", "Offer_price")->where("active", 1)->where("Offer_price", "!=", null)->take(4)->orderBy("id", "desc")->get();
        $data["popular_products"] = Product::select("id", "name", "photo", "price", "Offer_price")->where("active", 1)->where("popular", 1)->take(4)->orderBy("id", "desc")->get();
        $data["all_products"] = Product::select("id", "name", "photo", "price", "Offer_price")->where("active", 1)->orderBy("id", "desc")->get();
        return view('front.home.home')->with($data);
    }
    public function categoryProducts($id)
    {
        $data["category"] = Category::find($id);
        $data["category_products"] = Product::select("id", "category_id", "name", "photo", "price", "Offer_price")->where("category_id", $id)->where("active", 1)->orderBy("id", "desc")->get();
        $data["offer_products"] = Product::select("id", "name", "photo", "price", "Offer_price")->where("active", 1)->where("Offer_price", "!=", null)->take(4)->orderBy("id", "desc")->get();
        return view('front.category-products.category-products')->with($data);
    }
    public function offerProducts()
    {        
        $data["offer_products"] = Product::select("id", "name", "photo", "price", "Offer_price")->where("active", 1)->where("Offer_price", "!=", null)->orderBy("id", "desc")->get();
        $data["popular_products"] = Product::select("id", "name", "photo", "price", "Offer_price")->where("active", 1)->where("popular", 1)->take(4)->orderBy("id", "desc")->get();
        return view('front.offer-products.offer-products')->with($data);
    }
    public function pooularProducts()
    {        
        $data["popular_products"] = Product::select("id", "name", "photo", "price", "Offer_price")->where("active", 1)->where("popular", 1)->orderBy("id", "desc")->get();
        $data["offer_products"] = Product::select("id", "name", "photo", "price", "Offer_price")->where("active", 1)->where("Offer_price", "!=", null)->take(4)->orderBy("id", "desc")->get();
        return view('front.popular-products.popular-products')->with($data);
    }
    public function productModal($id)
    {        
        $product = Product::find($id);
        return $product;
    }
    public function singleProduct($id)
    {        
        $data["product"] = Product::find($id);
        $data["offer_products"] = Product::select("id", "name", "photo", "price", "Offer_price")->where("active", 1)->where("Offer_price", "!=", null)->take(4)->orderBy("id", "desc")->get();
        return view('front.single-product.single-product')->with($data);
    }

    public function productSearch()
    {        
        $key = \Request::get("key");

        if ($key != null) {
            $data["offer_products"] = [];
            $data["popular_products"] = [];
            $data["all_products"] = Product::where("active", 1)
                ->where("name", "LIKE", "%$key%")
                ->orWhere("code", "LIKE", "%$key%")
                ->orWhere("price", "LIKE", "%$key%")
                ->orWhere("Offer_price", "LIKE", "%$key%")
                ->orWhere("short_description", "LIKE", "%$key%")
                ->orWhere("long_description", "LIKE", "%$key%")
                ->orderBy("id", "desc")
                ->get();
            }
            else {
                $data["offer_products"] = Product::select("id", "name", "photo", "price", "Offer_price")->where("active", 1)->where("Offer_price", "!=", null)->take(4)->orderBy("id", "desc")->get();
                $data["popular_products"] = Product::select("id", "name", "photo", "price", "Offer_price")->where("active", 1)->where("popular", 1)->take(4)->orderBy("id", "desc")->get();
                $data["all_products"] = Product::select("id", "name", "photo", "price", "Offer_price")->where("active", 1)->orderBy("id", "desc")->get();
            }
            
            // return $data;
            return view('front.home.homeProducts')->with($data);
    }
}
