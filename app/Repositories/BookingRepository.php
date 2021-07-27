<?php

namespace App\Repositories;

use App\Booking;

class BookingRepository implements Repository
{
    /**
     * Create multilple instances of booking and store them in DB
     * 
     * @param $bookings
     * @return void
     */
    public function create($bookings)
    {
        for($x = 0; $x < count($bookings); $x++)
        {
            $BookingInstance = new Booking;
            $BookingInstance->date = $bookings[$x]['date'];
            $BookingInstance->start_time = $bookings[$x]['start_time'];
            $BookingInstance->end_time = $bookings[$x]['end_time'];
            $BookingInstance->module = $bookings[$x]['module'];
            $BookingInstance->purpose = $bookings[$x]['purpose'];
            $BookingInstance->lab_id = $bookings[$x]['lab_id'];
            $BookingInstance->save();
        }
    }
}