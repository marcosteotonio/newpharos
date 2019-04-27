<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'subtitle', 'body', 'slug', 'status'
    ];

    public function medias()
    {
        return $this->morphMany('App\Media', 'entity');
    }

    public function profiles() 
    {
        return $this->belongsToMany('App\Profile')->withTimestamps();
    }
    
}
