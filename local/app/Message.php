<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    /*
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'experience_id',
        'sender_id',
        'recipient_id',
        'is_read',
        'content',
        'nickname'
    ];

    public function sender()
    {
        return $this->hasOne('App\User', 'id', 'sender_id');
    }

    public function recipient()
    {
        return $this->hasOne('App\User', 'id', 'recipient_id');
    }
}