<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\Logout as TraitsLogout;
use Illuminate\Http\Request;

class Logout extends Controller
{
    use TraitsLogout;

    public function index(Request $req)
    {
        $this->logout($req);
        return redirect()->to(route('GET.login'));
    }
}
