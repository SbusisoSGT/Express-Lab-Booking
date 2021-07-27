<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;
use App\Booking;
use App\Lab;

trait ReturnBookings
{

	/**
	 * Return today's bookings
	 * 
	 * @return array $bookings
	 */
	public function todaysBookings()
	{
		return Booking::where('date', date('Y-m-d'))->get();
	}


    /**
     * Return bookings for particular day
     * 
     * @param string date
     * @return array $bookings
     */
    public function dayBookings($date)
	{
		return Booking::where('date', $date)->get();	
	}

	/**
	 * Return entire week's bookings for a particular lab 
	 * 
	 * @param array $data
	 * @return $bookings
	 */
	public function weekBookings(array $data)
	{
		return DB::table('booking')
					->select('*')
					->where('date', '>', $data['start_date'])
					->where('date', '<', $data['end_date'])
					->where('lab_id', $data['lab_id'])
					->orderBy('date', 'ASC') 
					->orderBy('start_time', 'ASC')
					->get();
	}
}