<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExperienceActivity extends Model {

    protected $table = 'experience_activities';

    /*
     * Fillable fields
     * 
     * @var array
     */
    protected $fillable = [
        'experience_id',
        'description'
    ];

    public function experience() {
        return $this->hasOne('App\Experience', 'id', 'experience_id');
    }

}
