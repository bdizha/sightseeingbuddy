<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

    protected $table = 'bookings';
    /*
     * Fillable fields
     * 
     * @var array
     */
    protected $fillable = [
        'user_id',
        'experience_id',
        'amount',
        'status',
        'pricing_id',
        'schedule_id'
    ];
    
    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function experience() {
        return $this->hasOne('App\Experience', 'id', 'experience_id');
    }

    public function pricing() {
        return $this->hasOne('App\Pricing', 'id', 'pricing_id');
    }

    public function schedule() {
        return $this->hasOne('App\ExperienceSchedule', 'id', 'schedule_id');
    }
}
