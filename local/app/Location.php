<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{

    protected $table = 'locations';
    /*
     * Fillable fields
     * 
     * @var array
     */
    protected $fillable = [
        'user_id',
        'country_id',
        'city_id',
        'street_address',
        'postal_code',
    ];
    
    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
