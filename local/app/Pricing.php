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

}
