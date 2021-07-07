<?php

namespace App\Repositories;

use App\Booking;

class BookingsRepository implements Repository
{
    /**
     * Create an instance of the model with the request data
     * 
     * @param $request
     * @return Booking $booking
     */
    public function create($request)
    {
        $booking = new Booking();
        
        
        $booking->save();
        
        return $booking;
    }
}