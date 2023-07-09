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
        <title>Pemilik | edit {{ $pemilik->nama }}</title>
    </head>
    <body>
        <div class="container mt-3">
            <h2>Edit Pemilik</h2>
            <form action="/update-pemilik/{{ $pemilik->id }}" method="post">
                @csrf

                <div>
                    <label for="nama">nama</label>
                    <input
                        class="form-control"
                        type="text"
                        name="nama"
                        id="nama"
                        value="{{ $pemilik->nama }}"
                    />
                </div>
                <div>
                    <label for="email">email</label>
                    <input
                        class="form-control"
                        type="text"
                        name="email"
                        id="email"
                        value="{{ $pemilik->email }}"
                    />
                </div>
                <div>
                    <label for="alamat">alamat</label>
                    <input
                        class="form-control"
                        type="text"
                        name="alamat"
                        id="alamat"
                        value="{{ $pemilik->alamat }}"
                    />
                </div>
                <div>
                    <label for="alamat">password</label>
                    <input
                        class="form-control"
                        type="text"
                        name="password"
                        id="password"
                        required
                    />
                </div>
                <button class="btn btn-primary btn-lg mt-3">save</button>
            </form>
        </div>
    </body>
</html>
