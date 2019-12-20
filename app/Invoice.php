<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public $table = "invoice";

    protected $fillable = [
        'type',
        'charge',
        'IVA',
        'discount',
        'total',
        'IC',
        'r_type',
        'status',
        'pdf',
        'rsrv_id',

    ];
}
