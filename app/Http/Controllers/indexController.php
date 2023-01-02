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
        $count = Like::where('like','=','1')->count();
        // dd($count);
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $blogs = Blog::where('user_id','!=',$user_id)->get();
        }else{

            $blogs = Blog::all();
        }
        // dd($blogs);

        return view('user_index', compact('blogs','count'));
    }
}
