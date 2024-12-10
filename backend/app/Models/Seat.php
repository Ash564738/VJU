<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $fillable = ['hall_id', 'seat_number', 'seat_type'];

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }

    public function bookingDetails()
    {
        return $this->hasMany(BookingDetail::class);
    }
}
