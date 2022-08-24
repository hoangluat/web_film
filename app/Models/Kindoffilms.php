<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kindoffilms extends Model
{
    protected $table = "kind_of_film";

    public function films(){
        return $this -> hasMany("App\Models\Films", "kindoffilm_id");
    }
}
