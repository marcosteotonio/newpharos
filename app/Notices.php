<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notices extends Model
{
    protected $table = 'notices';

    protected $primarykey = 'id';

    protected $fillable = [
        'media',
        'media_type',
        'title',
        'slug',
        'subtitle',
        'description',
        'video',
        'agenciado',
    ];

    protected $cast =[
         'agenciado' => 'array',
    ];
}
