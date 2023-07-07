@extends('layout.main') @section('container')
<div class="container-fluid">
    <div class="row">
        <!-- content -->
        <div class="mt-4 p-0">
            <h2>Data Penyewa</h2>

            <!-- menu atas -->
            <div class="d-flex justify-content-between mb-2">
                <div class="">
                    <a href="/add-penyewa" class="btn btn-primary">Tambah</a>
                </div>
                <div class="d-flex">
                    <form
                        action="/cari-penyewa"
                        method="get"
                        class="d-flex me-1"
                    >
                        <input
                            type="text"
                            name="cariPenyewa"
                            id="cariPenyewa"
                            class="form-control me-1"
                        />
                        <button class="btn btn-primary">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- flash message insert -->
            @if (Session::has('insert'))
            <div class="alert alert-success">
                {{ Session::get('pesan') }}
            </div>
            @endif

            <!-- flash message update -->
            @if (Session::has('update'))
            <div class="alert alert-success">
                {{ Session::get('pesan') }}
            </div>
            @endif

            <!-- flash message delete -->
            @if (Session::has('delete'))
            <div class="alert alert-danger">
                {{ Session::get('pesan') }}
            </div>
            @endif
        </div>

        <table id="myTable" class="table">
            <thead class="table-primary table-striped">
                <tr>
                    <td class="table-nomor">no.</td>
                    <td>NIK</td>
                    <td>Nama</td>
                    <td>Alamat</td>
                    <td>No. HP</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($penyewa as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->nik }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>{{ $p->no_telp }}</td>
                    <td style="width: 100px; white-space: nowrap">
                        <a
                            href="/edit-penyewa/{{ $p->id }}"
                            class="btn btn-warning"
                        >
                            <i
                                class="bi bi-pencil-fill"
                                style="color: white"
                            ></i
                        ></a>
                        <a
                            href="/delete-penyewa/{{ $p->id }}"
                            class="btn btn-danger"
                            onclick="confirm('Apakah anda yakin ingin menghapus data ini?')"
                        >
                            <i class="bi bi-trash-fill"></i
                        ></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $penyewa->links() }}
        </div>
    </div>
</div>
@endsection
