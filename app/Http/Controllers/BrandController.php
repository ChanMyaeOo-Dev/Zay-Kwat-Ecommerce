<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $brands = Brand::all();
        return view('brand.index', compact("brands"));
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
    public function store(StoreBrandRequest $request)
    {
        $brand = new Brand();
        $brand->name = $request->brand_name;
        $brand->save();
        return redirect()->route('brands.index')->with("message", "Successfully added new brand.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Brand $brand)
    {
        return view('brand.edit', compact("brand"));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $brand->name = $request->brand_name;
        $brand->update();
        return redirect()->route('brands.index')->with("message", "Successfully updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->back();
    }
}
