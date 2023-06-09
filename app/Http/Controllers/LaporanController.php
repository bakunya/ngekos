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
        $kontrak = Kontrak::with('penyewa', 'kamar')->get();
        return view('laporan/laporan', ['kontrak' => $kontrak], ['title' => $title]);
    }

    public function cari_bulan(Request $request)
    {
        if ($request->bulan && $request->tahun) {
            $kontrak = Kontrak::with('penyewa', 'kamar')
                ->whereYear('tgl_bayar', $request->tahun)
                ->whereMonth('tgl_bayar', $request->bulan)
                ->get();
            return view('laporan/laporan', ['kontrak' => $kontrak]);
        } elseif ($request->bulan) {
            $kontrak = Kontrak::with('penyewa', 'kamar')
                ->whereMonth('tgl_bayar', $request->bulan)
                ->get();
            return view('laporan/laporan', ['kontrak' => $kontrak]);
        } elseif ($request->tahun) {
            $kontrak = Kontrak::with('penyewa', 'kamar')
                ->whereYear('tgl_bayar', $request->tahun)
                ->get();
            return view('laporan/laporan', ['kontrak' => $kontrak]);
        } else {
            $kontrak = Kontrak::all();
            return view('laporan/laporan', ['kontrak' => $kontrak]);
        }
    }

    public function laporan_pdf(Request $request)
    {

        // $kontrak = Kontrak::findOrFail($id);
        $title = 'Halaman Laporan';
        $kontrak = Kontrak::with('penyewa', 'kamar')
            ->whereHas(
                'kamar',
                function ($query) {
                    $query->where('kos_id', 1);
                }
            )->where('tgl_bayar', 'like', "%" . $request->bulan . "%")->get();

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
        $cari = $request->cari;

        $kontrak = DB::table('kontraks')
            ->select('kontraks.*', 'penyewa.nama as nama_penyewa', 'kamars.nama as nama_kamar')
            ->join('penyewa', 'kontraks.penyewa_id', '=', 'penyewa.id')
            ->join('kamars', 'kontraks.kamar_id', '=', 'kamars.id')
            ->where('penyewa.nama', 'like', "%" . $cari . "%")
            ->orWhere('kamars.nama', 'like', "%" . $cari . "%")

            ->paginate(5);

        return view('kontrak/listKontrak', ['kontrak' => $kontrak], ['cari' => $cari]);
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

    public function konfirmasi(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);

        // kode transaksi
        $inisialPenyewa = substr($transaksi->kontrak->penyewa->nama, 0, 2);
        $inisialKamar = substr($transaksi->kontrak->kamar->nama, -2);
        $kode = $inisialPenyewa . $inisialKamar . date('d');

        // tanggal
        $tanggal = date('d-m-y');

        //kontrak id
        $kontrak = $transaksi->kontrak->id;

        $transaksi->kode = $kode;
        $transaksi->tgl_transaksi = $tanggal;
        $transaksi->metode = $request->metode;
        $transaksi->status = $request->status;
        $transaksi->kontrak_id = $kontrak;
        $transaksi->save();

        $redirectPage = $transaksi->status == 'sudah lunas' ? '/print/' . $transaksi->id : '/status/' . $transaksi->id;
        return redirect($redirectPage);
    }

    public function print($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi/print', compact('transaksi'));
    }
}
