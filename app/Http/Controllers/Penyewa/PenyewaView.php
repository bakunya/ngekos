<?php

namespace App\Http\Controllers\Penyewa;

use App\Http\Controllers\Controller;
use App\Models\Penyewa;
use Illuminate\Http\Request;

class PenyewaView extends Controller
{
    public function index(Request $req)
    {
        $model = new Penyewa;

        return view('penyewa.table', [
            'subtitle' => 'Semua penyewa yang terdaftar',
            'current' => 'Penyewa',
            'active_nav' => 'penyewa',
            'title' => 'Daftar Penyewa',
            'active_subnav' => 'data-penyewa',
            'penyewa' => $model->paginate(20),
        ]);
    }
}
