<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{

    public function showRegister()
    {
        return view('admin.reg');
    }

    public function register(Request $request)
    {
        $request->validate([

            'name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|confirmed',
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('admin.login')->with('success', 'Registration successful!');
    }

    public function showLogin()
    {
        return view('admin.login');
    }

    public function doLogin(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin) {
            return redirect()->route('admin.register')->with('error', 'Admin not Found');
        }

        if ($admin && Hash::check($request->password, $admin->password)) {
            session(['admin_id' => $admin->id]);
            return redirect()->route('admin.index')->with('success', 'Login successful!');
        }
        return redirect()->route('admin.login')->with('error', 'Invalid  Password');
    }

    public function logout()
    {
        session()->forget('admin_id');
        return redirect()->route('admin.login');
    }
}
