<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use App\Models\Pemilik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class KosController extends Controller
{
    public function index()
    {
        Session::forget('cariPenyewa'); // hapus sesi side bar aktif
        $title = 'Halaman List Kos';
        $pemilik = Session::get('data_user');
        if ($pemilik) {
            $kos = Kos::where('pemilik_id', $pemilik->id)->paginate(6);
            return view('kos/listKos', compact('kos', 'title'));
        }
    }

    public function create()
    {
        $pemilik = Session::get('data_user');
        return view('kos/addKos', compact('pemilik'));
    }
    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required|max:30',
            'alamat' => 'required|max:50',
            'no_telp' => 'required|max:15',
        ], [
            'nama.required' => 'Nama Wajib Diisi',
            'nama.max' => 'Nama Maksimal 30 Karakter',
            'alamat.required' => 'Alamat Wajib Diisi',
            'alamat.max' => 'Alamat Maksimal 50 Karakter',
            'no_telp.required' => 'No Telp Wajib Diisi',
            'no_telp.max' => 'No Telp Maksimal 15 Karakter',
        ]);

        $kos = new Kos;
        $kos->nama = $request->nama;
        $kos->alamat = $request->alamat;
        $kos->no_telp = $request->no_telp;
        $kos->pemilik_id = $request->pemilik_id;
        $kos->save();

        if ($kos) {
            Session::flash('insert', 'suskes');
            Session::flash('pesan', 'Data Berhasil Ditambahkan');
        }

        return redirect('/kos');
    }

    public function edit($id)
    {
        $kos = Kos::with('pemilik')->findOrFail($id);
        $pemilik = Session::get('data_user');
        return view('kos/editKos', compact('kos', 'pemilik'));
    }

    public function update(Request $request, $id)
    {
        $kos = Kos::findOrFail($id);
        $kos->nama = $request->nama;
        $kos->alamat = $request->alamat;
        $kos->no_telp = $request->no_telp;
        $kos->pemilik_id = $request->pemilik_id;

        $kos->save();

        if ($kos) {
            Session::flash('update', 'suskes');
            Session::flash('pesan', 'Data ' . $kos->nama . ' berhasil Diedit');
        }
        return redirect('/kos');
    }
    public function destroy($id)
    {
        try {
            $kos = Kos::findOrFail($id);
            $kos->delete();

            if ($kos) {
                Session::flash('delete', 'suskes');
                Session::flash('pesan', 'Data ' . $kos->nama . ' berhasil dihapus');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            $error = $e->errorInfo[1];
            if ($error == 1451) {
                Session::flash('delete', 'gagal');
                Session::flash('pesan', 'Data ' . $kos->nama . ' tidak bisa dihapus karena terdapat data kamar di dalamnya ');
            }
        }

        return redirect('/kos');
    }

    public function cari(Request $request)
    {
        $title = 'Halaman List Kos';
        $cariKos = $request->cariKos;

        if (isset($request->cariKos)) {
            $kos = Kos::where('nama', 'like', "%" . $cariKos . "%")
                ->orWhere('alamat', 'like', "%" . $cariKos . "%")
                ->paginate(6);
        } else {
            $kos = Kos::paginate(6);
        }

        return view('kos.listKos', compact('kos', 'title', 'cariKos'));
    }
}
