<?php

namespace App\Http\Controllers;
use App\Models\blog;
use App\Models\Cart;
use App\Models\Like;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class indexController extends Controller
{
    public function index()
    {
        $products = Product::paginate(4);

        // dd(11);
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $blogs = Blog::where('user_id','!=',$user_id)->with('like')->with('comment')->with('User')->get();
            // echo gettype($cartCount);die;
            $cartCount = Cart::where('user_id',$user_id)->pluck('prod_id')->toArray();
            return view('user_index', compact('blogs','products','cartCount'));
        }else{

            $blogs = Blog::with('like')->with('comment')->with('User')->get();
            return view('user_index', compact('blogs','products'));
        }
        // dd($blogs);

        // dd($cartCount);


    }
}
