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
        <title>Kontrak | tambah data</title>
    </head>
    <body>
        <div class="container mt-3">
            <h2>Add Kontrak</h2>
            <form action="/add-kontrak/{{ $kos }}" method="post">
                @csrf
                <div>
                    <label for="penyewa_id">Penyewa</label>
                    <select
                        name="penyewa_id"
                        id="penyewa_id"
                        class="form-control @error('penyewa_id') is-invalid @enderror"
                    >
                        @foreach ($penyewa as $p)
                        <option value="{{$p->id}}">{{$p->nama}}</option>
                        @endforeach
                    </select>
                    <!-- notif error -->
                    @error('penyewa_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div>
                    <label for="kamar_id">kamar</label>
                    <select
                        name="kamar_id"
                        id="kamar_id"
                        class="form-control @error('kamar_id') is-invalid @enderror"
                    >
                        @foreach ($kamar as $k)
                        <option value="{{$k->id}}">{{$k->nama}}</option>
                        @endforeach
                    </select>
                    <!-- notif error -->
                    @error('kamar_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div>
                    <label for="tgl_mulai">Tanggal Masuk</label>
                    <input
                        type="date"
                        class="form-control @error('tgl_mulai') is-invalid @enderror"
                        name="tgl_mulai"
                        id="tgl_mulai"
                        value="{{ old('tgl_mulai') }}"
                    />
                    <!-- notif error -->
                    @error('tgl_mulai')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div>
                    <label for="tgl_selesai">Tanggal Keluar</label>
                    <input
                        type="date"
                        class="form-control @error('tgl_selesai') is-invalid @enderror"
                        name="tgl_selesai"
                        id="tgl_selesai"
                        value="{{ old('tgl_selesai') }}"
                    />
                    <!-- notif error -->
                    @error('tgl_selesai')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div
                    hidden="hidden
                "
                >
                    <label for="status">status</label>
                    <select
                        name="status"
                        id="status"
                        class="form-control @error('status') is-invalid @enderror"
                        value="belum lunas"
                    >
                        <option value="belum lunas">belum lunas</option>
                        <option value="lunas">lunas</option>
                    </select>
                    @error('status')
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
