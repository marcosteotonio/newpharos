<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'video';

    protected $primaryKey = 'id';

    protected $fillable = [
        'entity_id',
        'link',
        'description',
        'order',
        'host'
    ];
}
