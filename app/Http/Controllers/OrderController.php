<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $orders = Order::all();
        return view('order.index', compact(
            "orders",
            "categories",
            "brands"
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(StoreOrderRequest $request)
    {
        // Upload Customer
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();

        // Upload Order
        $order = new Order();
        $order->total_amount = $request->total_amount;
        $order->customer_id = $customer->id;
        $order->save();

        $products = json_decode($request->product_ids, true);
        $orderProducts = [];

        foreach ($products as $product) {
            $orderItem = new OrderDetail();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $product["id"];
            $orderItem->qty = $product['qty'];
            $orderItem->price = Product::findOrFail($product["id"])->price;
            $orderItem->save();
            $item_product = (object)["item" => Product::findOrFail($product["id"]), "qty" => $product['qty']];
            array_push($orderProducts, $item_product);
        }

        // Clear Cart
        Cart::where("user_id", Auth::id())->orderBy("id", "desc")->delete();
        $carts = Cart::where("user_id", Auth::id())->orderBy("id", "desc")->get();


        //Receipt Informations
        //menus,delivery informations,

        return view('front_end.order.receipt', compact('orderProducts', 'customer', 'order', "carts"));
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Order $order)
    {
        $products = OrderDetail::where("order_id", "=", $order->id)->get();
        return view('order.show', compact('order', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->status = $request->status;
        $order->update();
        return redirect()->back()->with("message", "Status updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->back()->with("message", "Successfully deleted.");
    }
}
