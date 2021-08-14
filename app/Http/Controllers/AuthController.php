<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.login.index');
    }

    public function login(Request $request)
    {
        $request->validate(['email' => 'required', 'password' => 'required']);
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->intended(route('dashboard'));
        }
        return redirect(route('login'))->with('error', 'Email or Password wrong!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
