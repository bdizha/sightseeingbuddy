<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExperienceHighlight extends Model {

    protected $table = 'experience_highlights';
    /*
     * Fillable fields
     * 
     * @var array
     */
    protected $fillable = [
        'experience_id',
        'description',
        'duration',
        'units',
        'charge'
    ];

    public function experience() {
        return $this->hasOne('App\Experience', 'id', 'experience_id');
    }

}
