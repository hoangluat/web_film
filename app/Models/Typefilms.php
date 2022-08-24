<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Typefilms extends Model
{
    protected $table = "typefilms";

    public function films(){
        return $this->belongsToMany("App\Models\Films", "typefilm_film","typefilm_id","film_id");
    }
}
