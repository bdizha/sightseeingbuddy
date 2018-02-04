<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model {

    protected $table = 'languages';

    /*
     * Fillable fields
     * 
     * @var array
     */
    protected $fillable = [
        'name'
    ];

}
