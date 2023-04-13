<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\Register as AuthRegister;
use Illuminate\Http\Request;

class Register extends BaseController
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(AuthRegister $req)
    {
        dd($req->all());
    }
}
