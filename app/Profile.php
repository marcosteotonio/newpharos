<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'user_id',
        'slug',
        'fancy_name',
        'drt',
        'cnh',
        'rg',
        'organ',
        'cpf',
        'date_birth',
        'gender',
        'address',
        'phone_number',
        'marital_status',
        'education',
        'city_birth',
        'height',
        'weight',
        'shirt',
        'pants',
        'feet',
        'dummy',
        'bust',
        'waist',
        'hip',
        'skin_color',
        'eye_color',
        'hair_color',
        'hair_type',
        'hair_size',
        'tattoo',
        'tattoo_location',
        'practice_sports',
        'play_instrument',
        'film_outside',
        'make_figuration',
        'make_event',
        'bank_nro',
        'back_agency',
        'bank_account',
        'bank_holder_name',
        'bank_holder_cpf',
        'tutor_name',
        'tutor_rg',
        'tutor_organ',
        'tutor_cpf',
    ];

    protected $dates = [
        'date_birth',
    ];

    protected $appends = [
        'avatar',
        'years_old'
    ];

    protected $with = [
        'medias',
    ];

    /**
     * Retorna o usuário que o perfil esta vinculado.
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Retorna todas as medias que o perfil possui.
     *
     * @return void
     */
    public function medias()
    {
        return $this->morphMany('App\Media', 'entity', null,null, 'user_id');

    }

    /**
     * Retorna todos os posts que o perfil foi adicionado.
     *
     * @return void
     */
    public function posts()
    {
        return $this->belongsToMany('App\Post')->withTimestamps();
    }

    /**
     * Retorna todos os carrinho que o perfil foi adicionado.
     *
     * @return void
     */
    public function carts()
    {
        return $this->belongsToMany('App\Cart');
    }

    function getAvatarAttribute()
    {
        return asset('public/uploads/profiles/' . $this->user_id . '/thumb/' . $this->medias->first()->path);
    }

    function getYearsOldAttribute()
    {
        return $this->date_birth->age;
    }


    /**
     *  SITE QUERY
     */
    static function getBySlug($value){
        return parent::where('slug',$value)->first();
    }

    static function hasMedia(){
        return parent::whereRaw('( select count(*) from media where media.entity_id = user_id ) > 0');
    }
    static function getAdultsOnly(){
        return parent::whereRaw('date_birth <= DATE_SUB( CURDATE(), INTERVAL 14 YEAR )');   
    }

    static function getKidsOnly(){
        return parent::whereRaw('date_birth > DATE_SUB( CURDATE(), INTERVAL 14 YEAR )');   
    }

    static function randonSelection(){
        return parent::orderBy( \DB::raw('RAND()') );
    }

}
