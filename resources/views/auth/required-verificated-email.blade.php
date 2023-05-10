@extends('layouts.base')

@section('title', 'Verifikasi Email Kamu')


@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h4 class="card-title">Verifikasi Email Kamu</h4>
            </div>
            <div class="card-body">
                <p>Untuk menggunakan seluruh fitur dalam Aplikasi ini, Email kamu harus diverifikasi terlebih dahulu. Jika kamu belum menerima <strong>email untuk verifikasi</strong>, silahkan klik tombol <strong>Kirim Email</strong> di bawah ini.</p>
                <form action="{{ route('POST.required-verificated-email') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary mx-auto d-block">Kirim Email Verifikasi</button>
                </form>
            </div>
        </div>
    </div>
@endsection
