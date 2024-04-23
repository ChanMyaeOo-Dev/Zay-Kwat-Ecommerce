<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $carts = Cart::where("user_id", Auth::id())->orderBy("id", "desc")->get();
        return view('front_end.carts.index', compact("carts"));
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
     */
    public function store(StoreCartRequest $request)
    {
        $cart = new Cart();
        $cart->product_id = $request->product_id;
        if (is_null($request->qty)) {
            $cart->qty = 1;
        } else {
            $cart->qty = $request->qty;
        }
        $cart->user_id = Auth::id();
        $cart->save();
        return redirect()->back()->with("message", "Successfully Added to cart.");
        // return redirect()->route('shop.index')->with("message", "Successfully Added to cart.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        if ($request->cart_qty_update > 0) {
            $cart->qty = $request->cart_qty_update;
            $cart->update();
        } else {
            $cart->delete();
        }
        return redirect()->back()->with("message", "Updated Successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->back()->with("message", "Deleted Successfully.");
    }
}
