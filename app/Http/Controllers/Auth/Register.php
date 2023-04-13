<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

class Register extends BaseController
{
    public function index()
    {
        return view('auth.register');
    }
}
