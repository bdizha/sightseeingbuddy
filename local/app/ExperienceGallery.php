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

    public static function findOrNew($experienceid) {
        $gallery = self::where('experience_id', "=", $experienceid)->first();
        if (empty($gallery)) {
            $gallery = new ExperienceGallery();
            $gallery->experience_id = $experienceid;
        }
        
        return $gallery;
    }

}
