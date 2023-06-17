@extends('layout.main') @section('container')
<div class="container-fluid mt-4 p-0">
    <div class="">
        <h2>Daftar Kos</h2>
        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <td>No.</td>
                    <td>Nama kos</td>
                    <td>Action</td>
                </tr>
            </thead>
            @foreach ($kos as $k)
            <tbody>
                <tr>
                    <td class="table-nomor">
                        {{ $loop->iteration }}
                    </td>
                    <td>{{$k->nama}}</td>

                    <td class="table-action">
                        <a href="/kontrak/{{ $k->id }}" class="btn btn-warning"
                            >Detail Kontrak</a
                        >
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        <div>
            {{ $kos->links() }}
        </div>
    </div>
</div>
@endsection
