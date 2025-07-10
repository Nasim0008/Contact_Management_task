<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AdminLoginController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function doLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = 'admin';
        $password = 'admin';

        if ($request->username === $username && $request->password === $password) {
            $request->session()->put('is_admin_logged_in', true);
            return redirect()->route('admin.index');
        }

        return redirect()->route('admin.login')->with('error', 'Invalid Username or Password');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('is_admin_logged_in');
        return redirect()->route('admin.login');
    }
}
