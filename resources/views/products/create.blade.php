@extends('layout.base')

@section('pageContent')
    <div class="container">
        <h1>Crea un prodotto</h1>
        <form action="{{route("comics.store")}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci un titolo">
            </div>
            <div class="form-group">
                <label for="thumb">URL immagine</label>
                <input type="text" class="form-control" id="thumb" name="thumb" placeholder="Inserisci un'immagine">
            </div>
            <div class="form-group">
                <label for="price">Prezzo</label>
                <input type="number" class="form-control" id="price" name="price" step=".01" placeholder="Inserisci il prezzo">
            </div>
            <div class="form-group">
                <label for="series">Serie</label>
                <input type="text" class="form-control" id="series" name="series" placeholder="Inserisci la serie">
            </div>
            <div class="form-group">
                <label for="sale_date">Data di vendita</label>
                <input type="date" min="1970-01-01" max="2025-12-31" class="form-control" id="sale_date" name="sale_date">
            </div>
            <div class="form-group">
                <label for="type">Tipo fumetto</label>
                <select class="form-control" id="type" name="type">
                    <option value="comic book">Comic book</option>
                    <option value="graphic novel">Graphic novel</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Descrizione del fumetto</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Aggiungi il fumetto</button>
        </form>
    </div>
@endsection