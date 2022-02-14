<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $fillable = ["title", "description", "url_img", "price", "series", "sale_date", "type"];
}
