<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	protected $fillable = [
        'name',
        'email',
        'message',
        'status',
        'ansBy',

    ];

    public function userR()
    {
        return $this->belongsTo('App\User', 'ansBy' , 'id'); 

    }    
}
