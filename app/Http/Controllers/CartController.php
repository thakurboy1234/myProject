<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CartController extends Controller
{
    public function addCart(Request $request){
        $user_id = Auth::user()->id;

        $store = new Cart();
        if(!is_null($request->prod_id)){

            $store->user_id = $user_id;
            $store->prod_id = $request->prod_id;
            $store->save();
        }

        $count = Cart::where('user_id',$user_id)->count();
        // dd($count);
        $removeButton = "<a class='btn btn-outline-dark mt-auto' id='remove_button".$request->prod_id."' onclick='removeCart(". $request->prod_id." )'>Remove to cart </a>";
        return response(['success'=>200,'removeButton'=>$removeButton,'count' =>$count]);
    }

    public function removeCart(Request $request){
        $user_id = Auth::user()->id;
        $cartProduct = Cart::where('user_id',$user_id)->where('prod_id',$request->prod_id)->first();
        $cartProduct->delete();
        $addButton = "<a class='btn btn-outline-dark mt-auto' id='add_button".$request->prod_id."' onclick='addCart(". $request->prod_id." )'>Add to Cart </a>";
        return response(['success'=>200,'addButton'=>$addButton,'message'=>'Remove product successfully']);
    }
}
