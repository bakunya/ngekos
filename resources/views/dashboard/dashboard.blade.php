<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Kontrak</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
            crossorigin="anonymous"
        />
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
        />
        <style>
            /* Sidebar */
            .sidebar {
                position: fixed;
                top: 0;
                bottom: 0;
                left: 0;
                padding: 58px 0 0; /* Height of navbar */
                box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%),
                    0 2px 10px 0 rgb(0 0 0 / 5%);
                width: 240px;
                z-index: 600;
            }
            .container-fluid {
                width: 80%;
                margin-left: 18%;
            }

            @media (max-width: 991.98px) {
                .sidebar {
                    width: 100%;
                }
            }
            .sidebar .active {
                border-radius: 5px;
                box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%),
                    0 2px 10px 0 rgb(0 0 0 / 12%);
            }

            .sidebar-sticky {
                position: relative;
                top: 0;
                height: calc(100vh - 48px);
                padding-top: 0.5rem;
                overflow-x: hidden;
                overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
            }

            .card {
                border-radius: 8px;
                width: 200px;
                height: 100px;
                margin-left: 5px;
                background-color: #0d6efd;
                color: white;
            }
            .bi-house-fill,
            .bi-person-fill,
            .bi-file-text-fill,
            .bi-graph-up-arrow {
                font-size: 35px;
            }

            .btn {
                padding-top: 30px;
                padding-bottom: auto;
                width: 320px;
                height: 150px;
                align-items: center;
            }
            P {
                font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <nav
                    id="sidebarMenu"
                    class="collapse d-lg-block sidebar collapse bg-dark"
                >
                    <div class="position-sticky">
                        <div class="list-group list-group-flush mx-3 mt-4">
                            <a
                                href="/dashboard"
                                class="list-group-item list-group-item-action py-2 ripple text-white active"
                                aria-current="true"
                            >
                                <i class="fas fa-tachometer-alt fa-fw me-3"></i
                                ><span>Dashboard</span>
                            </a>
                            <a
                                href="/penyewa"
                                class="list-group-item list-group-item-action py-2 ripple text-white bg-dark text-white"
                            >
                                <i class="fas fa-chart-area fa-fw me-3"></i
                                ><span>Penyeawa</span>
                            </a>
                            <a
                                href="/kos"
                                class="list-group-item list-group-item-action py-2 ripple bg-dark text-white bg-dark text-white"
                                ><i class="fas fa-lock fa-fw me-3"></i
                                ><span>Kos</span></a
                            >
                            <a
                                href="/pilih-kos"
                                class="list-group-item list-group-item-action py-2 ripple text-white bg-dark"
                                ><i class="fas fa-chart-line fa-fw me-3"></i
                                ><span>Kontrak</span></a
                            >
                            <a
                                href="/transaksi"
                                class="list-group-item list-group-item-action py-2 ripple bg-dark text-white"
                            >
                                <i class="fas fa-chart-pie fa-fw me-3"></i
                                ><span>Transaksi</span>
                            </a>
                        </div>
                    </div>
                </nav>
                <!-- Sidebar -->
            </div>
            <div class="content mt-4">
                <h2>Dashboard</h2>
                <div class="d-flex justify-content-between">
                    <a href="#" class="btn btn-primary">
                        <div class="bi-house-fill"></div>
                        <p>{{ $kamar }} <br />TOTAL KAMAR</p>
                    </a>
                    <a href="#" class="btn btn-success">
                        <div class="bi-person-fill"></div>
                        <p>
                            {{ $penyewa }} <br />
                            TOTAL PENYEWA
                        </p>
                    </a>
                    <a href="#" class="btn btn-warning">
                        <div class="bi-file-text-fill"></div>
                        <p>
                            {{ $belumLunas }}<br />
                            BELUM LUNAS
                        </p>
                    </a>
                    <a href="#" class="btn btn-danger">
                        <div class="bi-graph-up-arrow"></div>
                        <p>
                            {{ $sudahLunas }}<br />
                            SUDAH LUNAS
                        </p>
                    </a>
                </div>
                <div>
                    <table class="table mt-4">
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
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
