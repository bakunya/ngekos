<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Pemilik</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
            crossorigin="anonymous"
        />
    </head>
    <body>
        <div class="container">
            <div class="mt-2">
                <h2>Data Pemilik</h2>

                <!-- menu atas -->
                <div class="d-flex justify-content-between">
                    <div class="">
                        <a href="/dashboard" class="btn btn-secondary">Dashboard</a>
                        <a href="/add-pemilik" class="btn btn-primary">Tambah</a>
                    </div>
                    <div class="d-flex">
                        <form
                            action="/cari-pemilik"
                            method="get"
                            class="d-flex me-1"
                        >
                            <input
                                type="text"
                                name="cari"
                                id="cari"
                                class="form-control me-1"
                            />
                            <button class="btn btn-primary">cari</button>
                        </form>
                        <form action="/pemilik" method="get">
                            <button class="btn btn-danger">reset</button>
                        </form>
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
            </div>
            <table class="table mt-3">
                <thead class="table-primary table-striped">
                    <tr>
                        <td>no.</td>
                        <td>Nama</td>
                        <td>Email</td>
                        <td>Alamat</td>
                        <td>Action</td>
                    </tr>
                </thead>
                @foreach ($pemilik as $p)
                <tbody class="">
                    <tr class="table-striped">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->nama}}</td>
                        <td>{{ $p->email}}</td>
                        <td>{{ $p->alamat}}</td>
                        <td>
                            <a
                                href="/edit-pemilik/{{$p->id}}"
                                class="btn btn-success"
                                >Edit</a
                            >
                            <a
                                href="/delete-pemilik/{{$p->id}}"
                                onclick="return confirm('Hapus data {{ $p->nama }} ?')"
                                class="btn btn-danger"
                                >Hapus</a
                            >
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
