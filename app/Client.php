<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'contact', 'phone_number', 'status'
    ];

    /**
     * Retonr o usuário referente ao cliente.
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Retorna os carrinho do cliente.
     *
     * @return void
     */
    public function carts()
    {
        return $this->hasMany('App\Cart');
    }
}
