<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewData =[];
        $viewData["title"] = "Admin Page - Admin - Online Store";
        $viewData["products"] = Product::with('category')->get();
        $viewData["categories"] = Category::all();
        return view('admin.product.index')->with("viewData", $viewData); 
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
        $request->validate([
            "name" => "required|max:255",
            "description" => "required",
            "price" => "required|numeric|gt:0", 
            "image" => "image",
            "category_id" => "required|exists:categories,id"
        ]);

        // $creationData = $request->only(["name", "description", "price", "category_id"]);
        // $creationData["image"] = "game.png";
        // Product::create($creationData);

        $newProduct = new Product();
        $newProduct->setName($request->input("name"));
        $newProduct->setDescription($request->input("description"));
        $newProduct->setPrice($request->input("price"));
        $newProduct->setStock(0);
        $newProduct->setCategoryId($request->input("category_id"));
        $newProduct->setImage("game.png");
        $newProduct->save();

        if($request->hasFile("image")){
            $imageName = $newProduct->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newProduct->setImage($imageName);
            $newProduct->save();
        }
        
        return back();
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
    public function edit($id)
    {
        $viewData =[];
        $viewData["title"] = "Admin Page - Edit Product - Online Store";
        $viewData["product"] = Product::findOrFail($id);
        $viewData["categories"] = Category::all();
        return view('admin.product.edit')->with("viewData", $viewData); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required|max:255",
            "description" => "required",
            "price" => "required|numeric|gt:0", 
            "image" => "image",
            "category_id" => "required|exists:categories,id"
        ]);

        $product = Product::findOrFail($id);
        $product->setName($request->input("name"));
        $product->setDescription($request->input("description"));
        $product->setPrice($request->input("price"));
        $product->setCategoryId($request->input("category_id"));
        if($request->hasFile('image')){
            $imageName = $product->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $product->setImage($imageName);
        }
        $product->save();
        return redirect()->route('admin.product.index')->with('success', 'Đã cập nhật sản phẩm!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return back()->with('success', 'Đã xóa sản phẩm!');
    }
}