@extends('layout.base')

@section('pageContent')
    <div class="container">
        <div class="row">
            @foreach ($comics as $aComic)
                <div class="col-3">
                    <div class="card card_small mb-5">
                        <img src="{{$aComic->url_img}}" class="card-img-top" alt="{{$aComic->title}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$aComic->title}}</h5>
                            <h5 class="card-title">Price: ${{$aComic->price}}</h5>
                            <p class="card-text">{{$aComic->series}}</p>
                            <p class="card-text">{{$aComic->sale_date}}</p>
                        </div>

                        <div class="container-fluid d-flex justify-content-around flex-wrap">
                            <a class="mb-3" href="http://127.0.0.1:8000/comics/{{$aComic->id}}"><button type="button" class="btn btn-primary">PIU' INFO</button></a>
    
                            <a class="mb-3" href="http://127.0.0.1:8000/comics/{{$aComic->id}}/edit"><button type="button" class="btn btn-warning">MODIFICA</button></a>

                            <a class="my-3" href="http://127.0.0.1:8000/comics/{{$aComic->id}}/edit"><button type="button" class="btn btn-danger">ELIMINA</button></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>    
    </div>
@endsection
    