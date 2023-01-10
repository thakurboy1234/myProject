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
            $cartCount = Cart::select('prod_id')->where('user_id',$user_id)->get()->toArray();
        }else{

            $blogs = Blog::with('like')->with('comment')->with('User')->get();
        }
        // dd($blogs);

        return view('user_index', compact('blogs','products','cartCount'));
    }
}
