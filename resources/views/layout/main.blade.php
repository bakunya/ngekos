<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ $title }}</title>
        <!-- MDB -->
        <link
            href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.css"
            rel="stylesheet"
        />

        <!-- <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
            crossorigin="anonymous"
        /> -->

        <!-- icon bootstrap -->
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
        />

        <link
            rel="stylesheet"
            type="text/css"
            href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"
        />

        <style>
            p {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
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
            .container-fluid {
                margin-left: 18%;
                width: 80%;
            }
            .btn-dashboard {
                width: 24%;
                height: 150px;
                font-weight: 100;
            }
            .background-icon {
                opacity: 0.1;
                font-size: 120px;
                display: inline-block;
                position: absolute;
            }
            .btn-dashboard p {
                margin-bottom: 0;
            }
            .p-text {
                font-size: 40px;
            }

            /* filter icon */
            #filterContainer {
                display: none;
            }
            .show-filter #filterContainer {
                display: flex;
            }

            /* laporan */
            .success-text {
                color: green;
            }

            .danger-text {
                color: red;
            }

            /* tabel */

            #myTable {
                border-collapse: collapse;
                width: 100%;
            }

            #myTable tbody tr td {
                border: 1px solid #d8e3f4;
            }

            #myTable thead td {
                border: 1px solid #d8e3f4;
            }

            .table-nomor {
                width: 5%;
                white-space: nowrap;
            }
            .table-action {
                width: 100px;
                white-space: nowrap;
            }
            #myTable_wrapper {
                padding: 0;
            }
        </style>
    </head>
    <body>
        @include('layout.sidebar') @yield('container')
        <script>
            function hide() {
                var x = document.getElementById("hai");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

        <script>
            $(document).ready(function () {
                $("#myTable").DataTable({
                    searching: false,
                    paging: false,
                    info: false,
                });
            });
        </script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"
        ></script>
        <!-- MDB -->
        <script
            type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.js"
        ></script>
    </body>
</html>
