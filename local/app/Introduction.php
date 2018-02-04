<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Introduction extends Model {

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
        'reason',
        'description',
        'image'
    ];

    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public static function findOrNew($userId = null) {
        $introduction = Introduction::where('user_id', '=', $userId)->first();

        if (empty($introduction->id)) {
            $introduction = new Introduction();
        }

        return $introduction;
    }

}
