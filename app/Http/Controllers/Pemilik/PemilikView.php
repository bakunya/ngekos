<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use App\Models\Pemilik;
use Illuminate\Http\Request;

class PemilikView extends Controller
{
    public function index(Request $req)
    {
        $model = new Pemilik;

        return view('pemilik.table', [
            'subtitle' => 'Semua admin yang terdaftar',
            'current' => 'Admin',
            'active_nav' => 'pemilik',
            'title' => 'Daftar Admin',
            'active_subnav' => 'data-pemilik',
            'pemilik' => $model->paginate(20),
        ]);
    }
}
