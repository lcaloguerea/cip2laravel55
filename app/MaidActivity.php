<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaidActivity extends Model
{
    protected $fillable = [
                'event',
                'responsible_id',
                'observation',
                'maintenance_id',
    		];

    //Relation with maintenance
    public function maintenanceR()
    {
        return $this->belongsTo('App\Maintenace', 'maintenance_id', 'id'); //Id local
    }

    //Relation with maintenance
    public function userR()
    {
        return $this->belongsTo('App\user', 'responsible_id', 'id'); //Id local
    }
}
