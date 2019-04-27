<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'type', 'path'
    ];

    public function entity()
    {
        return $this->morphTo();
    }
}
