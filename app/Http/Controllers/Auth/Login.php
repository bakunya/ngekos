<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

class Login extends BaseController
{
    public function index()
    {
        return view('auth.login');
    }
}
