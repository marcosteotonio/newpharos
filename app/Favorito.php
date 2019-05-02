<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    protected $table = "favoritos";

    protected $fillable = ['user_id','agenciado_id'];
}
