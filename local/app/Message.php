<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
        'reads',
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

    public function experience()
    {
        return $this->hasOne('App\Experience', 'id', 'experience_id');
    }

    public function getIsReadAttribute()
    {
        $user = Auth::user();
        $reads = [];
        if (!empty($this->reads)) {
            $reads = unserialize($this->reads);
        }

        return in_array($user->id, $reads);
    }

    public function getHasRepliedAttribute()
    {
        $user = Auth::user();
        $repliesCount = Self::where("experience_id", "=", $this->experience_id)
            ->where("id", ">", $this->id)
            ->where("sender_id", "=", $user->id)
            ->count();

        return $repliesCount > 0;
    }

    public function getStatusAttribute()
    {
        $status = "Unread";
        if ($this->getHasRepliedAttribute()) {
            $status = "Replied";
        } else {
            if ($this->getIsReadAttribute()) {
                $status = "Read";
            }
        }

        return $status;
    }
}