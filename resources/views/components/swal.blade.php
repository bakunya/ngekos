<script src="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.js') }}"></script>
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: `{{ session('success') }}`,
            showConfirmButton: true,
            timer: 1500
        });
    </script>
@endif
@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: `{{ session('error') }}`,
            showConfirmButton: true,
            timer: 1500
        });
    </script>    
@endif