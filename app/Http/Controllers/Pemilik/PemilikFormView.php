<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use App\Models\Pemilik;
use Illuminate\Http\Request;

class PemilikFormView extends Controller
{
    public function create(Request $req)
    {
        return view('pemilik.basic-form', [
            'active_nav' => 'pemilik',
            'active_subnav' => 'buat-pemilik',
            'title' => 'Buat Admin',
            'subtitle' => 'Buat data admin baru',
            'current' => 'Buat Admin',
            'action' => route('POST.admin.pemilik.create'),
        ]);
    }

    public function update(Request $req, int $id)
    {
        $model = new Pemilik;

        return view('pemilik.basic-form', [
            'active_nav' => 'pemilik',
            'active_subnav' => 'data-pemilik',
            'title' => 'Buat Admin',
            'subtitle' => 'Buat data admin baru',
            'current' => 'Buat Admin',
            'action' => route('POST.admin.pemilik.update.id', ['id' => $id]),
            'curr' => $model->select("email", "fullname", "telp", "alamat", "nik")->join('users', 'pemilik.id_user', 'users.id')->first($id)
        ]);
    }
}
