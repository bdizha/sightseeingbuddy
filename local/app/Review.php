<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    /*
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'experience_id',
        'title',
        'vote',
        'is_recommended',
        'content',
        'nickname'
    ];

    public function experience()
    {
        return $this->hasOne('App\Experience', 'id', 'experience_id');
    }
}
