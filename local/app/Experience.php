<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{

    protected $table = 'experience';
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
        'start_year',
        'category_id',
        'sub_category_id',
        'teaser',
        'description'
    ];
    
    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function country() {
        return $this->hasOne('App\Company', 'id', 'country_id');
    }

    public function city() {
        return $this->hasOne('App\Company', 'id', 'city_id');
    }

    public function category() {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }
}