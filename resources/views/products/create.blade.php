@extends('layout.base')

@section('pageContent')
    <div class="container">
        <h1>Crea un prodotto</h1>
        <form action="{{route("comics.store")}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Titolo</label>
                {{-- is-invalid è una classe di Bootstrap --}}
                <input type="text" value="{{old("title")}}" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci un titolo">
                @error('title')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="url_img">URL immagine</label>
                <input type="text" class="form-control @error('url_img') is-invalid @enderror" value="{{old("url_img")}}" id="url_img" name="url_img" placeholder="Inserisci un'immagine">
                @error('url_img')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Prezzo</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" value="{{old("price")}}" id="price" name="price" step=".01" placeholder="Inserisci il prezzo">
                @error('price')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="series">Serie</label>
                <input type="text" class="form-control @error('series') is-invalid @enderror" value="{{old("series")}}" id="series" name="series" placeholder="Inserisci la serie">
                @error('series')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="sale_date">Data di vendita</label>
                <input type="date" min="1970-01-01" max="2025-12-31" value="{{old("sale_date")}}" class="form-control @error('sale_date') is-invalid @enderror" id="sale_date" name="sale_date">
                @error('sale_date')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="type">Tipo fumetto</label>
                <select class="form-control @error('type') is-invalid @enderror" id="type" name="type">
                    <option value="comic book" {{old("type") == "comic book" ? "selected" : null}}>Comic book</option>
                    <option value="graphic novel" {{old("type") == "graphic novel" ? "selected" : null}}>Graphic novel</option>
                </select>
                @error('type')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Descrizione del fumetto</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="7">{{old("description")}}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Aggiungi il fumetto</button>
        </form>
    </div>
@endsection