<?php

namespace App\Http\Controllers\Kos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KosFormView extends Controller
{
    public function create()
    {
        return view('kos.basic-form', [
            'active_nav' => 'kos',
            'active_subnav' => 'buat-baru',
            'title' => 'Buat Data Kos',
            'subtitle' => 'Buat data kos baru dengan mengisi form berikut',
            'current' => 'Buat Kos'
        ]);
    }
}
