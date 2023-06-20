<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- link bootstrap --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <h1>register</h1>
        <form action="#" method="post">
            @csrf
            <div>
                <label for="nama">nama</label>
                <input class="form-control" type="text" name="nama">
            </div>
            <div>
                <label for="email">email</label>
                <input class="form-control" type="text" name="email">
            </div>
            <div>
                <label for="alamat">alamat</label>
                <textarea class="form-control" name="alamat" id="" cols="30" rows="10"></textarea>
            </div>
            <button class="btn btn-primary mt-3" type="submit">register</button>
        </form>
    </div>
</body>

</html>