<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{

    protected $table = 'subscribers';
    /*
     * Fillable fields
     * 
     * @var array
     */
    protected $fillable = [
        'name',
        'email'
    ];
}
