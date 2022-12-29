<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Stats;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function userProfile(Request $request)
    {
        $user = auth()->user();
        // dd($user['profile']);
        $countries = Country::all();
        $states = Stats::all();
        return view('user_profile', compact('user','countries','states'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        // dd($user);
        $id = $user['id'];
        // dd($id);
        $user = User::find($id);
        // dd($user);
        $user->First_name = $request->input('First_name');
        $user->Last_name = $request->input('Last_name');
        $user->email = $request->input('email');
        $user->contact = $request->input('contact');
        $user->address = $request->input('address');
        $user->address = $request->input('address');
        // $user->password = $request->input('password');
        $user->update();
        return redirect()->back();
    }


}
