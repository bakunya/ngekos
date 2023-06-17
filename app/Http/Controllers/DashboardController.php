<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Kos;
use App\Models\Pemilik;
use App\Models\Penyewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class DashboardController extends Controller
{
    public function index()
    {
        $belumLunas = DB::table('transaksis')
            ->where('status', 'belum lunas')
            ->count();
        $sudahLunas = DB::table('transaksis')
            ->where('status', 'sudah lunas')
            ->count();
        $kos = Kos::with('pemilik')->first();
        $kamar = Kamar::with('kos')
            ->count();
        $penyewa = Penyewa::all()->count();
        return view('dashboard/dashboard', compact('kamar', 'penyewa', 'kos', 'belumLunas', 'sudahLunas'));
    }
}
