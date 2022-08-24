<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listfilms extends Model
{
    protected $table = "listfilms";
    
    public function films(){
        return $this -> belongsTo("App\Models\Films", "film_id");
    }
}
