<?php

namespace App\Http\Controllers;

use App\Models\Pemilik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // public function __construct()
    // {
    //     Auth::shouldUse('pemilik');
    // }

    function index()
    {
        $title = 'register';
        return view('auth/register', compact('title'));
    }

    function store(Request $request)
    {
        $pemilik = new Pemilik;
        $pemilik->nama = $request->nama;
        $pemilik->email = $request->email;
        $pemilik->alamat = $request->alamat;
        $pemilik->password = Hash::make($request->password);

        $pemilik->save();
        return redirect('/login');
    }

    function login()
    {
        return view('auth/login');
    }

    function authenticate(Request $req)
    {
		if (!Auth::attempt($req->only('email', 'password'))) return back()->with('error', 'Password atau Email salah');
		$req->session()->put('data_user', Auth::user());
		return redirect()->intended('/dashboard');
    }

    function logout()
    {
        Auth::logout();
        Session::forget('data_user');
        return redirect('/login');
    }
}
