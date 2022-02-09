<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comics</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div class="flex-center position-ref">
        <div class="content">
            <a href="http://127.0.0.1:8000/comics"><div class="title">Lista prodotti</div></a>
        </div>
    </div>
    @yield('pageContent')
</body>
</html>