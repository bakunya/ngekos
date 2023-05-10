<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\SendMail;
use Illuminate\Http\Request;

class ForgotPassword extends Controller
{   
    use SendMail;

    public function index(Request $req)
    {
        return view('auth.forgot-password');
    }

    public function post_forgot_password(Request $req)
    {
        $req->validate([ 'email' => 'required|email' ]);

        $user = User::where('email', $req->email)->first();
        if(!$user) return back()->with('error', 'Email tidak terdaftar');

        $this->sendMail(
            to: $user->email,
            subject: 'Reset Password',
            view: 'mail.forgot-password',
            view_data: [
                'name' => $user->fullname,
                'email' => $user->email,
                'password' => $user->password,
            ],
            expired: now()->addHours(3),
            user_id: $user->id,
            from_admin: false,
        );

        return back()->with('success', 'Email reset password telah dikirim');
    }
}
