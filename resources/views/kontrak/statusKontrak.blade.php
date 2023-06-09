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
        <title>status</title>
    </head>
    <body>
        <div class="container mt-3">
            <h2>Konfirmasi Pembayaran</h2>
            <form action="/konfirmasi/{{ $kontrak->id }}" method="post">
                @csrf
                <div>
                    <label for="kode">kode</label>
                    <input
                        type="text"
                        name="kode"
                        id="kode"
                        class="form-control"
                        value="{{ $kode }}"
                        readonly
                    />
                </div>
                <div>
                    <label for="tgl_bayar">tanggal</label>
                    <input
                        type="text"
                        name="tgl_bayar"
                        id="tgl_bayar"
                        class="form-control"
                        value="{{ $tanggal }}"
                        readonly
                    />
                </div>
                <div>
                    <label for="metode">metode</label>
                    <input
                        type="text"
                        name="metode"
                        id="metode"
                        class="form-control"
                        value="{{ $kontrak->metode }}"
                    />
                </div>
                <div>
                    <label for="status">status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="belum lunas">Belum Lunas</option>
                        <option value="sudah lunas">Sudah Lunas</option>
                    </select>
                </div>
                <button class="btn btn-primary mt-3">save</button>
            </form>
        </div>
    </body>
</html>
