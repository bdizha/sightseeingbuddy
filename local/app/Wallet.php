<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{

    protected $table = 'wallets';
    /*
     * Fillable fields
     * 
     * @var array
     */
    protected $fillable = [
        'user_id',
        'bank',
        'branch',
        'account_number'
    ];
    
    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
