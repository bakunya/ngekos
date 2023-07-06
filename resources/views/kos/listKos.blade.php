@extends('layout.main') @section('container')
<div class="container-fluid">
    <div class="row">
        <div class="mt-4 p-0">
            <h2>Data Kos</h2>

            <!-- menu atas  -->
            <div class="d-flex justify-content-between">
                <div class="p-0">
                    <a href="/add-kos" class="btn btn-primary">Tambah</a>
                </div>
                <div class="d-flex">
                    <form action="/cari-kos" method="get" class="d-flex me-1">
                        <input type="text" name="cariKos" id="cariKos" class="form-control me-1" />
                        <button class="btn btn-primary">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                </div>
            </div>
            <!-- flash message insert -->
            @if (Session::has('insert'))
            <div class="alert alert-success mt-3">
                {{ Session::get('pesan') }}
            </div>
            @endif

            <!-- flash message update -->
            @if (Session::has('update'))
            <div class="alert alert-success mt-3">
                {{ Session::get('pesan') }}
            </div>
            @endif

            <!-- flash message delete -->
            @if (Session::has('delete'))
            <div class="alert alert-danger mt-3">
                {{ Session::get('pesan') }}
            </div>
            @endif
        </div>
        <table id="myTable" class="table mt-1 table-bordered">
            <thead class="table-primary">
                <tr class="">
                    <td class="table-nomor">no.</td>
                    <td>Nama</td>
                    <td>Alamat</td>
                    <td>Nomor HP</td>
                    <td>Kamar / Action</td>
                </tr>
            </thead>
            @foreach ($kos as $k)
            <tbody class="">
                <tr class="table-striped">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $k->nama }}</td>
                    <td>{{ $k->alamat }}</td>
                    <td>{{ $k->no_telp }}</td>
                    <td style="width: 100px; white-space: nowrap">
                        <a href="/kamar/{{ $k->id }}" class="btn btn-warning">
                            <i class="bi bi-info-circle-fill"></i></a>
                        <a href="/edit-kos/{{ $k->id }}" class="btn btn-success">
                            <i class="bi bi-pencil-fill"></i></a>
                        <a href="/delete-kos/{{ $k->id }}" onclick="return confirm('Hapus data {{ $k->nama }} ?')"
                            class="btn btn-danger">
                            <i class="bi bi-trash-fill"></i></a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        <div>
            {{ $kos->links() }}
        </div>
    </div>
    @endsection
</div>