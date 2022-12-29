<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class blogComtroller extends Controller
{
    public function createBlogForm(){
        // dd(11);
        return view('userBlog.createBlog');
    }

    public function store(Request $request){
        // dd($request->all());
        $user_id = Auth::user()->id;
        // dd($user_id);
        $store = new blog;
        $store->user_id = $user_id;
        $store->title = $request->title;
        $store->discription = $request->discription;
        $store->save();
        return redirect()->back();
    }
}
