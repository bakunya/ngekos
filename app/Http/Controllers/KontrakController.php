<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Kontrak;
use App\Models\Kos;
use App\Models\Penyewa;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class KontrakController extends Controller
{
    public function lihat()
    {
        $title = 'Halaman Kontrak';
        $pemilik = Session::get('data_user'); // sesion user login
        $kos = Kos::where('pemilik_id', $pemilik->id)->paginate(6);
        $kontrak = Kontrak::with('penyewa', 'kamar')->get();
        return view(view: 'kontrak/pilihKos', data: compact('kontrak', 'kos', 'title'));
    }
    public function index($id)
    {
        $title = 'Halaman Kontrak';
        $kontrak = Kontrak::with('penyewa', 'kamar')
            ->whereHas('kamar', function ($query) use ($id) {
                $query->where('kos_id', $id);
            })
            ->paginate(6);
        return view('kontrak/listKontrak', compact('kontrak', 'id', 'title'));
    }

    public function create($id)
    {
        $kos = $id;
        $penyewa = Penyewa::whereNotIn('id', function ($query) {
            $query->select('penyewa_id')->from('kontraks'); // ambil penyewa yang belum ada di kontrak
        })->get();

        $kamar = Kamar::where('kos_id', $kos)
            ->where('status', 'belum disewa')
            ->whereNotIn('id', function ($query) {
                $query->select('kamar_id')->from('kontraks');
            })
            ->get();
        return view('kontrak/addKontrak', compact('penyewa', 'kamar', 'kos'));
    }
    public function store(Request $request, $id)
    {
        $request->validate(
            [
                'penyewa_id' => 'required|unique:kontraks',
                'kamar_id' => 'required|unique:kontraks',
                'tgl_mulai' => 'required',
                'tgl_selesai' => 'required',
            ],
            [
                'penyewa_id.unique' => 'Penyewa sudah ada',
                'kamar_id.unique' => 'Kamar sudah ada',
                'tgl_mulai.required' => 'Tanggal mulai harus diisi',
                'tgl_selesai.required' => 'Tanggal selesai harus diisi',
            ],
        );

        DB::beginTransaction();

        // add kontrak
        $kontrak = new Kontrak();
        $kontrak->penyewa_id = $request->penyewa_id;
        $kontrak->kamar_id = $request->kamar_id;
        $kontrak->tgl_mulai = $request->tgl_mulai;
        $kontrak->tgl_selesai = $request->tgl_selesai;
        $kontrak->status = $request->status;

        $kontrak->save();

        // update status kamar
        $kamar = kamar::find($request->kamar_id);
        $kamar->status = 'disewa';
        $kamar->save();

        DB::commit();

        if ($kontrak) {
            Session::flash('insert', 'suskes');
            Session::flash('pesan', 'Data Berhasil Ditambahkan');
        }
        return redirect('/kontrak/' . $id);
    }

    public function edit($id)
    {
        $kontrak = Kontrak::with('penyewa', 'kamar')->findOrFail($id);
        $penyewa = Penyewa::all();
        $kamar = Kamar::all()
            ->where('kos_id', $kontrak->kamar->kos_id)
            ->where('status', 'belum disewa');
        return view('kontrak/editKontrak', compact('kontrak', 'penyewa', 'kamar'));
    }

    public function update(Request $request, $id)
    {
        $kontrak = Kontrak::findOrFail($id);
        $kontrak->penyewa_id = $request->penyewa_id;
        $kontrak->kamar_id = $request->kamar_id;
        $kontrak->tgl_mulai = $request->tgl_mulai;
        $kontrak->tgl_selesai = $request->tgl_selesai;
        $kontrak->save();

        if ($kontrak) {
            Session::flash('update', 'suskes');
            Session::flash('pesan', 'Data ' . $kontrak->nama . ' berhasil Diedit');
        }
        return redirect('/kontrak/' . $kontrak->kamar->kos_id);
    }
    public function destroy($id)
    {
        $kontrak = Kontrak::with('penyewa', 'kamar')->findOrFail($id);
        $kontrak->delete();

        if ($kontrak) {
            Session::flash('delete', 'suskes');
            Session::flash('pesan', 'Data ' . $kontrak->nama . ' berhasil dihapus');
        }

        return redirect('/kontrak/' . $kontrak->kamar->kos_id);
    }
    public function status(Request $request, $id)
    {
        $kontrak = Kontrak::findOrFail($id);

        $inisialPenyewa = substr($kontrak->penyewa->nama, 0, 2);
        $inisialKamar = substr($kontrak->kamar->nama, -2);
        $kode = $inisialPenyewa . $inisialKamar . date('d');

        $tanggal = date('Y-m-d');

        return view('kontrak/statusKontrak', compact('kontrak', 'kode', 'tanggal'));
    }

    public function konfirmasi(Request $request, $id)
    {
        $kontrak = Kontrak::findOrFail($id);
        $kontrak->kode = $request->kode;
        $kontrak->tgl_bayar = $request->tgl_bayar;
        $kontrak->metode = $request->metode;
        $kontrak->status = $request->status;

        $kontrak->save();

        if ($kontrak) {
            Session::flash('update', 'suskes');
            Session::flash('pesan', 'Data berhasil Diedit');
        }

        return redirect('/kontrak/' . $kontrak->kamar->kos_id);
    }

    public function print($id)
    {
        $kontrak = Kontrak::findOrFail($id);
        return view('kontrak/print', compact('kontrak'));
    }

    public function tagih($id)
    {
        $kontrak = Kontrak::findOrFail($id);
        return view('kontrak/tagih', compact('kontrak'));
    }
    public function wa(Request $request, $id)
    {
        $nomor = $request->no_telp;
        $pesan = $request->pesan;

        $request->validate([
            'nomor' => 'numeric',
        ]);

        $nomor = preg_replace('/[^0-9]/', '', $nomor);

        if (strlen($nomor) < 9 || strlen($nomor) > 15) {
            return redirect()
                ->back()
                ->with('error', 'Nomor tidak valid');
        }

        $endcode = urlencode($nomor);

        $waLink = "https://wa.me/{$endcode}?text=" . urlencode($pesan);

        return redirect($waLink);
    }

    public function download_pdf($id)
    {
        $kontrak = Kontrak::findOrFail($id);

        $html = View::make('kontrak/print2', compact('kontrak'))->render();
        file_put_contents('debug.html', $html);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('invoice.pdf', ['Attachment' => false]);
    }

    function cari(Request $request, $id)
    {
        $title = 'Data Kontrak';
        $cari = $request->cari;
        $id = $request->id;

        if (isset($request->cari)) {
            $kontrak = Kontrak::with('penyewa', 'kamar')
                ->whereHas('kamar', function ($query) use ($id) {
                    $query
                        ->select('id')
                        ->from('kamars')
                        ->where('kos_id', $id);
                })
                ->where(function ($query) use ($cari) {
                    $query->whereHas('penyewa', function ($query) use ($cari) {
                        $query->where('nama', 'like', '%' . $cari . '%');
                    })
                        ->orWhereHas('kamar', function ($query) use ($cari) {
                            $query->where('nama', 'like', '%' . $cari . '%');
                        });
                })
                ->get();
        } else {
            return $this->index($id);
        }
        return view('kontrak/listKontrak', compact('kontrak', 'id', 'title'));
    }
}
