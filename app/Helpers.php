<?php

  function searchBooking($bookings, $start_time, $lab_id, $booking_date)
	{
        $booking = array();
        
        for($x = 0; $x < count($bookings); $x++)
        {
            if (
                $bookings[$x]->start_time == $start_time &&
                $bookings[$x]->lab_id == $lab_id && 
                $bookings[$x]->booking_date == $booking_date 
            )
                 $booking = $bookings[$x];
        }

        return $booking;
	}
?>