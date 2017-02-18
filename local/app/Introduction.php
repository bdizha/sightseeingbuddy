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
        'email',
        'mobile',
        'telephone'
    ];
    
    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
