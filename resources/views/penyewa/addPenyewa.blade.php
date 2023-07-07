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
        <title>Penyewa | tambah data</title>
    </head>
    <body>
        <div class="container mt-4">
            <h2>Tambah Penyewa</h2>
            <form action="add-penyewa" method="post">
                @csrf
                <div>
                    <label for="nik">nik</label>
                    <input
                        class="form-control @error('nik') is-invalid @enderror"
                        type="text"
                        name="nik"
                        id="nik"
                        value="{{ old('nik') }}"
                    />
                    <!-- notif error -->
                    @error('nik')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div>
                    <label for="nama">nama</label>
                    <input
                        class="form-control @error('nama') is-invalid @enderror"
                        type="text"
                        name="nama"
                        id="nama"
                        value="{{ old('nama') }}"
                    />
                    <!-- notif error -->
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div>
                    <label for="email">email</label>
                    <input
                        class="form-control @error('email') is-invalid @enderror"
                        type="text"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                    />
                    <!-- notif error -->
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div>
                    <label for="alamat">alamat</label>
                    <input
                        class="form-control @error('alamat') is-invalid @enderror"
                        type="text"
                        name="alamat"
                        id="alamat"
                        value="{{ old('alamat') }}"
                    />
                    <!-- notif error -->
                    @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div>
                    <label for="no_telp">nomor HP </label>
                    <input
                        class="form-control @error('no_telp') is-invalid @enderror"
                        type="text"
                        name="no_telp"
                        id="no_telp"
                        value="{{ old('no_telp') }}"
                    />
                    <!-- notif error -->
                    @error('no_telp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button class="btn btn-primary btn-lg mt-3">save</button>
            </form>
        </div>
    </body>
</html>
