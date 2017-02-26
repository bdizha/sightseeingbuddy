<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExperienceLanguage extends Model {

    protected $table = 'experiences_languages';

    /*
     * Fillable fields
     * 
     * @var array
     */
    protected $fillable = [
        'experience_id',
        'language_id'
    ];

    public function experience() {
        return $this->hasOne('App\Experience', 'id', 'experience_id');
    }

}
