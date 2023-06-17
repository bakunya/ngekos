@extends('layout.main') @section('container')
<div class="container-fluid mt-5">
    <div>
        <h1>Daftar Kos</h1>
        <table class="table">
            <thead class="table-primary">
                <tr>
                    <td>Nama kos</td>
                    <td>Detail Kontrak</td>
                </tr>
            </thead>
            @foreach ($kos as $k)
            <tbody>
                <tr>
                    <td>{{$k->nama}}</td>

                    <td>
                        <a href="/kontrak/{{ $k->id }}" class="btn btn-warning">
                            <i class="bi bi-info-circle-fill"></i
                        ></a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection
