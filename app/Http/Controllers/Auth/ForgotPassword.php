<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPassword extends BaseController
{
    public function index()
    {
        return view('auth.forgot-password');
    }
}
