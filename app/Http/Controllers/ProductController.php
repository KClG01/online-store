<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Product - Online Store';
        $viewData['subtitle'] = 'Danh sách sản phẩm';
        $viewData['products'] = Product::paginate(8);
        return view('product.index')->with('viewData',$viewData);
    }
    public function show($id)
    {
        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData['title'] = $product->getName()." - Online Store";
        $viewData['subtitle'] = $product->getName(). " - Chi tiết sản phẩm";
        $viewData['product'] = $product;
        return view('product.show')->with('viewData',$viewData);
    }
}