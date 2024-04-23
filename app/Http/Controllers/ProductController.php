<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $brands = Brand::all();

        $isFilterCategory = isset(request()->filter_category);
        $isFilterBrand = isset(request()->filter_brand);
        $isFilterStock = isset(request()->filter_stock);

        if (!$isFilterCategory && !$isFilterBrand && !$isFilterStock) {
            $products = Product::orderBy("id", "desc")->get();
            return view('product.index', compact('products', "categories", "brands"));
        } else if ($isFilterCategory && !$isFilterBrand && !$isFilterStock) {
            $category = request()->filter_category;
            $products = Product::where("category_id", "=", $category)
                ->get();
            return view('product.index', compact('products', "categories", "brands"));
        } else if (!$isFilterCategory && $isFilterBrand && !$isFilterStock) {
            $brand = request()->filter_brand;
            $products = Product::where("brand_id", "=", $brand)->get();
            return view('product.index', compact('products', "categories", "brands"));
        } else if (!$isFilterCategory && !$isFilterBrand && $isFilterStock) {
            $stock = request()->filter_stock;
            if ($stock > 0) {
                $products = Product::where("stock_qty", ">", 0)->get();
            } else {
                $products = Product::where("stock_qty", "<=", 0)->get();
            }
            return view('product.index', compact('products', "categories", "brands"));
        } else if ($isFilterCategory && $isFilterBrand && !$isFilterStock) {
            $category = request()->filter_category;
            $brand = request()->filter_brand;
            $products = Product::where("category_id", "=", $category)
                ->where("brand_id", "=", $brand)
                ->get();
            return view('product.index', compact('products', "categories", "brands"));
        } else if ($isFilterCategory && !$isFilterBrand && $isFilterStock) {
            $category = request()->filter_category;
            $stock = request()->filter_stock;

            if ($stock > 0) {
                $products = Product::where("category_id", "=", $category)->where("stock_qty", ">", 0)->get();
            } else {
                $products = Product::where("category_id", "=", $category)->where("stock_qty", "<=", 0)->get();
            }
            return view('product.index', compact('products', "categories", "brands"));
        } else if (!$isFilterCategory && $isFilterBrand && $isFilterStock) {
            $brand = request()->filter_brand;
            $stock = request()->filter_stock;

            if ($stock > 0) {
                $products = Product::where("brand_id", "=", $brand)->where("stock_qty", ">", 0)->get();
            } else {
                $products = Product::where("brand_id", "=", $brand)->where("stock_qty", "<=", 0)->get();
            }

            return view('product.index', compact('products', "categories", "brands"));
        } else if ($isFilterCategory && $isFilterBrand && $isFilterStock) {
            $category = request()->filter_category;
            $brand = request()->filter_brand;
            $stock = request()->filter_stock;

            if ($stock > 0) {
                $products = Product::where("category_id", "=", $category)->where("brand_id", "=", $brand)->where("stock_qty", ">", 0)->get();
            } else {
                $products = Product::where("category_id", "=", $category)->where("brand_id", "=", $brand)->where("stock_qty", "<=", 0)->get();
            }
            return view('product.index', compact('products', "categories", "brands"));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('product.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(StoreProductRequest $request)
    {
        // dd($request);
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        if ($request->discounted_price == null) {
            $product->discounted_price = $request->price;
        } else {
            $product->discounted_price = $request->discounted_price;
        }
        $product->brand_id = $request->brand_id;
        $product->stock_qty = $request->stock_qty;
        $product->category_id = $request->category_id;

        // Save Feature Image
        $newName = uniqid() . "_" . $request->file("feature_image")->getClientOriginalName();
        $request->file("feature_image")->storeAs('public', $newName);
        $product->feature_image = $newName;
        // dd($product);
        $product->save();

        foreach ($request->file('images') as $image) {
            $newName = uniqid() . "_" . $image->getClientOriginalName();
            $image->storeAs('public', $newName);
            $photo = new Photo();
            $photo->product_id = $product->id;
            $photo->image_url = $newName;
            $photo->save();
        }

        return redirect()->route('product.index')->with("message", "Successfully Added new Item.");
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('product.edit', compact('product', 'categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        if ($request->discounted_price == null) {
            $product->discounted_price = $request->price;
        } else {
            $product->discounted_price = $request->discounted_price;
        }
        $product->brand_id = $request->brand_id;
        $product->stock_qty = $request->stock_qty;
        $product->category_id = $request->category_id;

        if ($request->hasFile('feature_image')) {
            $newName = uniqid() . "_" . $request->file('feature_image')->getClientOriginalName();
            $request->file('feature_image')->storeAs('public', $newName);
            $product->feature_image = $newName;
            if ($request->feature_old_image != "default_image.svg") {
                Storage::delete("public/" . $request->feature_old_image);
            }
        } else {
            $product->feature_image = $request->feature_old_image;
        }
        $product->update();

        if (!is_null($request->file('images'))) {
            foreach ($request->file('images') as $image) {
                $newName = uniqid() . "_" . $image->getClientOriginalName();
                $image->storeAs('public', $newName);
                $photo = new Photo();
                $photo->product_id = $product->id;
                $photo->image_url = $newName;
                $photo->save();
            }
        }

        return redirect()->route('product.index')->with("message", "Updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Product $product)
    {
        if ($product->feature_image != "default_image.svg") {
            Storage::delete("public/" . $product->feature_image);
        }
        foreach ($product->photos as $photo) {
            Storage::delete("public/" . $photo->image_url);
            $photo->delete();
        }
        $product->delete();
        return redirect()->back();
    }
}
