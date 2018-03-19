<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{

    protected $table = 'pricings';

    /*
     * Fillable fields
     * 
     * @var array
     */
    protected $fillable = [
        'experience_id',
        'guests',
        'per_person'
    ];

    public function experience()
    {
        return $this->hasOne('App\Experience', 'id', 'experience_id');
    }

    public static function findOrNew($experienceId)
    {
        $pricing = self::where('experience_id', "=", $experienceId)->first();
        if (empty($pricing)) {
            $pricing = new Pricing();
            $pricing->experience_id = $experienceId;
        }

        return $pricing;
    }

}