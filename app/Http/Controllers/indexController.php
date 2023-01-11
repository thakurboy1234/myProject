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
        $user_id = Auth::user()->id;
        // dd(11);
        if(Auth::check()){

            $blogs = Blog::where('user_id','!=',$user_id)->with('like')->with('comment')->with('User')->get();
            // echo gettype($cartCount);die;
        }else{

            $blogs = Blog::with('like')->with('comment')->with('User')->get();
        }
        // dd($blogs);
        $cartCount = Cart::where('user_id',$user_id)->pluck('prod_id')->toArray();
        // dd($cartCount);

        return view('user_index', compact('blogs','products','cartCount'));
    }
}
