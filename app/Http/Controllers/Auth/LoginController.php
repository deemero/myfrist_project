<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');

    }

    public function store(Request $request)
    {

        if(!auth()->attempt($request->only('email', 'password'))){
            // dd('fail');
            return back();
        }
        return redirect()->route("home");
        // return view('home');

        // dd('pass');

    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }


}

