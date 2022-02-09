<?php

use Illuminate\Database\Seeder;
use App\Comic;

class ComicsSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comics = config("comics");

        foreach($comics as $aComic) {
            $newComic = new Comic();
            $newComic->title = $aComic["title"];
            $newComic->description = $aComic["description"];
            $newComic->url_img = $aComic["thumb"];
            $newComic->price = $aComic["price"];
            $newComic->series = $aComic["series"];
            $newComic->sale_date = $aComic["sale_date"];
            $newComic->type = $aComic["type"];
            $newComic->save();
        }
    }
}
