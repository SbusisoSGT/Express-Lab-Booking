<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';

    protected $fillable = [
        'booking_date', 'start_time', 'end_time', 'purpose', 'module', 'lab_id'
    ];

    public function labs()
    {
        return $this->belongsTo('App\Lab');
    }
}