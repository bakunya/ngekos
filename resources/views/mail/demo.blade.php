<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>TESTO</h1>
    <h1>aowkaokwoakwoawkoaowkoakw</h1>
    <h1>{{ $name }}</h1>
    <form action="{{ route('POST.login') }}" method="post">
        @csrf
        <input type="text" placeholder="LOREM IPSUM" name="email">
        <input type="text" placeholder="LOREM IPSUM" name="password">
        <button type="submit">lorem</button>
    </form>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, voluptatem! Illum suscipit perferendis repellat, possimus modi optio nemo porro nostrum officia excepturi neque est ea ducimus, asperiores soluta numquam pariatur.</p>
</body>
</html>