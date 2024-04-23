<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\UpdateShopRequest;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
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
     * @param  \App\Http\Requests\StoreShopRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShopRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        $product = Product::findorFail($id);
        $get_12_products = Product::take(12)->get();
        $carts = Cart::where("user_id", Auth::id())->orderBy("id", "desc")->get();
        return view('front_end.shop.product_detail', compact('product', 'get_12_products', "carts"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShopRequest  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShopRequest $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
