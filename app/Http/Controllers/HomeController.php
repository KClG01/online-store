<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $viewData =[];
        $viewData["title"] = "Trang chủ - Online Shop";
        return view("home.index")->with("viewData", $viewData);
    }
    
    public function about()
    {
        $viewData =[];
        $viewData["title"] = "Giới thiệu - Online Shop";
        $viewData["subtitle"] = "Giới thiệu";
        $viewData["description"] = "Đây là trang about";
        $viewData["author"] = "Phát triển bởi: OnlyU";
        return view("home.about")->with("viewData", $viewData);
    }
    public function login()
    {
        $viewData =[];
        $viewData["title"] = "Đăng nhập";
        $viewData["subtitle"] = "Đăng nhập";
        return view("home.login")->with("viewData", $viewData);
    }
    public function register()
    {
        $viewData =[];
        $viewData["title"] = "Đăng ký tài khoản";
        $viewData["subtitle"] = "Đăng ký";
        return view("home.register")->with("viewData", $viewData);
    }
}