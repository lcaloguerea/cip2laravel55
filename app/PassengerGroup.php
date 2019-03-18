<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PassengerGroup extends Model
{
    //explicit when laravel mixup plurals in table names
    public $table = "passengers_group";


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reservation_id',
        'passenger_id',

    ];

    protected $primaryKey = 'id_pgroup';

    //Relación huespedes por pais de origen
    public function passengersR()
    {
        return $this->hasMany('App\Passenger', 'id_passenger' , 'passenger_id'); 

    }

    public function reservationR()
    {
        return $this->belongsTo('App\reservations', 'id_res', 'reservation_id'); //Id local
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
