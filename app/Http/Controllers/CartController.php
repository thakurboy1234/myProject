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
        return response(['success'=>200,'count' =>$count]);
    }
}
