<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
        ]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:3|max:255',
        ]);

        if ($validator->fails()) {
            return redirect(route('login'))->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        } else {
            return redirect(route('login'))->with('failed', "Email atau Password Tidak Ditemukan!");
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect(route('login'))->with('success', 'Berhasil Logout Akun!');
        } catch (\Exception $e) {
            logger($e->getMessage());
            return redirect(route('dashboard'))->with('failed', 'Gagal Logout Akun!');
        }
    }
}
