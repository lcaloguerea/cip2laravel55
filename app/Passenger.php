<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Passenger extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                'name_1',
                'lName_1',
                'lName_2',
                'Nationality',
                'email',
                'university',
                'country_o',
                'country_r',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
