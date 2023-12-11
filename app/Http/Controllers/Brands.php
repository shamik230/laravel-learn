<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\Brands\Store as StoreRequest;
use App\Http\Requests\Brands\Update as UpdateRequest;

class Brands extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::orderBy('title')->get();
        return view("brands.index", compact("brands"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("brands.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $brand = Brand::create($request->validated());
        return redirect()->route("brands.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return view("brands.show", compact("brand"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view("brands.edit", compact("brand"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Brand $brand)
    {
        $brand->update($request->validated());
        return redirect()->route("brands.show", $brand);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route("brands.index");
    }
}
