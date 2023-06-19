<?php

namespace App\Http\Controllers;

use App\Models\Penyewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;



class PenyewaController extends Controller
{

    public function index()
    {
        $title = 'Halaman List Penyewa';
        $cari_penyewa = session('cari_penyewa');
        $penyewa = Penyewa::paginate(6);
        return view('penyewa/listPenyewa', compact('penyewa', 'title'));
    }

    public function create()
    {
        return view('penyewa/addPenyewa');
    }
    public function store(Request $request)
    {

        $request->validate([
            'nik' => 'required|int|digits-between:1,16',
            'nama' => 'required|max:30',
            'email' => 'required|max:50|email:dns|unique:penyewa',
            'alamat' => 'required|max:50',
            'no_telp' => 'required|digits-between:1,13',
        ], [
            'nik.required' => 'Nik Wajib Diisi',
            'nama.required' => 'Nama Wajib Diisi',
            'email.required' => 'Email Wajib Diisi',
            'email.email' => 'Email Tidak Valid',
            'email.unique' => 'Email Sudah Terdaftar',
            'alamat.required' => 'Alamat Wajib Diisi',
            'no_telp.required' => 'NO Telepon Wajib Diisi',
            'nama.max' => 'Nama Maksimal 30 Karakter',
            'email.max' => 'Email Maksimal 50 Karakter',
            'alamat.max' => 'Alamat Maksimal 50 Karakter',
        ]);

        $penyewa = new Penyewa;
        $penyewa->nik = $request->nik;
        $penyewa->nama = $request->nama;
        $penyewa->email = $request->email;
        $penyewa->alamat = $request->alamat;
        $penyewa->no_telp = $request->no_telp;
        $penyewa->save();

        if ($penyewa) {
            Session::flash('insert', 'suskes');
            Session::flash('pesan', 'Data Berhasil Ditambahkan');
        }

        return redirect('/penyewa');
        // return redirect('/penyewa')->with('success', 'Data penyewa berhasil ditambahkan.');

    }

    public function edit($id)
    {
        $penyewa = Penyewa::findOrFail($id);
        return view('penyewa/editPenyewa', ['penyewa' => $penyewa]);
    }

    public function update(Request $request, $id)
    {
        $penyewa = Penyewa::findOrFail($id);
        $penyewa->nik = $request->nik;
        $penyewa->nama = $request->nama;
        $penyewa->email = $request->email;
        $penyewa->alamat = $request->alamat;
        $penyewa->no_telp = $request->no_telp;

        $penyewa->save();

        if ($penyewa) {
            Session::flash('update', 'suskes');
            Session::flash('pesan', 'Data ' . $penyewa->nama . ' berhasil Diedit');
        }
        return redirect('/penyewa');
    }
    public function destroy($id)
    {
        try {
            $penyewa = Penyewa::findOrFail($id);
            $penyewa->delete();

            if ($penyewa) {
                Session::flash('delete', 'suskes');
                Session::flash('pesan', 'Data ' . $penyewa->nama . ' berhasil dihapus');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            $error = $e->errorInfo[1];
            if ($error == 1451) {
                Session::flash('delete', 'gagal');
                Session::flash('pesan', 'Data ' . $penyewa->nama . ' tidak bisa dihapus karena masih dalam masa sewa');
            }
        }


        return redirect('/penyewa');
    }

    public function cari(Request $request)
    {

        $title = 'Halaman List Penyewa';
        $cari = $request->cari;

        if (isset($cari)) {
            $penyewa = Penyewa::where('nama', 'like', "%" . $cari . "%")
                ->orWhere('nik', 'like', "%" . $cari . "%")
                ->orWhere('alamat', 'like', "%" . $cari . "%")
                ->orWhere('email', 'like', "%" . $cari . "%")
                ->paginate(5);
        } else {
            $penyewa = Penyewa::paginate(6);
        }

        session(['cari_penyewa' => $request->cari]);
        return view('penyewa/listPenyewa', compact('penyewa', 'cari', 'title'));
    }
}
