<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExperienceCategory extends Model {

    protected $table = 'experience_categories';
    
    /*
     * Fillable fields
     * 
     * @var array
     */
    protected $fillable = [
        'name',
        'parent_id'
    ];

    public function children() {
        return $this->hasOne('App\Experience', 'id', 'parent_id');
    }

}
