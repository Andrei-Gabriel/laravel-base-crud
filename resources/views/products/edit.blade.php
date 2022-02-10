@extends('layout.base')

@section('pageContent')
    <div class="container">
        <h1>Modifica il prodotto {{$comic->title}}</h1>
        <form action="{{route("comics.update", $comic->id)}}" method="POST">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$comic->title}}" placeholder="Inserisci un titolo">
            </div>
            <div class="form-group">
                <label for="thumb">URL immagine</label>
                <input type="text" class="form-control" id="thumb" name="thumb" value="{{$comic->url_img}}" placeholder="Inserisci un'immagine">
            </div>
            <div class="form-group">
                <label for="price">Prezzo</label>
                <input type="number" class="form-control" id="price" value="{{$comic->price}}"" name="price" step=".01" placeholder="Inserisci il prezzo">
            </div>
            <div class="form-group">
                <label for="series">Serie</label>
                <input type="text" class="form-control" id="series" name="series" value="{{$comic->series}}" placeholder="Inserisci la serie">
            </div>
            <div class="form-group">
                <label for="sale_date">Data di vendita</label>
                <input type="date" min="1970-01-01" max="2025-12-31" class="form-control" value="{{$comic->sale_date}}" id="sale_date" name="sale_date">
            </div>
            <div class="form-group">
                <label for="type">Tipo fumetto</label>
                <select class="form-control" id="type" name="type">
                    <option value="comic book" {{$comic->type == "comic book" ? "selected" : ""}}>Comic book</option>
                    <option value="graphic novel" {{$comic->type == "graphic novel" ? "selected" : ""}}>Graphic novel</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Descrizione del fumetto</label>
                {{-- textarea non ha value --}}
                <textarea class="form-control" id="description" name="description" rows="7">{{$comic->description}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Modifica</button>
        </form>
    </div>
@endsection