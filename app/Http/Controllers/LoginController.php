<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('Login.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ]
        );


        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            $resp = array(
                'request' => $request->all(),
                'status' => 'success',
                'message' => 'Login Success',
                'url' => '/dashboard',
                'data' => Auth::user()
            );

        } else {

            $resp = array(
                'request' => $request->all(),
                'status' => 'error',
                'message' => 'Username atau Password Salah',
                'url' => redirect()->intended('/dashboard'),
                'data' => Auth::user()
            );
        }

        return json_encode($resp);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $resp = array(
            'status' => 'success',
            'message' => 'Logout Success',
            'url' => '/login'
        );

        return json_encode($resp);
    }
}
