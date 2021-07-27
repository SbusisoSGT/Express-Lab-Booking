<?php

  if(!function_exists('searchBooking')){

    /**
     * Search if a booking exists in the supplied array of bookings 
     * 
     * @param array $bookings
     * @param string $start_time
     * @param int $lab_id
     * @param string $date
     * @return $booking
     */
    function searchBooking($bookings, $start_time, $lab_id, $date)
    {
      $booking = [];
      
      for($x = 0; $x < count($bookings); $x++)
      {
        if (
            $bookings[$x]->start_time == $start_time &&
            $bookings[$x]->lab_id == $lab_id && 
            $bookings[$x]->date == $date 
          )
              $booking = $bookings[$x];
      }
        return $booking;
    }
  }

  if(!function_exists('slots'))
  {
	/**
	 * Return slots for specified period
	 * 
	 * @param string $start
	 * @param string $end
	 * @return $slots
	 */
    function slots($start = "07:45", $end = "16:55")
    {
		$slots = [];
		if($start == "13:00")
			$current =  date("H:i", strtotime($start." +55minutes"));
		else
			$current =  date("H:i", strtotime($start." +40minutes"));

		array_push($slots, $start."-".$current);	

		while($current !== $end)
		{
			$start = date("H:i", strtotime($current." +5minutes"));

			if($start == "13:00") 
                        	$current = date("H:i", strtotime($start." +55minutes"));
			else
				$current = date("H:i", strtotime($start." +40minutes"));
		
			array_push($slots, $start."-".$current);
		}
		return $slots;
    }
  }
?>