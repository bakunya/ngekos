<?php

namespace App\Http\Controllers\Penyewa;

use App\Http\Controllers\Controller;
use App\Models\Penyewa;
use Illuminate\Http\Request;

class PenyewaFormView extends Controller
{
    public function create(Request $req)
    {
        return view('penyewa.basic-form', [
            'active_nav' => 'penyewa',
            'active_subnav' => 'buat-penyewa',
            'title' => 'Buat Penyewa',
            'subtitle' => 'Buat data penyewa baru',
            'current' => 'Buat Penyewa',
            'action' => route('POST.admin.penyewa.create'),
        ]);
    }

    public function update(Request $req, int $id)
    {
        $model = new Penyewa;

        return view('penyewa.basic-form', [
            'active_nav' => 'penyewa',
            'active_subnav' => 'data-penyewa',
            'title' => 'Buat Penyewa',
            'subtitle' => 'Buat data penyewa baru',
            'current' => 'Buat Penyewa',
            'action' => route('POST.admin.penyewa.update.id', ['id' => $id]),
            'curr' => $model->select("email", "fullname", "telp")->join('users', 'penyewa.id_user', 'users.id')->find($id)
        ]);
    }
}
