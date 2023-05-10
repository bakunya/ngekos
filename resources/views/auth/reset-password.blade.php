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
                    <h1 class="auth-title">Reset Password</h1>
                    <p class="auth-subtitle mb-5">
                        Masukkan password baru kamu dengan panjang minimal 8 karakter.
                    </p>

                    <form action="{{ route('POST.reset-password') }}" method="post">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="hidden" name="ref" value="{{ $ref }}">
                            <input type="password" class="form-control form-control-xl @error('password') is-invalid @enderror"
                                placeholder="New password..." id="password" name="password" required
                                value="{{ old('password') }}" />
                            <div class="form-control-icon">
                                <i class="bi bi-lock"></i>
                            </div>
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                @error('password')
                                    {{ $errors->get('password')[0] }}
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
