@extends('layout.base')

@section('pageContent')
    <div class="container-sm">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                <img src="{{$comic->url_img}}" class="card-img-top" alt="{{$comic->title}}">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$comic->title}}</h5>
                    <h5 class="card-title">Price: ${{$comic->price}}</h5>
                    <p class="card-text">{{$comic->series}}</p>
                    <p class="card-text">{{$comic->sale_date}}</p>
                    <p class="card-text">{{$comic->description}}</p>

                    <a href="http://127.0.0.1:8000/comics"><button type="button" class="btn btn-primary">TORNA ALLA LISTA</button></a>

                    <a class="ml-3" href="http://127.0.0.1:8000/comics/{{$comic->id}}/edit"><button type="button" class="btn btn-warning">MODIFICA</button></a>

                    <a class="ml-5" href="http://127.0.0.1:8000/comics/{{$comic->id}}/edit"><button type="button" class="btn btn-danger">ELIMINA</button></a>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection