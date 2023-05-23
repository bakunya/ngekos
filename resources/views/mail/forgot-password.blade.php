<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css') }}" />
    <style>
        .max-w-800 {
            max-width: 800px;
        }
    </style>
</head>
<body>
    <div class="container-fluid max-w-800 mx-auto py-5">
        <h1 class="text-center text-dark">Reset Password</h1>
        <p class="text-dark mb-2 mt-5 pt-3">Hai, {{ $name }}.</p>
        <p class="text-dark">Seseorang (semoga kamu!) mengirimi kamu email untuk melakukan <strong>Reset Password</strong>.
        <ul class="mt-5">
            <li class="text-dark">Email: <strong>{{ $email }}</strong></li>
        </ul>
        <div class="row gap-2 mt-5">
            <div class="col-12 mt-2">
                <a class="btn btn-primary container" href="{{ route('GET.reset-password', ['token' => $uid]) }}">Reset Password</a>
            </div>
        </div>
        <p class="text-dark mt-5">Jika tidak ingin melakukan Reset Password, Kamu dapat mengabaikan pesan ini.</p>
    </div>
</body>
</html>