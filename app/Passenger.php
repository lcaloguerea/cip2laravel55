<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                'name_1',
                'lName_1',
                'lName_2',
                'nationality',
                'email',
                'phone',
                'university',
                'country_o',
                'country_r',
                'pAvatar',
                'tCode',

    ];

    protected $primaryKey = 'id_passenger';

    //Relación con país de origen
    public function countryo()
    {
        return $this->belongsTo('App\Country', 'country_o', 'id_country'); //Id local
    }

    //Relación con país de residencia
    public function countryr()
    {
        return $this->belongsTo('App\Country', 'country_r', 'id_country'); //Id local
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
