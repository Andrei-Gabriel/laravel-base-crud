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
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light my-5 p-5">
            <a class="navbar-brand" href="http://127.0.0.1:8000/comics">LISTA PRODOTTI</a>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="http://127.0.0.1:8000/comics/create">INSERISCI UN FUMETTO<span class="sr-only">(current)</span></a>
                </li>
              </ul>
            </div>
        </nav>
    </div>
    @yield('pageContent')
</body>
</html>