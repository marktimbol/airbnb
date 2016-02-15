<?php

namespace App;

use App\Room;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function book(Room $room)
    {
        return Booking::create([
            'user_id' => $this->id,
            'room_id'   => $room->id
        ]);
    }
}