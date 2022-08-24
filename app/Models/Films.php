<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Films extends Model
{
    protected $table = "films";

    public function kindoffilms(){
        return $this -> belongsTo("App\Models\Kindoffilms", "kindoffilm_id");
    }

    public function nationals(){
        return $this -> belongsToMany('App\Models\Nationals', 'national_film', 'film_id', 'national_id');
    }
    public function typefilms(){
        return $this -> belongsToMany('App\Models\Typefilms', 'typefilm_film', 'film_id', 'typefilm_id');
    }
    public function watchfilms(){
        return $this -> hasMany("App\Models\Listfilms", "film_id");
    }
}
