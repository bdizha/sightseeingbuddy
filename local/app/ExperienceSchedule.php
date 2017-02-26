<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExperienceSchedule extends Model {

    protected $table = 'experience_schedules';
    
    /*
     * Fillable fields
     * 
     * @var array
     */
    protected $fillable = [
        'experience_id',
        'days',
        'times'
    ];

    public function experience() {
        return $this->hasOne('App\Experience', 'id', 'experience_id');
    }

}
