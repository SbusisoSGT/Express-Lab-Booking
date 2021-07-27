<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Booking;
use App\Lab;

trait MakesABooking
{
	/**
	 * Split a booking accroding to multiple periods
	 * 
	 * @param Request $request
	 * @return $bookings
	 */
    public function bookings(Request $request) 
    {
        $bookings = [];
	    $slots = slots($request->input('start_time'), $request->input('end_time'));

	    for($x = 0; $x < count($slots); $x++)
        {
		    array_push($bookings, ["lab_id" => $request->input('lab_id'),
			 		                    "date" => $request->input('date'),
			 		                    "start_time" => substr($slots[$x],0,5),
					                    "end_time" => substr($slots[$x],6,5),
			 		                    "purpose" => $request->input('purpose'),
										"module" => $request->input('module')
									]
			);

            
        }
        return $bookings;
    }

    public function checkBookingAvail(array $bookings)
    {
		$available = true;
		$x = 0;

		while($x < count($bookings) && $available)
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

	public function checkOtherLabs(Request $request)
    {    
        $bookings = $this->bookings($request);

		//Fetch all the Labs in the school, limit 10 
		$labs = Lab::orderBy('number_of_computers', 'DESC')->get();

        $x = 0;
        $availableLabs = [];
        
        //Loop until you've found 4 other available labs or no other lab is available
        while(count($availableLabs) < 4 && $x < count($labs))
        {
            // $request->input('lab_id') = $labs[$x]->id;
            $bookings = $this->bookings($request);

            //If Lab is available
            if($this->checkBookingAvail($bookings))
                array_push($availableLabs, $labs[$x]);
            $x++;  
        }

        return $availableLabs;   
	}
}