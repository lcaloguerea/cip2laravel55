<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    //explicit when laravel mixup plurals in table names
    public $table = "supplies";


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'supply',
        'stock',
    ];
}
