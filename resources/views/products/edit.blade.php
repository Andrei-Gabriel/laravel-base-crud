@extends('layout.base')

@section('pageContent')
    <div class="container">
        <h1>Modifica il prodotto {{$comic->title}}</h1>
        <form action="{{route("comics.update", $comic->id)}}" method="POST">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old("title") ? old("title") : $comic->title}}" placeholder="Inserisci un titolo">
                @error('title')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="url_img">URL immagine</label>
                <input type="text" class="form-control @error('url_img') is-invalid @enderror" id="url_img" name="url_img" value="{{old("url_img") ? old("url_img") : $comic->url_img}}" placeholder="Inserisci un'immagine">
                @error('url_img')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Prezzo</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" value="{{old("price") ? old("price") : $comic->price}}" name="price" step=".01" placeholder="Inserisci il prezzo">
                @error('price')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="series">Serie</label>
                <input type="text" class="form-control @error('series') is-invalid @enderror" id="series" name="series" value="{{old("series") ? old("series") : $comic->series}}" placeholder="Inserisci la serie">
                @error('series')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="sale_date">Data di vendita</label>
                <input type="date" min="1970-01-01" max="2025-12-31" class="form-control @error('sale_date') is-invalid @enderror" value="{{old("sale_date") ? old("sale_date") : $comic->sale_date}}" id="sale_date" name="sale_date">
                @error('sale_date')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="type">Tipo fumetto</label>
                <select class="form-control @error('type') is-invalid @enderror" id="type" name="type">
                    @php
                        function choseType($var){
                            return $chose = old("type") ? old("type") : $var->type;
                        }
                    @endphp
                    <option value="comic book" {{chose($comic) == "comic book" ? "selected" : ""}}>Comic book</option>
                    <option value="graphic novel" {{chose($comic) == "graphic novel" ? "selected" : ""}}>Graphic novel</option>
                    {{-- @if(old("type"))
                        <option value="comic book" {{old("type") == "comic book" ? "selected" : ""}}>Comic book</option>
                        <option value="comic book" {{old("type") == "graphic novel" ? "selected" : ""}}>Graphic novel</option>
                    @else
                        <option value="comic book" {{$comic->type == "comic book" ? "selected" : ""}}>Comic book</option>
                        <option value="graphic novel" {{$comic->type == "graphic novel" ? "selected" : ""}}>Graphic novel</option>
                    @endif --}}
                </select>
                @error('type')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Descrizione del fumetto</label>
                {{-- textarea non ha value --}}
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="7">{{old("description") ? old("description") : $comic->description}}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Modifica</button>
        </form>
    </div>
@endsection