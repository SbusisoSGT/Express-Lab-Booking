<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Traits\MakesABooking;

class BookingController extends Controller
{
    use MakesABooking;

    public function dayBookings($date)
    {
        $date = date('Y-m-d', $date);
        $date = date('Y-m-d', strtotime($date."+1 day"));
        $bookings = DB::table('bookings')
                        ->select('*')
                        ->where('booking_date', $date)
                        ->get();

        return $bookings;
    }

    public function periods()
    {
        $start = "07:45";
        $end = "16:55";

        return $this->slots($start, $end);
    }
    
}
