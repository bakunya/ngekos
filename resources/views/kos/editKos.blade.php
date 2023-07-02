<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <title>Penyewa | edit {{ $kos->nama }}</title>
</head>

<body>
    <div class="container mt-4">
        <h2>Edit Penyewa</h2>
        <form action="/update-kos/{{ $kos->id }}" method="post">
            @csrf
            <div>
                <label for="nama">nama</label>
                <input class="form-control" type="text" name="nama" id="nama" value="{{ $kos->nama }}" />
            </div>
            <div>
                <label for="alamat">alamat</label>
                <input class="form-control" type="text" name="alamat" id="alamat" value="{{ $kos->alamat }}" />
            </div>
            <div>
                <label for="no_telp">nomor HP </label>
                <input class="form-control" type="text" name="no_telp" id="no_telp" value="{{ $kos->no_telp  }}" />
            </div>
            <div hidden="yes">
                <input type="text" name="pemilik_id" id="pemilik_id" value="{{ $pemilik->id }}" />
            </div>
            <button class="btn btn-primary btn-lg mt-3">save</button>
        </form>
    </div>
</body>

</html>