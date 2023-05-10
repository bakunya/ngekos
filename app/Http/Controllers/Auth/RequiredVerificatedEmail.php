<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\SendMail;
use Illuminate\Http\Request;

class RequiredVerificatedEmail extends Controller
{
    use SendMail;

    public function index(Request $request)
    {
        return view('auth.required-verificated-email');
    }

    public function post_required_verificated_email(Request $req)
    {
        $this->sendMail(
            to: $req->session()->get('email'),
            subject: 'Verifikasi Email',
            view: 'mail.verify-mail',
            view_data: [
                'name' => $req->session()->get('fullname'),
                'email' => $req->session()->get('email'),
            ],
            expired: now()->addHours(3),
            user_id: $req->session()->get('id_user'),
            from_admin: false,
        );

        return redirect()->to(route('GET.required-verificated-email'))->with('success', 'Email verifikasi telah dikirim');
    }
}
