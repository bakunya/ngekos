<?php

namespace App\Http\Controllers\DashboardPenyewa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardView extends Controller
{
    public function index()
    {
        return view('dashboard.penyewa', [
            'active_nav' => 'dashboard',
        ]);
    }
}
