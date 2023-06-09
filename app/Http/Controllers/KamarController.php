<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Kos;
use App\Models\Pemilik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class KamarController extends Controller
{
    public function index($id)
    {
        $title = 'Halaman List Kamar';
        $kos = Kos::findOrFail($id);
        $kamar = Kamar::with('kos')
            ->where('kos_id', $id)
            ->get();

        if (!$kamar) {
            Session::flash('search', 'gagal');
            Session::flash('pesan', 'Data tidak ditemukan');
        }
        
        return view(view: 'kamar/listKamar', data: compact('kamar', 'kos', 'title'));
    }

    public function create($id)
    {
        $kos = Kos::select('id', 'nama')->where('id', $id)->first();
        return view('kamar/addKamar', ['kos' => $kos], ['id' => $id]);
    }
    public function store(Request $request, $id)
    {


        $request->validate([
            'nama' => 'required|max:30',
            'harga' => 'required',
            'fasilitas' => 'required',
            'status' => 'required',
        ], [
            'nama.required' => 'Nama Wajib Diisi',
            'nama.max' => 'Nama Maksimal 30 Karakter',
            'fasilitas.required' => 'fasilitas Wajib Diisi',
            'status.required' => 'status Wajib Diisi',
            'harga.required' => 'harga Wajib Diisi',
        ]);

        $kamar = new kamar;
        $kamar->nama = $request->nama;
        $kamar->fasilitas = $request->fasilitas;
        $kamar->harga = $request->harga;
        $kamar->status = $request->status;
        $kamar->kos_id = $id;
        $kamar->save();

        if ($kamar) {
            Session::flash('insert', 'suskes');
            Session::flash('pesan', 'Data Berhasil Ditambahkan');
        }

        return redirect('/kamar/' . $id);
    }

    public function edit($id)
    {
        $kamar = Kamar::with('kos')->findOrFail($id);
        $kos = Kos::all();
        return view('kamar/editKamar', ['kamar' => $kamar], ['kos' => $kos]);
    }

    public function update(Request $request, $id)
    {
        $kamar = Kamar::findOrFail($id);
        $kamar->nama = $request->nama;
        $kamar->fasilitas = $request->fasilitas;
        $kamar->harga = $request->harga;
        $kamar->status = $request->status;
        $kamar->kos_id = $request->kos_id;

        $kamar->save();

        if ($kamar) {
            Session::flash('update', 'suskes');
            Session::flash('pesan', 'Data '  . $kamar->nama . ' berhasil Diedit');
        }
        return redirect('/kamar/' . $kamar->kos_id);
    }
    public function destroy($id)
    {

        try {
            $kamar = Kamar::findOrFail($id);
            $kamar->delete();

            if ($kamar) {
                Session::flash('delete', 'suskes');
                Session::flash('pesan', 'Data ' . $kamar->nama . ' berhasil dihapus');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            $error = $e->errorInfo[1];
            if ($error == 1451) {
                Session::flash('delete', 'gagal');
                Session::flash('pesan', 'Data ' . $kamar->nama . ' tidak bisa dihapus karena masih dalam masa sewa');
            }
        }


        return redirect('/kamar/' . $kamar->kos_id);
    }

    public function cari(Request $request, Kos $kos)
    {
        $title = 'Halaman List Kamar';
        $request->validate([
            'cari' => 'required',
        ], [
            'cari.required' => 'Kolom pencarian wajib diisi',
        ]);

        $cari = $request->cari;

        $kamar = DB::table('kamars')
            ->where('nama', 'like', "%" . $cari . "%")
            ->where('kos_id', $kos->id)
            ->orWhere('status', 'like', "%" . $cari . "%")
            ->paginate(5);

        return view(view: 'kamar/listKamar', data: compact('kamar', 'kos', 'cari', 'title'))->with('pesan', 'Data tidak ditemukan');
    }
}
