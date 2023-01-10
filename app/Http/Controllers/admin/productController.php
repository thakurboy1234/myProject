<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class productController extends Controller
{
    public function index()
    {
        $productData = Product::get();
        // dd($productData);
        return view('Admin.product.products', compact('productData'));
    }

    public function createProduct()
    {
        return view('Admin.product.createProduct');
    }

    public function storeProduct(ProductRequest $request)
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
        return redirect(route('admin.products'))->with('messege', 'Product stored successfully');
    }

    public function edit($id)
    {
        // dd($id);
        $product = Product::where('id', $id)->first();
        // dd($product);
        return view('Admin.product.editProduct', compact('product'));
    }

    public function update(ProductRequest $request)
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
        return redirect(route('Admin.product.products'))->with('messege', 'Product stored successfully');

    }

    public function delete(Request $request){
        // dd($id);
        $product = Product::find($request->id);
        $product->delete();
        $messege = 'Record deleted successfully';
        return response(['success' => true,'messege'=> $messege]);
    }
    public function table(){

        return view('Admin.table');
    }
}
