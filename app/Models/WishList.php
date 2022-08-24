<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = "withlist";

    public function user(){
        return $this -> belongsTo("App\Models\User", "user_id");
    }
}