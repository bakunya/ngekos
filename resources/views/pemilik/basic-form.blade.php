@inject('pass', 'App\Helpers\RandomPassword')

@extends('layouts.base')

@section('title', 'Manajemen Penyewa')

@section('content')
    <div id="app">
        <x-sidebar active-nav="{{ $active_nav }}" active-subnav="{{ $active_subnav }}" />
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <x-page-title title="{{ $title ?? '' }}" subtitle="{{ $subtitle ?? '' }}" current="{{ $current ?? '' }}" />

                <!-- Basic Horizontal form layout section start -->
                <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"></h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal" action="{{ $action ?? '' }}" method="post">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="nama">Nama</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text"
                                                                    class="form-control @error('fullname') is-invalid @enderror"
                                                                    placeholder="Nama" id="nama" name="fullname"
                                                                    required
                                                                    value="{{ $curr?->fullname ?? old('fullname') }}" />
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person"></i>
                                                                </div>
                                                                <div class="invalid-feedback">
                                                                    <i class="bx bx-radio-circle"></i>
                                                                    @error('fullname')
                                                                        {{ $errors->get('fullname')[0] }}
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="email">Email</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="email"
                                                                    class="form-control @error('email') is-invalid @enderror"
                                                                    placeholder="Email" id="email" name="email"
                                                                    required value="{{ $curr?->email ?? old('email') }}" />
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
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="telp">Telp (WA)</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="tel"
                                                                    class="form-control @error('telp') is-invalid @enderror"
                                                                    placeholder="Telp (WA)" id="telp" name="telp"
                                                                    required value="{{ $curr?->telp ?? old('telp') }}" />
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-phone"></i>
                                                                </div>
                                                                <div class="invalid-feedback">
                                                                    <i class="bx bx-radio-circle"></i>
                                                                    @error('telp')
                                                                        {{ $errors->get('telp')[0] }}
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if (!isset($curr))
                                                        <div class="col-md-4">
                                                            <label for="password">Password</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group has-icon-left">
                                                                <div class="position-relative">
                                                                    <input type="text"
                                                                        class="form-control @error('password') is-invalid @enderror"
                                                                        placeholder="Password" id="password"
                                                                        name="password" required
                                                                        value="{{ old('password') ?? $pass->randomPassword() }}" />
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
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <hr class="my-3">
                                                    <div class="col-md-4">
                                                        <label for="telp">NIK</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="number"
                                                                    class="form-control @error('nik') is-invalid @enderror"
                                                                    placeholder="NIK" id="nik" name="nik"
                                                                    value="{{ $curr?->nik ?? old('nik') }}" />
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person-vcard-fill"></i>
                                                                </div>
                                                                <div class="invalid-feedback">
                                                                    <i class="bx bx-radio-circle"></i>
                                                                    @error('nik')
                                                                        {{ $errors->get('nik')[0] }}
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="telp">Alamat</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <textarea class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat" id="alamat"
                                                                    name="alamat">{{ $curr?->alamat ?? old('alamat') }}</textarea>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-house-fill"></i>
                                                                </div>
                                                                <div class="invalid-feedback">
                                                                    <i class="bx bx-radio-circle"></i>
                                                                    @error('alamat')
                                                                        {{ $errors->get('alamat')[0] }}
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary me-1 mb-1">
                                                            Submit
                                                        </button>
                                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                                            Reset
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic Horizontal form layout section end -->
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>
                            Crafted with
                            <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                            by <a href="https://saugi.me">Saugi</a>
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
