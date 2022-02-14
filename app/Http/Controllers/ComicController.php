<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comic;
use Illuminate\Validation\Rule;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();

        // Cartella products/ file index.blade.php
        // ["comics" => $comics]
        return view("products.index", compact("comics"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("products.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Prendo i dati dal form
        $data = $request->all();

        // Validazione create
        $request->validate([
            "title" => "required|string|max:50|unique:comics", //
            "description" => "required",
            "url_img" => "required|url", //|unique:comics
            "price" => "required|numeric|min:0|max:99",
            "series" => "required|string|max:50",
            "sale_date" => "required|date",
            // Il valore di type viene assegnato da una select con 2 options
            "type" => [
                "required", Rule::in(["comic book", "graphic novel"])
            ],
        ]);

        //Inserisco un nuovo record nella tabella
        // $newComic = new Comic();
        // $newComic->title = $data["title"];
        // $newComic->description = $data["description"];
        // $newComic->url_img = $data["thumb"];
        // $newComic->price = $data["price"];
        // $newComic->series = $data["series"];
        // $newComic->sale_date = $data["sale_date"];
        // $newComic->type = $data["type"];
        // $newComic->save();

        // Inserisco un nuovo record nella tabella
        $newComic = Comic::create($data);

        return redirect()->route('comics.show', $newComic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // SELECT * FROM comics WHERE id = x
        $comic = Comic::find($id);
        
        return view("products.show", compact("comic"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view("products.edit", compact("comic"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        //Prendo i dati dal form
        $data = $request->all();

        // Validazione edit
        $request->validate([
            /* Dato che title è unique. Quando lo vogliamo modificare dobbiamo specificare, oltre al nome della tabella (comics), il nome della colonna (title) e di escludere 
            se stesso tramite l'id.
            N.B. non mettere spazi*/
            "title" => "required|string|max:50|unique:comics,title,{$comic->id}", //
            "description" => "required",
            "url_img" => "required|url", //|unique:comics
            "price" => "required|numeric|min:0|max:99",
            "series" => "required|string|max:50",
            "sale_date" => "required|date",
            // Il valore di type viene assegnato da una select con 2 options
            "type" => [
                "required", Rule::in(["comic book", "graphic novel"])
            ],
        ]);

        //Ho già l'elemento. E' una modifica
        // $comic->title = $data["title"];
        // $comic->description = $data["description"];
        // $comic->url_img = $data["url_img"];
        // $comic->price = $data["price"];
        // $comic->series = $data["series"];
        // $comic->sale_date = $data["sale_date"];
        // $comic->type = $data["type"];
        // $comic->save();

        // Aggiorno la risorsa con i nuovi dati
        $comic->update($data);

        //Restituisco la pagina modificata
        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route("comics.index");
    }
}
