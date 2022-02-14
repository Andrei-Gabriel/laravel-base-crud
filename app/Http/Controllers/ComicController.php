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

        // Validazione
        $request->validate([
            "title" => "required|string|max:50|unique:comics",
            "description" => "required",
            "url_img" => "required|string|max:255|unique:comics",
            "price" => "required|numeric",
            "series" => "required|string|max:50",
            "sale_date" => "required|date",
            "type" => "required",
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
        //Ho già l'elemento. E' una modifica
        $comic->title = $data["title"];
        $comic->description = $data["description"];
        $comic->url_img = $data["thumb"];
        $comic->price = $data["price"];
        $comic->series = $data["series"];
        $comic->sale_date = $data["sale_date"];
        $comic->type = $data["type"];
        $comic->save();
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
