<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Keyword;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $carts = Cart::where("user_id", Auth::id())->orderBy("id", "desc")->get();
        $categories = Category::all();
        $get_6_categories = Category::take(6)->get();
        $get_6_products = Product::take(6)->get();
        $get_12_products = Product::take(12)->get();
        $brands = Brand::all();
        $feature_product = Product::latest()->first();

        if (!isset(request()->search)) {
            $products = Product::orderBy("id", "desc")->paginate(12);
            return view('front_end.shop.index', compact('products', "feature_product", "categories", "get_6_categories", "get_12_products", "get_6_products", "brands", "carts"));
        } else {
            $search = request()->search;
            $products = Product::where(function ($query) use ($search) {
                $query->where("name", "like", "%$search%")
                    ->orWhere("description", "like", "%$search%");
            })->paginate(12);
            return view('front_end.shop.index', compact('products', 'feature_product', "categories", "get_6_categories", "get_12_products", "get_6_products", "brands", "carts", 'search'));
        }
    }
    public function show($id)
    {
        $product = Product::findorFail($id);
        $get_12_products = Product::take(12)->get();
        $carts = Cart::where("user_id", Auth::id())->orderBy("id", "desc")->get();
        return view('front_end.shop.product_detail', compact('product', 'get_12_products', "carts"));
    }
    // public function search(Request $request)
    // {
    //     $query = $request->input('query');

    //     $keywords = Keyword::where('value', 'like', "%$query%")->get();

    //     return response()->json($keywords);
    // }
    public function search(Request $request)
    {
        $query = Product::query();

        // Search by category
        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Search by title
        if ($request->has('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        // Search by brand
        if ($request->has('brand_id')) {
            $query->where('brand_id', $request->brand_id);
        }

        // Search by keywords
        if ($request->has('keywords')) {
            $keywords = explode(',', $request->keywords);
            foreach ($keywords as $keyword) {
                $query->where('keywords', 'like', '%' . $keyword . '%');
            }
        }

        $products = $query->take(10)->get();

        return response()->json($products);
    }
    public function products($keyword)
    {
        $carts = Cart::where("user_id", Auth::id())->orderBy("id", "desc")->get();

        $results = Keyword::where("value", $keyword)->pluck("product_id");
        $products = Product::whereIn('id', $results)->paginate(18);
        return view('front_end.shop.products', compact('carts', 'products'));
    }
}
