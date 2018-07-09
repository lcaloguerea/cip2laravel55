<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Room extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'price',
        'status',
        'type',
        'active_reservation_id',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
