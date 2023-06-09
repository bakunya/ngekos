<!DOCTYPE html>
<html lang="id">
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
        <style>
            table,
            th,
            td {
                width: 80%;
                margin: 0 auto;
                border: 1px solid black;
                border-collapse: collapse;
                padding: 5px;
            }

            .kiri {
                width: 40%;
            }

            .judul {
                text-align: center;
                background-color: #f1f1f1;
                margin-bottom: 20px;
            }

            .ttd {
                text-align: right;
                margin-top: 10px;
                margin-right: 10%;
            }

            .header {
                display: flex;
                justify-content: space-between;
                margin: 0 10%;
            }

            .alamat {
                text-align: right;
            }

            .tanggal {
                margin-bottom: 50px;
            }
        </style>
    </head>

    <body>
        <div class="container mt-5" id="konten">
            <div class="header">
                <h3>PT. Maju Mundur</h3>
                <div class="alamat">
                    {{ $kontrak->kamar->kos->nama }} <br />
                    {{ $kontrak->kamar->kos->alamat }} <br />
                    {{ $kontrak->kamar->kos->no_telp }}
                </div>
            </div>
            <div class="judul">
                <hr />
                <h1>KWITANSI</h1>
                <hr />
            </div>
            <div id="">
                <table>
                    <tbody>
                        <tr>
                            <td class="kiri">kode</td>
                            <td>{{ $kontrak->kode }}</td>
                        </tr>
                        <tr>
                            <td class="kiri">Telah terima dari</td>
                            <td>
                                {{ $kontrak->penyewa->nama }} |
                                {{ $kontrak->penyewa->alamat }}
                            </td>
                        </tr>
                        <tr>
                            <td class="kiri">Untuk Pembayaran</td>
                            <td>{{ $kontrak->tgl_selesai }}</td>
                        </tr>
                        <tr>
                            <td class="kiri">Terbilang</td>
                            <td>Rp {{ $kontrak->kamar->harga }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="ttd">
                <p class="tanggal">
                    {{ $kontrak->kamar->kos->alamat }},
                    {{ $kontrak->tgl_bayar}}
                </p>
                <p>
                    {{ $kontrak->kamar->kos->nama }}
                </p>
            </div>
        </div>
    </body>
</html>
