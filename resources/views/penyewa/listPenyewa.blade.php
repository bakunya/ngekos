@extends('layout.main')
@section('container')
        <div class="container-fluid">
            <div class="row">
                <!-- content -->
                    <div class="mt-4">
                        <h2>Data Penyeawa</h2>

                        <!-- menu atas -->
                        <div class="d-flex justify-content-between mb-2">
                            <div class="">
                                <a href="/add-penyewa" class="btn btn-primary"
                                    >Tambah</a
                                >
                            </div>
                            <div class="d-flex">
                                <form
                                    action="/cari"
                                    method="get"
                                    class="d-flex me-1"
                                >
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
                                <form action="/penyewa" method="get">
                                    <button class="btn btn-danger">
                                        reset
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- flash message insert -->
                        @if(Session::has('insert'))
                        <div class="alert alert-success">
                            {{ Session::get('pesan')}}
                        </div>
                        @endif

                        <!-- flash message update -->
                        @if(Session::has('update'))
                        <div class="alert alert-success">
                            {{ Session::get('pesan')}}
                        </div>
                        @endif

                        <!-- flash message delete -->
                        @if(Session::has('delete'))
                        <div class="alert alert-danger">
                            {{ Session::get('pesan')}}
                        </div>
                        @endif
                    </div>

                    <table class="table mt-3 table-bordered">
                        <thead class="table-primary table-striped">
                            <tr>
                                <td>no.</td>
                                <td>NIK</td>
                                <td>Nama</td>
                                <td>Alamat</td>
                                <td>No. HP</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($penyewa as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->nik }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->alamat }}</td>
                                <td>{{ $p->no_telp }}</td>
                                <td>
                                    <a
                                        href="/edit-penyewa/{{ $p->id }}"
                                        class="btn btn-warning"
                                        >
                                        <i class="bi bi-pencil-fill" style="color: white;"></i></a
                                    >
                                    <a
                                        href="/hapus-penyewa/{{ $p->id }}"
                                        class="btn btn-danger"
                                        >
                                        <i class="bi bi-trash-fill"></i></a
                                    >
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $penyewa->links() }}

                    <div class="mt-3">{{ $penyewa->links() }}</div>
            </div>
        </div>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
            integrity="sha384-ry/OwhYoZsOee2Q+AHtuTrhsgGDkOoeOanlJX+HBJtjS+cJ0jK+Zrl0t1dHD4/iB"
            crossorigin="anonymous"
        ></script>
        <!-- Tambahkan ini pada tampilan view -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {
                // Mengaktifkan sidebar toggle
                $(".sidebar-toggle").click(function () {
                    $(".sidebar").toggleClass("active");
                });
            });
        </script>
    </body>
</html>
