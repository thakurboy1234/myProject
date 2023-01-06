<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class productController extends Controller
{
    public function index()
    {
        $productData = Product::get();
        // dd($productData);
        return view('products', compact('productData'));
    }

    public function createProduct()
    {
        return view('product.createProduct');
    }

    public function storeProduct(Request $request)
    {
        // dd($request);
        // echo "<pre>";
        // print_r($request);
        // exit;

        $requestData = new Product;
        $imgName = 'prod_' . rand() . '.' . $request->file('productImage')->extension();
        // dd($imgName);
        $request->productImage->move(public_path('productImage'), $imgName);
        $requestData->image = $imgName;
        $requestData->name = $request->productName;
        $requestData->price = $request->productPrice;
        $requestData->save();
        return redirect(route('products'))->with('messege', 'Product stored successfully');
    }

    public function edit($id)
    {
        // dd($id);
        $product = Product::where('id', $id)->first();
        // dd($product);
        return view('product.editProduct', compact('product'));
    }

    public function update(Request $request)
    {
        // dd($request);
        $product = Product::find($request->id);
        // dd($request->productImage);
        if ($request->productImage) {
            if (file_exists(public_path('productImage/' . $product->image))) {
                unlink(public_path('productImage/' . $product->image));
            }
            $imgName = 'prod_' . rand() . '.' . $request->productImage->extension();
            // dd($imgName);
            $request->productImage->move(public_path('productImage'), $imgName);
            $product->image = $imgName;
        }
        $product->name = $request->productName;
        $product->price = $request->productPrice;
        $product->update();
        return redirect(route('products'))->with('messege', 'Product stored successfully');
        // if(is_null($request->input('profileImage'))){
        //     $product->image = $product->image;
        // }else{
        //     if (file_exists(public_path('productImage/'.$product->image ))){
        //         dd(11);
        //     // unlink(public_path());
        // }
        // }
        // $product->name = $request->input('productName');
        // $product->price = $request->input('productPrice');
    }
}
