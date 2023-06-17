@extends('layout.main') @section('container')
<div class="container-fluid">
    <div class="content mt-4">
        <h2>Dashboard</h2>
        <div class="d-flex justify-content-between">
            <a
                href="/kos"
                class="btn-dashboard btn btn-primary d-flex justify-content-left align-items-center"
            >
                <div class="background-icon">
                    <div class="bi-house-fill"></div>
                </div>
                <div class="m-auto">
                    <p class="p-text fw-bold">{{ $kamar }}</p>
                    <p class="fw-semi">TOTAL KAMAR</p>
                </div>
            </a>
            <a
                href="/penyewa"
                class="btn-dashboard btn btn-success d-flex justify-content-left align-items-center"
            >
                <div class="background-icon">
                    <div class="bi-person-fill"></div>
                </div>
                <div class="m-auto">
                    <p class="p-text fw-bold">{{ $penyewa }}</p>
                    <p class="fw-semi">PENYEWA</p>
                </div>
            </a>
            <a
                href="/pilih-kos"
                class="btn-dashboard btn btn-warning d-flex justify-content-left align-items-center"
            >
                <div class="background-icon">
                    <div class="bi-file-text-fill"></div>
                </div>
                <div class="m-auto">
                    <p class="p-text fw-bold">{{ $sudahLunas }}</p>
                    <p class="fw-semi">SUDAH LUNAS</p>
                </div>
            </a>
            <a
                href="/pilih-kos"
                class="btn-dashboard btn btn-danger d-flex justify-content-left align-items-center"
            >
                <div class="background-icon">
                    <div class="bi-graph-up-arrow"></div>
                </div>
                <div class="m-auto">
                    <p class="p-text fw-bold">{{ $belumLunas }}</p>
                    <p class="fw-semi">BELUM LUNAS</p>
                </div>
            </a>
        </div>
        <div>
            <h3 class="mt-4 fw-bold">Info Kos</h3>
            <table class="table">
                <tbody>
                    <tr>
                        <td>Nama</td>
                        <td>{{ $kos->pemilik->nama }}</td>
                    </tr>
                    <tr>
                        <td>email</td>
                        <td>{{ $kos->pemilik->email }}</td>
                    </tr>
                    <tr>
                        <td>alamat</td>
                        <td>{{ $kos->pemilik->alamat }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
