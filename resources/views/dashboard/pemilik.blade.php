@extends('layouts.base')

@section('title', 'Dashboard Pemilik')

@section('content')
    <div id="app">
        <x-sidebar active-nav="{{ $active_nav }}" active-subnav="{{ $active_subnav ?? '' }}" />
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            {{-- {{ dd($penyewa->lastPage()) }} --}}
            <div class="page-heading">
                <x-page-title title="{{ $title ?? '' }}" subtitle="{{ $subtitle ?? '' }}" current="{{ $current ?? '' }}" />
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
