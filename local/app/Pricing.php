<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model {

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

    public function experience() {
        return $this->hasOne('App\Experience', 'id', 'experience_id');
    }

    public static function findOrNew($experienceid) {
        $pricing = self::where('experience_id', "=", $experienceid)->first();
        if (empty($pricing)) {
            $pricing = new Pricing();
            $pricing->experience_id = $experienceid;
        }
        
        return $pricing;
    }

}
