<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExperienceGallery extends Model {

    protected $table = 'experience_galleries';
    
    /*
     * Fillable fields
     * 
     * @var array
     */
    protected $fillable = [
        'experience_id',
        'image'
    ];

    public function experience() {
        return $this->hasOne('App\Experience', 'id', 'experience_id');
    }

}
