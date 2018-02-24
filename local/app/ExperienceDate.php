<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExperienceDate extends Model
{

    /*
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'experience_id',
        'date'
    ];

    public function experience()
    {
        return $this->hasOne('App\Experience', 'id', 'experience_id');
    }
}
