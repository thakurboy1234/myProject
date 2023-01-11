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

    public function getData(Request $request){

        $draw                 =         $request->get('draw'); // Internal use
        $start                 =         $request->get("start"); // where to start next records for pagination
        $rowPerPage         =         $request->get("length"); // How many recods needed per page for pagination

        $orderArray        =         $request->get('order');
        $columnNameArray     =         $request->get('columns'); // It will give us columns array

        $searchArray         =         $request->get('search');
        $columnIndex         =         $orderArray[0]['column'];  // This will let us know,
        // which column index should be sorted
        // 0 = id, 1 = name, 2 = email , 3 = created_at

        $columnName         =         $columnNameArray[$columnIndex]['data']; // Here we will get column name,
        // Base on the index we get

        $columnSortOrder     =         $orderArray[0]['dir']; // This will get us order direction(ASC/DESC)
        $searchValue         =         $searchArray['value']; // This is search value

        $products = Product::get();
        $total = $products->count();
        $totalFilter = $total;
        $arrData = $products;

        $response = array(
            "draw" => intval($draw),
            "recordsTotal" => $total,
            "recordsFiltered" => $totalFilter,
            "data" => $arrData,
        );
        return response()->json($response);
    }
}
