<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "role";
    public function users(){
        return $this -> belongsToMany("App\Models\User", "role_user", "id_role", "id_user");
    }
}
