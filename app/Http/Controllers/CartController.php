<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $total = 0;
        $productInCart = [];
        $productInSession = $request->session()->get("products");
        if($productInSession){
            $productInCart = Product::findMany(array_keys($productInSession));
            $total = Product::sumPriceByQuantities($productInCart, $productInSession);
        }
        
        $viewData = [];
        $viewData["title"] = "Cart - Online Store";
        $viewData["total"] = $total;
        $viewData["products"] = $productInCart;
        
        return view("cart.index")->with("viewData", $viewData);
    }

    public function add(Request $request, $id){
        $product = $request->session()->get("products");
        $product[$id] = $request->input("quantity");
        $request->session()->put("products", $product);

        return redirect()->route("cart.index");
    }

    public function delete(Request $request){
        $request->session()->forget("products");
        return back();
    }
    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}