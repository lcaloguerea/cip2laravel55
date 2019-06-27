<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{

	protected $table = 'activity';

    protected $fillable = [
                'event',
                'responsible_id',
                'involved_id',
                'rsrv_id',
    		];
  
    //Relation with responsible
    public function rspnsblR()
    {
        return $this->belongsTo('App\User', 'responsible_id', 'id'); //Id local
    }

    //Relation with responsible
    public function invR()
    {
        return $this->belongsTo('App\Passenger', 'involved_id', 'id_passenger'); //Id local
    }

    //Relation with reservation
    public function actRsrvR()
    {
        return $this->belongsTo('App\Reservation', 'rsrv_id', 'id_res'); //Id local
    }

}
