<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'name', 'client_id', 'sent'
    ];

    /**
     * Retorna o cliente referente ao carrinho
     *
     * @return void
     */
    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    /**
     * Retorna os perfis pertencentes ao carrinho
     *
     * @return void
     */
    public function profiles()
    {
        return $this->belongsToMany('App\Profile')->withTimestamps();
    }
}
