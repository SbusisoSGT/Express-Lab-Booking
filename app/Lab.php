<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    protected $table = 'labs';

    protected $fillable = [
        'lab_name', 'number_of_computers', 'purpose', 'building_id',
    ];

    public $timestamps = false;


    /**
     * Get the building that owns the lab.
     */
    
    public function building()
    {
        return $this->belongsTo('App\Building');
    }

    public function bookings()
    {
        return $this->hasMany('App\Booking');
    }
}
