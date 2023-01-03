<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class blogComtroller extends Controller
{
    public function createBlogForm()
    {
        // dd(11);
        return view('userBlog.createBlog');
    }

    public function store(Request $request)
    {
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

    public function like(Request $request)
    {
        // dd($request->blog_id);
        $user_id = Auth::user()->id;
        $blog_id =$request->id;
        $likeData = Like::where('user_id', $user_id)->where('blog_id', $blog_id)->first();
        // dd($likeData);
        if (!$likeData) {
            $like = 1;
            $store = new Like;
            $store->like = $like;
            $store->user_id = $user_id;
            $store->blog_id = $blog_id;
            $store->save();
            // return redirect()->back();
        } else {
            $like = $likeData->like;
            if ($like == 1) {
                $likeData->like = 0;
            } else {
                $likeData->like = 1;
            }
            $likeData->save();
        }
        $count = Like::where('like',1)->where('blog_id',$blog_id)->count();
        return response(['success'=>200,'like' =>$count]);
        // return redirect()->back();
    }

    public function comment($id){
        // dd($id);
        return view('userBlog.blogComment',compact('id'));
    }

    public function storeComment(Request $request){
        $store = new Comment;
        $store->user_id = Auth::user()->id;
        $store->blog_id = $request->blog_id;
        $store->comment = $request->comment;
        $store->save();
        return redirect()->back();
    }
}
