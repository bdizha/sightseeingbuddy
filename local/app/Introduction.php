<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Introduction extends Model
{

    protected $table = 'introductions';
    
    /*
     * Fillable fields
     * 
     * @var array
     */
    protected $fillable = [
        'user_id',
        'gender',
        'id_number',
        'description',
        'image'
    ];
    
    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
