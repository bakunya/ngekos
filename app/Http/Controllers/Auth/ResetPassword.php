<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\UseCases\ResetPasswordByRef;
use App\UseCases\VerificateUserByRef;
use Illuminate\Http\Request;

class ResetPassword extends Controller
{
    public function index(Request $req)
    {
        if(!$req->query('token')) return redirect()->to(route('GET.login'))->with('error', 'Kredensial tidak valid!');
        (new VerificateUserByRef)->run($req->query('token'));
        return view('auth.reset-password', ['token' => $req->query('token')]);
    }

    public function post_reset_password(Request $req)
    {
        if(!$req->token) return redirect()->to(route('GET.login'))->with('error', 'Kredensial tidak valid!');

        $req->validate([
            'password' => 'required|min:8',
        ]);

        $res = (new ResetPasswordByRef)->runWithDeleteCurrentSentMail($req->token, $req->password);
        if(!$res) return redirect()->to(route('GET.login'))->with('error', 'Token kadaluwarsa!');
        return redirect()->to(route('GET.login'))->with('success', 'Password berhasil diubah!');
    }
}
