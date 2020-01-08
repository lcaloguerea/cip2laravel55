<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HRes extends Model
{
    public $table = "hres";
    public $timestamps  = false;

    public function setDateAttribute( $value ) {
  		$this->attributes['check_in'] = (new Carbon($value))->format('Y-M-D');
  		$this->attributes['check_out'] = (new Carbon($value))->format('Y-M-D');
	}

    protected $fillable = [
		'check_in',
		'check_out',
		'nights',
		'guests',
		'sponsor',
		'department',
		'rprice',
		'rtotal',
		'payment_m',
		'code',
		'email',

    ];
}
