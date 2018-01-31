<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $table = 'contacts';
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
