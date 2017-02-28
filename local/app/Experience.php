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
        'cover_image',
        'transportation_mode'
    ];

    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function country() {
        return $this->hasOne('App\Country', 'id', 'country_id');
    }

    public function city() {
        return $this->hasOne('App\City', 'id', 'city_id');
    }

    public function category() {
        return $this->hasOne('App\ExperienceCategory', 'id', 'category_id');
    }

    public function sub_category() {
        return $this->hasOne('App\ExperienceCategory', 'id', 'sub_category_id');
    }

    /**
     * Get the languages.
     */
    public function languages() {
        return $this->belongsToMany('App\Language', 'experience_languages');
    }

    /**
     * Get the bookings.
     */
    public function bookings() {
        return $this->hasMany('App\Booking');
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

    public function gallery() {
        return $this->hasMany('App\ExperienceGallery');
    }

    public function schedule() {
        return $this->hasOne('App\ExperienceSchedule');
    }

    public function pricing() {
        return $this->hasOne('App\Pricing');
    }


    public function getSubCategoryAttribute() {
        $subCategoryId = $this->sub_category_id;

        if (empty($subCategoryId)) {
            return "";
        }

        $category = \App\ExperienceCategory::where('id', "=", $this->sub_category_id);
        return $category->first()->name;
    }

    public function getCityNameAttribute() {

        if (empty($this->city_id)) {
            return "";
        }

        $city = \App\City::where('id', "=", $this->city_id);
        return $city->first()->name;
    }

    public static function findOrNew($userId = null) {
        $experience = self::where('user_id', '=', $userId)->first();

        if (empty($experience->id)) {
            $experience = new $this();
        }

        return $experience;
    }

    public function getTimesAttribute() {
        
        return unserialize($this->schedule->times);
    }

    public function getDaysAttribute() {
        return array_keys(unserialize($this->schedule->days));
    }

}
