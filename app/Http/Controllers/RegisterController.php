<?php

namespace App\Http\Controllers;

use App\Models\Pemilik;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    function index()
    {
        $title = 'register';
        return view('auth/register', compact('title'));
    }
    function store(Request $request)
    {
        $title = 'register';
        $pemilik = new Pemilik;
        $pemilik->nama = $request->nama;
        $pemilik->email = $request->email;
        $pemilik->alamat = $request->alamat;
    }
}
