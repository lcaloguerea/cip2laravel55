<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{

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
