<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <title>Kamar | edit {{ $kamar->nama }}</title>
</head>

<body>
    <div class="container mt-3">
        <h2>Edit Kamar</h2>
        <form action="/update-kamar/{{ $kamar->id }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="nama">nama</label>
                <input class="form-control" type="text" name="nama" id="nama" value="{{ $kamar->nama }}" />
            </div>
            <div>
                <label for="fasilitas">fasilitas</label>
                <textarea class="form-control" name="fasilitas" id="fasilitas">{{ $kamar->fasilitas }}</textarea>
            </div>
            <div>
                <label for="harga">harga</label>
                <input class="form-control" type="text" name="harga" id="harga" value="{{ $kamar->harga }}" />
            </div>
            <div>
                <label for="status">status</label>
                <select name="status" id="status" class="form-control">
                    <option value="belum disewa">Belum Disewa</option>
                    <option value="disewa">Disewa</option>
                </select>
            </div>
            <div>
                <label for="gambar">gambar</label>
                <input class="form-control" type="file" name="gambar" id="gambar" />
                <img class="mt-3" src="{{ url('img/' . $kamar->gambar) }}" width="150px"
                    value="{{ $kamar->gambar }}" />
            </div>
            <div hidden>
                <input type="text" name="kos_id" value="{{ $kamar->kos->id }}" />
            </div>
            <button class="btn btn-primary btn-lg mt-3">save</button>
        </form>
    </div>
</body>

</html>