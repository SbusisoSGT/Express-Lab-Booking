<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Booking;
use App\Lab;

trait MakesABooking
{

    protected function slots($start, $end)
    {
		$slots = array();
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

    public function bookings(array $input) 
    {
        $bookings = [];
	    $slots = $this->slots($input['start_time'], $input['end_time']);
	    $count = count($slots);

	    for($x = 0; $x < $count; $x++)
        {
		    array_push($bookings, ["lab_id" => $input['lab_id'],
			 		                    "date" => $input['date'],
			 		                    "start_time" => substr($slots[$x],0,5),
					                    "end_time" => substr($slots[$x],6,5),
			 		                    "purpose" => $input['purpose'],
										"module" => $input['module']
									]
			);

            
        }
        return $bookings;
    }

    public function checkBookingAvail(array $bookings)
    {
		$count = count($bookings);
		$available = true;
		$x = 0;

		while($x < $count && $available == true)
		{
        	$check = Booking::where('lab_id', $bookings[$x]['lab_id'])
                     	 ->where('date', $bookings[$x]['date'])
                     	 ->where('start_time', $bookings[$x]['start_time'])
						 ->get();
						 
        	if(count($check) > 0) //If lab is booked 
				$available = false;
			
			$x++;
		}

		return $available;
	}

	public function checkOtherLabs(array $input)
    {    
        $bookings = $this->bookings($input);

		//Fetch all the Labs in the school, limit 10 
		$labs = Lab::orderBy('number_of_computers', 'DESC')->get();

        $x = 0;
        $availableLabs = [];
        
        //Loop until you've found 4 other available labs or no other lab is available
        while(count($availableLabs) < 4 && $x < count($labs))
        {
            $input['lab_id'] = $labs[$x]->lab_id;
            $bookings = $this->bookings($input);

            //If Lab is available
            if($this->checkBookingAvail($bookings))
                array_push($availableLabs, $labs[$x]);
            $x++;  
        }

        return $availableLabs;   
	}
	
	public function dayBookings($date)
	{
		$bookings = Booking::where('date', $date)->get();
						
		return $bookings;
	}


	public function weekBookings(array $data)
	{
		$weekBookings = DB::table('booking')
							->select('*')
							->where('date', '>', $data['start_date'])
							->where('date', '<', $data['end_date'])
							->where('lab_id', $data['lab_id'])
							->orderBy('date', 'ASC') 
							->orderBy('start_time', 'ASC')
							->get();

		return $weekBookings;
	}
}