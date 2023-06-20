<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    function index()
    {
        $title = 'register';
        return view('auth/register', compact('title'));
    }
}
