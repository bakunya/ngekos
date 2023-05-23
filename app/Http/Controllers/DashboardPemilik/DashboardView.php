<?php

namespace App\Http\Controllers\DashboardPemilik;

use App\Http\Controllers\Controller;

class DashboardView extends Controller
{
    public function index()
    {        
        return view('dashboard.pemilik', [
            'active_nav' => 'dashboard',
        ]);
    }
}
