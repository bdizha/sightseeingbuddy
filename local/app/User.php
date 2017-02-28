<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Experience;

class User extends Authenticatable {

    use Notifiable,
        Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'type',
        'email',
        'password',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable() {
        return [
            'username' => [
                'source' => ['first_name', 'last_name']
            ]
        ];
    }

    /**
     * Get the experiences.
     */
    public function experiences() {
        return $this->hasMany('App\Experience');
    }

    /**
     * Get the introduction.
     */
    public function introduction() {
        return $this->hasOne('App\Introduction');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getExperiencesCountAttribute() {
        return $this->experiences->count();
    }

    public function getBookingsCountAttribute() {
        return Experience::has("bookings")->where("user_id", "=", $this->id)->count();
    }

}
