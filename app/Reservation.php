<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'motive',
        'program',
        'status',
        'check_in',
        'check_out',
        'payment_m',
        'room_id',
        'user_id',

    ];

    public function roomR()
    {
        return $this->hasOne('App\Room', 'id_room' , 'room_id'); 

    }

    public function userR()
    {
        return $this->hasOne('App\User', 'id' , 'user_id'); 

    }

    public function pgR()
    {
        return $this->hasOne('App\PassengerGroup', 'reservation_id' , 'id_res'); 

    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
