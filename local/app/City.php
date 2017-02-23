<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model {

    protected $table = 'cities';
    /*
     * Fillable fields
     * 
     * @var array
     */
    protected $fillable = [
        'name',
        'code',
        'country_id'
    ];

    public function country() {
        return $this->hasOne('App\Country', 'id', 'country_id');
    }

    public static function getList() {
        return self::orderBy("name", "ASC")
                        ->pluck("name", "id");
    }

}
