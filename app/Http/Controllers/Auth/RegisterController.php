<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        // dd($request);
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => [
                'required',
                'string',
                'confirmed',
                'min:8',
                // 'regex:/[a-z]/',
                // 'regex:/[A-Z]/',
                // 'regex:[@$!%*#?&]',

            ],
            'password_confirmation' => 'required|same:password'
        ]);


            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),




    ]);

    if(!auth()->attempt($request->only('email', 'password'))){
        dd('fail');
        return back();
    }

    return redirect()->route('home');


    }

}
