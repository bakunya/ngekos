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
        <title>Kontrak | edit {{ $kontrak->penyewa->nama }}</title>
    </head>
    <body>
        <div class="container mt-3">
            <h2>Edit Kontrak</h2>
            <form action="/update-kontrak/{{ $kontrak->id }}" method="post">
                @csrf
                <div>
                    <label for="penyewa_id">Penyewa</label>
                    <select
                        name="penyewa_id"
                        id="penyewa_id"
                        class="form-control"
                    >
                        <option value="{{ $kontrak->penyewa->id }}">
                            {{$kontrak->penyewa->nama}}
                        </option>

                        @foreach ($penyewa as $p)
                        <option value="{{$p->id}}">{{$p->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="kamar_id">Kamar</label>
                    <select name="kamar_id" id="kamar_id" class="form-control">
                        <option value="{{ $kontrak->kamar->id }}">
                            {{$kontrak->kamar->nama}}
                        </option>

                        @foreach ($kamar as $k)
                        <option value="{{$k->id}}">{{$k->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="tgl_mulai">Tanggal Mulai</label>
                    <input
                        type="date"
                        class="form-control"
                        name="tgl_mulai"
                        id="tgl_mulai"
                        value="{{$kontrak->tgl_mulai }}"
                    />
                </div>
                <div>
                    <label for="tgl_selesai">Tanggal Selesai</label>
                    <input
                        type="date"
                        class="form-control"
                        name="tgl_selesai"
                        id="tgl_selesai"
                        value="{{$kontrak->tgl_selesai }}"
                    />
                </div>
                <button class="btn btn-primary btn-lg mt-3">save</button>
            </form>
        </div>
    </body>
</html>
