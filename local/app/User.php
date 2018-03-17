<?php

namespace App;

use App\Events\ForgotPassword;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'type',
        'email',
        'password',
        'verify_token',
        'gender',
        'mobile',
        'telephone',
        'id_number',
        'reason',
        'description',
        'country_id',
        'image'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'username' => [
                'source' => ['first_name', 'last_name']
            ]
        ];
    }

    /**
     * Get the experiences.
     */
    public function experiences()
    {
        return $this->hasMany('App\Experience');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getExperiencesCountAttribute()
    {
        return $this->experiences->count();
    }

    public function getBookingsCountAttribute()
    {
        return Experience::has("bookings")->where("user_id", "=", $this->id)->count();
    }

    public function getTotalRevenueAttribute()
    {
        return Booking::where("local_id", "=", $this->id)
            ->sum('amount');
    }

    public function getAverageRatingAttribute()
    {
        $total = 0;
        $average = 5;

        $reviews = Review::whereHas('experience', function ($query) {
            $query->where('experiences.user_id', '=', $this->id);
        })->get();

        foreach ($reviews as $review) {
            $total += $review->vote;
        }

        if (!empty($total)) {
            $average = number_format($total / $reviews->count(), 2);
        }

        return $average;
    }

    /**
     * Send the password reset notification.
     *
     * @param  string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $data = [
            "token" => $token,
            "user" => $this
        ];

        event(new ForgotPassword($data));
    }

}
