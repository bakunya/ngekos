@extends('layouts.base')

@section('title', 'Forgot Password')

@section('push_head')
    <link rel="stylesheet" href="./assets/compiled/css/auth.css" />
@endsection

@section('content')
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="./assets/compiled/svg/logo.svg" alt="Logo" /></a>
                    </div>
                    <h1 class="auth-title">Lupa Password</h1>
                    <p class="auth-subtitle mb-5">
                        Masukkan email Kamu dan kami akan mengirimkan link reset password.
                    </p>

                    <form action="{{ route('POST.forgot-password') }}" method="post">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" class="form-control form-control-xl @error('email') is-invalid @enderror"
                                placeholder="Email" id="email" name="email" required
                                value="{{ old('email') }}" />
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                @error('email')
                                    {{ $errors->get('email')[0] }}
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                            Kirim
                        </button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">
                            Ingat akun Kamu?
                            <a href="{{ route('GET.login') }}" class="font-bold">Log in</a>.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right"></div>
            </div>
        </div>
    </div>
@endsection
