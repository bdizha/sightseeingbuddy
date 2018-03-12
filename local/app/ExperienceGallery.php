<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExperienceGallery extends Model
{

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

    public function experience()
    {
        return $this->hasOne('App\Experience', 'id', 'experience_id');
    }

    public static function findOrNew($experienceId)
    {
        $gallery = self::where('experience_id', "=", $experienceId)->first();
        if (empty($gallery)) {
            $gallery = new ExperienceGallery();
            $gallery->experience_id = $experienceId;
        }

        return $gallery;
    }

}
