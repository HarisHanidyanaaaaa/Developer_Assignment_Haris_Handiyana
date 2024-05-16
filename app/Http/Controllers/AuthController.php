<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function hash()
    {
        $hash_password_saya = Hash::make('test');
        echo $hash_password_saya;
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required']
        ]);

       

        return back()->with('loginError', 'Login failed');
    }

    public function check(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->intended('/Master-Obat-Index');
        } else {
            return back()->with('error', 'Email Atau Password Salah.');
        }
    }
    public function logout()
    {
        Auth::logout();
        return view('login');
    }
    public function Info()
    {
        $user = User::all();
        return view('Layout.head', 'Layout.side', 'Layout.footer')->with(
            'user',
            $user
        );
    }
   
   
}
