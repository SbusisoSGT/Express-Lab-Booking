<?php

namespace App\Services;

use App\Traits\FilterBookings;
use App\Booking;
USE App\Lab;

class BookingService
{
    use FilterBookings;


    /**
     * Apply filters and return bookings
     * 
     * @param Request $request
     * @return array $labs, $bookings, $date 
     */
    public function bookings($request)
    {
        $labQuery = Lab::query()->orderBy('number_of_computers', 'DESC');
        $bookingQuery = Booking::query();

        list($labQuery, $bookingQuery, $date) = $this->applyFilters($labQuery, $bookingQuery, $request);

        $labs = $labQuery->paginate(5);
        $bookings = $bookingQuery->where('date', $date)->get();

        return [$labs, $bookings, $date];
    }
}