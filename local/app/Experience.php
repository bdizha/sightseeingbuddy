<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model {

    protected $table = 'experiences';
    
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
        'category_id',
        'sub_category_id',
        'teaser',
        'duration',
        'units',
        'extra_pickup',
        'extra_food',
        'extra_misc',
        'description',
        'cover_image'
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

    /**
     * Get the languages.
     */
    public function languages() {
        return $this->hasMany('App\Language');
    }

    /**
     * Get the highliths.
     */
    public function highlights() {
        return $this->hasMany('App\ExperienceHighlight');
    }

    /**
     * Get the activities.
     */
    public function activities() {
        return $this->hasMany('App\ExperienceActivity');
    }

}