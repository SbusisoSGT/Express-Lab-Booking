<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'date', 'start_time', 'end_time', 'purpose', 'module', 'lab_id'
    ];

    public function lab()
    {
        return $this->belongsTo('App\Lab');
    }
}