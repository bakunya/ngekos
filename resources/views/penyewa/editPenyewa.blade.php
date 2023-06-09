<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
            crossorigin="anonymous"
        />
        <title>Penyewa | edit {{ $penyewa->nama }}</title>
    </head>
    <body>
        <div class="container mt-4">
            <h2>Edit Penyewa</h2>
            <form action="/update-penyewa/{{ $penyewa->id }}" method="post">
                @csrf
                <div>
                    <label for="nik">nik</label>
                    <input
                        class="form-control"
                        type="text"
                        name="nik"
                        id="nik"
                        value="{{ $penyewa->nik }}"
                    />
                </div>
                <div>
                    <label for="nama">nama</label>
                    <input
                        class="form-control"
                        type="text"
                        name="nama"
                        id="nama"
                        value="{{ $penyewa->nama }}"
                    />
                </div>
                <div>
                    <label for="email">email</label>
                    <input
                        class="form-control"
                        type="text"
                        name="email"
                        id="email"
                        value="{{ $penyewa->email }}"
                    />
                </div>
                <div>
                    <label for="alamat">alamat</label>
                    <input
                        class="form-control"
                        type="text"
                        name="alamat"
                        id="alamat"
                        value="{{ $penyewa->alamat }}"
                    />
                </div>
                <div>
                    <label for="no_telp">nomor HP </label>
                    <input
                        class="form-control"
                        type="text"
                        name="no_telp"
                        id="no_telp"
                        value="{{ $penyewa->no_telp  }}"
                    />
                </div>
                <button class="btn btn-primary btn-lg mt-3">save</button>
            </form>
        </div>
    </body>
</html>
