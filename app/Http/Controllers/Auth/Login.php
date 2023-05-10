<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\Logout;
use App\UseCases\VerificateUserByRef;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    use Logout;

    public function index(Request $req)
    {  
        if($req->query('ref')) (new VerificateUserByRef)->runWithDeleteCurrentSentMail($req->query('ref'));
        return view('auth.login');
    }

    public function login(Request $req)
    {
        if (!Auth::attempt($req->only('email', 'password'))) return back()->with('error', 'Password atau Email salah');

        $req->session()->put('id_user', Auth::user()->id);
        $req->session()->put('email', Auth::user()->email);
        $req->session()->put('fullname', Auth::user()->fullname);

        if(!empty(Auth::user()->pemilik)) {
            $req->session()->put('role', 'pemilik');
            return redirect()->to('dashboard');
        }

        if(!empty(Auth::user()->penyewa)) {
            $req->session()->put('role', 'penyewa');
            return redirect()->to('dashboard');
        }

        $this->logout($req);
        abort(400);
    }
}
