<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nationals extends Model
{
    protected $table = "nationals";

    public function films(){
        return $this->belongsToMany("App\Models\Films", "national_film","national_id","film_id");
    }
}
