<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Country;
use App\Models\Stats;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthenticationController extends Controller
{
    public function register(Request $request)
    {
        $countries = Country::all();
        $states = Stats::all();
        return view('register',compact('countries','states'));
    }

    public function storeUser(RegisterRequest $request)
    {
        // $request->validate([
        //     'First_name' => 'required|max:250|string',
        //     'Last_name' => 'required|max:250|string',
        //     'email' => 'required|max:255|unique:useres,email',
        //     'password' => 'required|min:6',
        //     'contact' => 'required|numeric',
        //     'gender' => 'in:Male,Female,Other',
        //     'address' => 'string',
        //     'country' => 'required|exists:countries,id',
        //     'state' => 'required|exists:states,id',
        //     'profile' => 'mimes:jpg,jpeg,png'

        // ]);
        $requestData = $request->except(['_token','regist']);
        $imgName = 'lv_'. rand() . '.' . $request->profile->extension();
        $request->profile->move(public_path('profile'),$imgName);
        $requestData['profile'] = $imgName;
        $requestData['password'] = Hash::make($request->password);
        $requestData['role_id'] = User::USER_ROLE;
        $store = User::create($requestData);
        return redirect()->route('home');
    }

    public function login(Request $request)
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credencials = $request->only('email','password');
        if(Auth::attempt($credencials)){
            return redirect()->intended('/');
        }else{
            return redirect()->intended('login');
        }

    }

    public function forgot_password(Request $request)
    {
        return view('forgot_password');
    }

    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
