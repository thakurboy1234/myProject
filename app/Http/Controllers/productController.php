<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class productController extends Controller
{
    public function index(){
        return view('products');
    }

    public function createProduct(){
        return view('addProducts');
    }
}
