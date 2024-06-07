<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert; // Import the Alert facade

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        // dd($request);
        $validate = $request->only('email_user', 'password');

        if (Auth::attempt($validate)) {
            $request->session()->regenerate();
            $role = Auth::user()->role;
            if (Auth::user()->role == 'admin') {
                return redirect('/admin')->with('success','login berhasil, selamat datang '. $role);
            } elseif (Auth::user()->role == 'satpam') {
                return redirect('/satpam')->with('success','login berhasil, selamat datang ' . $role);
            } else {
                return redirect('/')->withErrors(['error' => 'Role tidak valid.']);
            }
        }

        return redirect('/')->withErrors(['error' => 'Email atau password salah.']);
    }


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
