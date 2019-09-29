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
        $date["offer_products"] = Product::select("id", "name", "photo", "price", "Offer_price")->where("active", 1)->where("Offer_price", "!=", null)->take(4)->orderBy("id", "desc")->get();
        $date["popular_products"] = Product::select("id", "name", "photo", "price", "Offer_price")->where("active", 1)->where("popular", 1)->take(4)->orderBy("id", "desc")->get();
        $date["all_products"] = Product::select("id", "name", "photo", "price", "Offer_price")->where("active", 1)->orderBy("id", "desc")->get();
        return view('front.home.home')->with($date);
    }
    public function categoryProducts($id)
    {
        $date["category"] = Category::find($id);
        $date["category_products"] = Product::select("id", "category_id", "name", "photo", "price", "Offer_price")->where("category_id", $id)->where("active", 1)->orderBy("id", "desc")->get();
        $date["offer_products"] = Product::select("id", "name", "photo", "price", "Offer_price")->where("active", 1)->where("Offer_price", "!=", null)->take(4)->orderBy("id", "desc")->get();
        return view('front.category-products.category-products')->with($date);
        return $date;
    }
}
