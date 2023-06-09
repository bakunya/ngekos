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
        <title>kwitansi</title>
    </head>
    <body>
        <div class="container">
            <h1>tagihan</h1>
            <form action="/tagih/{{ $kontrak->id }}" method="post">
                @csrf
                <div>
                    <label for="nama">Nama</label>
                    <input
                        class="form-control"
                        type="text"
                        name="nama"
                        id="nama"
                        value="{{ $kontrak->penyewa->nama}}"
                    />
                </div>
                <div>
                    <label for="no_telp">nomor wa</label>
                    <input
                        class="form-control @error('nomor') is-invalid @enderror"
                        type="text"
                        name="no_telp"
                        id="no_telp"
                        value="{{ $kontrak->penyewa->no_telp}}"
                    />
                    @error('nomor')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="kamar">Kamar</label>
                    <input
                        class="form-control"
                        type="text"
                        name="kamar"
                        id="kamar"
                        value="{{ $kontrak->kamar->nama}}"
                    />
                    <label for="pesan">pesan</label>
                </div>
                <div>
                    <textarea
                        class="form-control"
                        type="text"
                        name="pesan"
                        id="pesan"
                    >
Halo {{ $kontrak->penyewa->nama }},

Berikut ini adalah tagihan untuk bulan 
*{{$kontrak->tgl_mulai}} - {{$kontrak->tgl_selesai}}*:

Kamar : {{ $kontrak->kamar->nama }}
Tagihan : {{ $kontrak->kamar->harga }}
Keterangan : 

Silakan lakukan pembayaran sebelum 
{{ $kontrak->tgl_selesai}} untuk menghindari keterlambatan.

Terima kasih,
{{ $kontrak->kamar->kos->nama }}
                    </textarea>
                    <div>
                        <button class="btn btn-primary mt-3" type="submit">
                            submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
