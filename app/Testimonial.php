<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rate',
        'comment',
        'name',
        'department',
        'pAvatar',
        'visibility',
        'reservation_id',
        'passenger_id',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
