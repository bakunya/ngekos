@extends('layout.main') @section('container')
<div class="container-fluid">
    <div class="mt-2">
        <h2>Data transaksi</h2>

        <!-- menu atas  -->
        <div class="d-flex justify-content-between">
            <div class="d-flex">
                <form action="/cari-transaksi" method="get" class="d-flex me-1">
                    <input type="text" name="cari" class="form-control me-1" />
                    <button class="btn btn-primary">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
                <form action="/transaksi" method="get">
                    <button class="btn btn-danger">reset</button>
                </form>
            </div>
        </div>
        <!-- flash message insert -->
        @if(Session::has('insert'))
        <div class="alert alert-success mt-3">
            {{ Session::get('pesan')}}
        </div>
        @endif

        <!-- flash message update -->
        @if(Session::has('update'))
        <div class="alert alert-success mt-3">
            {{ Session::get('pesan')}}
        </div>
        @endif

        <!-- flash message delete -->
        @if(Session::has('delete'))
        <div class="alert alert-danger mt-3">
            {{ Session::get('pesan')}}
        </div>
        @endif
    </div>
    <div class="d-flex justify-content-between">
        <form action="/cari_bulan" method="post">
            @csrf
            <div class="form-group">
                <select name="bulan" class="form-control">
                    <option value="">Pilih Bulan</option>
                    @for ($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}">
                        {{ date("F", mktime(0, 0, 0, $i, 1)) }}
                    </option>
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <select name="tahun" class="form-control">
                    <option value="">Pilih Tahun</option>
                    @for ($i = 2021; $i <= 2030; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">cari</button>
            </div>
        </form>
    </div>

    <table class="table mt-3">
        <thead class="table-primary table-striped">
            <tr>
                <td>no.</td>
                <td>penyewa</td>
                <td>kamar</td>
                <td>Tanggal Bayar</td>
                <td>Harga</td>
                <td>Status</td>
            </tr>
        </thead>

        @foreach ($kontrak as $k)
        <tbody class="">
            <tr class="table-striped">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $k->penyewa->nama}}</td>
                <td>{{ $k->kamar->nama}}</td>
                <td>{{ $k->tgl_bayar}}</td>
                <td>Rp {{ $k->kamar->harga}}</td>
                <td>{{ $k->status}}</td>
            </tr>
        </tbody>
        @endforeach
    </table>
    <div>
        <a href="/laporan_pdf" class="btn btn-primary">
            <i class="bi bi-printer-fill"></i>
        </a>
    </div>
</div>
@endsection
