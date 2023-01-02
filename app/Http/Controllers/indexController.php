<?php

namespace App\Http\Controllers;
use App\Models\blog;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class indexController extends Controller
{
    public function index()
    {
        // dd(11);
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $blogs = Blog::where('user_id','!=',$user_id)->with('like')->get();
        }else{

            $blogs = Blog::with('like')->get();
        }
        // dd($blogs);

        return view('user_index', compact('blogs'));
    }
}
