<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Kos;
use App\Models\Penyewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{

    public function index(Request $req)
    {
        $title = 'halaman dashboard';
        $belumLunas = DB::table('kontraks')
            ->where('status', 'belum lunas')
            ->count();
        $sudahLunas = DB::table('kontraks')
            ->where('status', 'sudah lunas')
            ->count();
        $kos = Kos::with('pemilik')->first();
        $kamar = Kamar::with('kos')
            ->count();
        $penyewa = Penyewa::all()->count();
        $pemilik = $req->session()->get('data_user');
        return view('dashboard/dashboard', compact('kamar', 'penyewa', 'kos', 'belumLunas', 'sudahLunas', 'title', 'pemilik'));
    }
}
