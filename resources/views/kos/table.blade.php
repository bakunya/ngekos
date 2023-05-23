@extends('layouts.base')

@section('title', 'Manajemen Penyewa')

@section('push_head')
    <style>
        td,
        th {
            padding: 1rem !important;
        }

        tr:last-child {
            border: transparent !important;
        }

        table svg {
            width: 23px !important;
            height: 23px !important;
        }
    </style>
@endsection

@section('content')
    <div id="app">
        <x-sidebar active-nav="{{ $active_nav }}" active-subnav="{{ $active_subnav }}" />
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            {{-- {{ dd($penyewa->lastPage()) }} --}}
            <div class="page-heading">
                <x-page-title title="{{ $title ?? '' }}" subtitle="{{ $subtitle ?? '' }}" current="{{ $current ?? '' }}" />

                <!-- Hoverable rows start -->
                <section class="section">
                    <div class="row" id="table-hover-row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content overflow-hidden">
                                    <!-- table hover -->
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>NAMA</th>
                                                    <th>EMAIL</th>
                                                    <th>TELP</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($penyewa as $item)
                                                    <tr>
                                                        <td class="text-bold-500">{{ $item->user->fullname }}</td>
                                                        <td>{{ $item->user->email }}</td>
                                                        <td class="text-bold-500">{{ $item->telp }}</td>
                                                        <td>
                                                            <a href="{{ route('GET.admin.penyewa.update.id', ['id' => $item->id]) }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                                </svg>
                                                            </a>
                                                            <a href="{{ route('GET.admin.penyewa.delete.id', ['id' => $item->id]) }}" class="ms-2 text-danger delete-btn">
                                                                <i class="badge-circle badge-circle-light-secondary font-medium-1" data-feather="trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <x-pagination :pagination="$penyewa" />
                        </div>
                    </div>
                </section>
                <!-- Hoverable rows end -->
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

@section('push_scripts')
    <script>
        document.addEventListener('DOMContentLoaded', _ => {
            document.querySelectorAll('.delete-btn').forEach(itm => {
                itm.addEventListener('click', e => {
                    e.preventDefault()
                    Swal.fire({
                        icon: 'warning',
                        title: 'Delete',
                        text: 'Yakin ingin menghapus data ini?',
                        showConfirmButton: true,
                    }).then(_ => (window.location.href = (itm.href)));
                })
            })
        })
    </script>
@endsection
