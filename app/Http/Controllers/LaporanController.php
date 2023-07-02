<?php

namespace App\Http\Controllers;

use App\Models\Kontrak;
use App\Models\Kos;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    private $filteredKontrak;
    public function index()
    {
        $title = 'Halaman Laporan';
        $pemilik = Session::get('data_user'); // sesion user login
        $kos = Kos::where('pemilik_id', $pemilik->id)->paginate(6);
        $kontrak = Kontrak::with('penyewa', 'kamar')->get();
        return view('laporan/laporan', compact('kontrak', 'title', 'kos'));
    }

    public function laporan_pdf(Request $request)
    {
        $title = 'Halaman Laporan';
        $kos = Kos::all();
        $kontrak = session('filteredKontrak');

        $html = View('laporan/laporan_cetak', compact('kontrak', 'title', 'kos'))->render();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('invoice.pdf', ['Attachment' => false]);
    }

    public function cari(Request $request)
    {
        $title = 'Halaman Laporan';
        $cari = $request->cari;
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $filter_kos = $request->filter_kos;
        $kos = Kos::all();

        $kontrak = Kontrak::with('penyewa', 'kamar');

        if ($bulan) {
            $kontrak->whereMonth('tgl_bayar', $bulan);
        }
        if ($tahun) {
            $kontrak->whereYear('tgl_bayar', $tahun);
        }
        if ($filter_kos) {
            $pemilik = Session::get('data_user'); // session user login
            $kontrak->whereHas('kamar', function ($query) use ($filter_kos) {
                $query->where('kos_id', $filter_kos);
            });
        }

        if ($cari) {
            // Cek apakah sudah dilakukan filter
            $isFiltered = ($bulan || $tahun || $filter_kos);

            $kontrak->where(function ($query) use ($cari, $isFiltered) {
                $query->where(function ($query) use ($cari) {
                    $query->whereHas('penyewa', function ($query) use ($cari) {
                        $query->where('nama', 'like', '%' . $cari . '%');
                    })
                        ->orWhereHas('kamar', function ($query) use ($cari) {
                            $query->where('nama', 'like', '%' . $cari . '%');
                        });
                });

                // Jika sudah dilakukan filter, tambahkan kondisi tambahan
                if ($isFiltered) {
                    $query->orWhere(function ($query) use ($cari) {
                        $query->where('tgl_bayar', 'like', '%' . $cari . '%');
                    });
                }
            });
        }

        $kontrak = $kontrak->get();
        session(['filteredKontrak' => $kontrak]);
        return view('laporan/laporan', compact('kontrak', 'kos', 'title'));
    }
}
