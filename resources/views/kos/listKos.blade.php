@extends('layout.main') @section('container')
<div class="container-fluid">
    <div class="row">
        <div class="mt-4">
            <h2>Data Kos</h2>

            <!-- menu atas  -->
            <div class="d-flex justify-content-between">
                <div class="">
                    <a href="/add-kos" class="btn btn-primary">Tambah</a>
                </div>
                <div class="d-flex">
                    <form action="/cari-kos" method="get" class="d-flex me-1">
                        <input
                            type="text"
                            name="cari"
                            id="cari"
                            class="form-control me-1"
                        />
                        <button class="btn btn-primary">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                    <form action="/kos" method="get">
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
        <table class="table mt-3">
            <thead class="table-primary table-striped">
                <tr>
                    <td>no.</td>
                    <td>Nama</td>
                    <td>Alamat</td>
                    <td>Nomor HP</td>
                    <td>Action</td>
                </tr>
            </thead>
            @foreach ($kos as $k)
            <tbody class="">
                <tr class="table-striped">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $k->nama}}</td>
                    <td>{{ $k->alamat}}</td>
                    <td>{{ $k->no_telp}}</td>
                    <td>
                        <a href="/kamar/{{ $k->id }}" class="btn btn-warning">
                            <i class="bi bi-info-circle-fill"></i
                        ></a>
                        <a href="/edit-kos/{{$k->id}}" class="btn btn-success">
                            <i class="bi bi-pencil-fill"></i
                        ></a>
                        <a
                            href="/delete-kos/{{$k->id}}"
                            onclick="return confirm('Hapus data {{ $k->nama }} ?')"
                            class="btn btn-danger"
                        >
                            <i class="bi bi-trash-fill"></i
                        ></a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection
