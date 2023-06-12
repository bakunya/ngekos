<?php

namespace App\Http\Controllers;

use App\Models\Kontrak;
use App\Models\Kamar;
use App\Models\Penyewa;
use App\Models\Transaksi;
use App\Models\Kos;
use App\Models\Pemilik;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\View;

class LaporanController extends Controller
{
    public function index()
    {
        $title = 'Halaman Laporan';
        $kos = Kos::all();
        $kontrak = Kontrak::with('penyewa', 'kamar')->get();
        return view('laporan/laporan', compact('kontrak', 'title', 'kos'));
    }

    public function filter_bulan(Request $request)
    {
        $title = 'Halaman Laporan';
        $kos = Kos::all();

        // filter kos, bulan, tahun
        if (isset($request->filter_kos) && ($request->bulan || $request->tahun)) {
            if ($request->bulan && $request->tahun) {
                $kontrak = Kontrak::with('penyewa', 'kamar')
                    ->whereYear('tgl_bayar', $request->tahun)
                    ->whereMonth('tgl_bayar', $request->bulan)
                    ->get();
                return view('laporan/laporan', compact('kontrak', 'kos', 'title'));
            } elseif ($request->bulan) {
                $kontrak = Kontrak::with('penyewa', 'kamar')
                    ->whereMonth('tgl_bayar', $request->bulan)
                    ->get();
                return view('laporan/laporan', compact('kontrak', 'kos', 'title'));
            } elseif ($request->tahun) {
                $kontrak = Kontrak::with('penyewa', 'kamar')
                    ->whereYear('tgl_bayar', $request->tahun)
                    ->get();
                return view('laporan/laporan', compact('kontrak', 'kos', 'title'));
            } else {
                $kos = Kos::all();
                $kontrak = Kontrak::all();
            }

            // filter bulan, tahun
        } elseif ($request->tahun || $request->bulan) {
            if ($request->bulan && $request->tahun) {
                $kontrak = Kontrak::with('penyewa', 'kamar')
                    ->whereYear('tgl_bayar', $request->tahun)
                    ->whereMonth('tgl_bayar', $request->bulan)
                    ->get();
                return view('laporan/laporan', compact('kontrak', 'kos', 'title'));
            } elseif ($request->bulan) {
                $kontrak = Kontrak::with('penyewa', 'kamar')
                    ->whereMonth('tgl_bayar', $request->bulan)
                    ->get();
                return view('laporan/laporan', compact('kontrak', 'kos', 'title'));
            } elseif ($request->tahun) {
                $kontrak = Kontrak::with('penyewa', 'kamar')
                    ->whereYear('tgl_bayar', $request->tahun)
                    ->get();
                return view('laporan/laporan', compact('kontrak', 'kos', 'title'));
            } else {
                $kontrak = Kontrak::all();
            }

            // filter kos
        } elseif (isset($request->filter_kos)) {
            // simpan id kos
            $filter_id = $request->filter_kos;

            $kontrak = Kontrak::with('penyewa', 'kamar')
                ->whereHas('kamar', function ($query) use ($filter_id) {
                    $query->where('kos_id', $filter_id[0]);
                    foreach ($filter_id as $key => $f) {
                        if ($key !== 0) {
                            $query->orWhere('kos_id', $f);
                        }
                    }
                })
                ->get();
            // tidak pilih apa apa
        } else {
            $kontrak = Kontrak::all();
        }

        return view('laporan/laporan', compact('kontrak', 'kos', 'title'));
    }

    public function laporan_pdf(Request $request)
    {
        // $kontrak = Kontrak::findOrFail($id);
        $title = 'Halaman Laporan';
        $kontrak = Kontrak::with('penyewa', 'kamar')
            ->whereHas('kamar', function ($query) {
                $query->where('kos_id', 1);
            })
            ->where('tgl_bayar', 'like', '%' . $request->bulan . '%')
            ->get();

        $html = View::make('laporan/laporan', compact('kontrak', 'title'))->render();
        file_put_contents('debug.html', $html);

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
        $kos = Kos::all();

        $kontrak = Kontrak::with('penyewa', 'kamar')
            ->whereHas('penyewa', function ($query) use ($cari) {
                $query->where('nama', 'like', '%' . $cari . '%');
            })
            ->orWhereHas('kamar', function ($query) use ($cari) {
                $query->where('nama', 'like', '%' . $cari . '%');
            })->get();



        return view('laporan/laporan', compact('kontrak', 'kos', 'title'));
    }

    public function status(Request $request, $id)
    {
        $transaksi = Kontrak::findOrFail($id);

        $inisialPenyewa = substr($transaksi->kontrak->penyewa->nama, 0, 2);
        $inisialKamar = substr($transaksi->kontrak->kamar->nama, -2);
        $kode = $inisialPenyewa . $inisialKamar . date('d');

        $tanggal = date('d-m-y');

        return view('transaksi/statusTransaksi', compact('transaksi', 'kode', 'tanggal'));
    }
    public function print($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi/print', compact('transaksi'));
    }
}
