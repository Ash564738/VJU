<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['user_id', 'show_id', 'total_amount', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function show()
    {
        return $this->belongsTo(Show::class);
    }

    public function bookingDetails()
    {
        return $this->hasMany(BookingDetail::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
