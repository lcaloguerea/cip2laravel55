<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'countries';

    protected $fillable = [
                'name',
                'iso',
                'iso3',
                'nameTrans',
                'nationality',
                'flag',
            ];
    public $timestamps  = false;
    protected $primaryKey = 'id_country';

    //Relación huespedes por pais de origen
    public function passengers_o()
    {
        return $this->hasMany('App\Passenger', 'country_o' , 'id_country'); 

    }

    //Relación huespedes por pais de origen
    public function passengers_r()
    {
        return $this->hasMany('App\Passenger', 'country_r' , 'id_country'); 

    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
