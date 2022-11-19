<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }
    public function register()
    {
        return view('register');
    }
    public function registerPost(Request $request)
    {
        $validate = $request->validate([
            "name" => 'required|between:2,40' ,
            "username" => 'required|between:2,40|unique:users,username' ,
            "family" => 'required|between:3,40' ,
            "phone" => 'required|unique:users,phone' ,
            "email" => 'nullable|unique:users,email' ,
            "password" => 'required' ,
        ]);

        $pass = Hash::make($validate['password']);
        unset($validate['password']);
        $validate['password'] = $pass;

        $user = User::create($validate);

        auth()->loginUsingId($user->id);

        // return redirect()->route('portal');
        return back();
    }
    public function login()
    {
        return view('login');
    }
    public function loginPost(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required|between:3,70' ,
            'password' => 'required|min:8|max:100'
        ]);

        if (filter_var($validate['username'], FILTER_VALIDATE_EMAIL) ) {
            if(Auth::attempt([ 'email' => $validate['username'], 'password' => $validate['password'] ]))
            {
                request()->session()->regenerate();

                if (auth()->user()->isAdmin == 1)
                    return redirect()->intended('/admin');
                else
                    return redirect()->intended('/portal');
            }
            else {
                    $request->validate([
                        'username' => 'exists:users,email'
                    ],
                [
                    'username.exists' => 'ایمیل انتخاب شده، معتبر نیست.'
                ]);
            }
        }
        else {
            if(Auth::attempt([ 'username' => $validate['username'], 'password' => $validate['password'] ]))
            {
                request()->session()->regenerate();

                if (auth()->user()->isAdmin == 1)
                    return redirect()->intended('/admin');
                else
                    return redirect()->intended('/portal');

            }else {
                $request->validate([
                    'username' => 'exists:users,username'
                ]);
            }
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('home');
    }
}
