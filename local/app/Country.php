<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $table = 'countries';
    /*
     * Fillable fields
     * 
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public static function getList() {
        return self::orderBy("name", "ASC")
                        ->pluck("name", "id");
    }
}
