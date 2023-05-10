<?php

namespace App\Http\Controllers;

use App\Traits\Logout;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    use Logout;

    public function index(Request $req)
    {
        if($req->session()->get('role') == 'penyewa') return redirect()->to(route('GET.penyewa.dashboard'));
        if($req->session()->get('role') == 'pemilik') return redirect()->to(route('GET.pemilik.dashboard'));
        
        $this->logout($req);
        abort(400);
    }
}
