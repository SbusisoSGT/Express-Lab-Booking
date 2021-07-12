<?php

namespace App\Traits;


trait FilterBookings
{   
    public function applyFilters($bookings, $request)
    {
        $building_id = $request->input('building_id');
    }

    /**
     * Filter bookings by range of number of computers
     * 
     * @param $bookings
     * @param Request $request
     * @return $bookings
     */
    public function filterByComputers($bookings, $request)
    {
        
        
    }

    /**
     * Filter bookings by purpose of building
     * 
     * @param $bookings
     * @param Request $request
     * @return $bookings
     */
    public function filterByPurpose($bookings, $request)
    {
        
        
    }


    /**
     * Filter bookings by specific date
     * 
     * @param $bookings
     * @param Request $request
     * @return $bookings
     */
    public function filterByDate($bookings, $request)
    {
        $date = $request->input('date');

        if($date != "today"){    
            $collection = collect($bookings);
            $bookings =  $collection->where('date', $date);
        }

        return $bookings;
    }

    /**
     * Filter bookings for a particular Building
     * 
     * @param $bookings
     * @param Request $request
     * @return $bookings
     */
    public function filterByBuilding($bookings, $request)
    {
        $building_id = $request->input('building_id');

        if($building_id != "all"){    
            $collection = collect($bookings);
            $bookings = $collection->filter(function($booking){
                return $booking->lab->building->id == $building_id;
            });
        }

        return $bookings;
    }
}