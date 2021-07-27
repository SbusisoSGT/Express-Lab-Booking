<?php

namespace App\Traits;

use App\Lab;
use App\Booking;
use App\Purpose;
use App\Building;
use Illuminate\Support\Str;

trait FilterBookings
{
    private $labQuery;
    private $bookingQuery;
    private $date;

    public function init($labQuery, $bookingQuery, $request)
    {
        $this->date = date('Y-m-d');

        if($request->has('date')){
            if($request->input('date') != "today")
                $this->date = $request->input('date');
        }
            
        $this->labQuery = $labQuery;
        $this->bookingQuery = $bookingQuery;
    }
    /**
     * Apply all filters to achieve user's desired filter
     * 
     * @param $bookings
     * @param Request $request
     * @return $bookings
     */
    public function applyFilters($labQuery, $bookingQuery, $request)
    {
        $this->init($labQuery, $bookingQuery, $request);

        if($request->has('apply-filter')){
            $this->filterByDate($request);
            $this->filterByBuilding($request);
            $this->filterByComputers($request);
            $this->filterByPurpose($request);
        }
        
        return [$this->labQuery, $this->bookingQuery, $this->date];
    }

    /**
     * Filter bookings by range of number of computers
     * 
     * @param Request $request
     */
    public function filterByComputers($request)
    {
        $num_of_computers = $request->input('num_of_computers');

        if($num_of_computers != "any"){
            if(Str::contains($num_of_computers, '-')){
                $minNum = Str::before($num_of_computers, '-');
                $maxNum = Str::after($num_of_computers, '-');
            }else{
                $minNum = $num_of_computers;
                $maxNum = 99999999999;
            }

            $labs = Lab::where('number_of_computers', '>', $minNum)->where('number_of_computers', '<', $maxNum)->get()->pluck('id')->toArray();

            $this->bookingQuery->whereIn('lab_id', $labs);
            $this->labQuery->whereIn('id', $labs);
        }
    }

    /**
     * Filter bookings by purpose of building
     * 
     * @param Request $request
     */
    public function filterByPurpose($request)
    {
        $purpose_id = $request->input('purpose_id');

        if($purpose_id != "any"){
            $labs = Purpose::where('id', $purpose_id)->first()->labs()->get()->pluck('id')->toArray();

            $this->bookingQuery->whereIn('lab_id', $labs);
            $this->labQuery->whereIn('id', $labs);
        }
    }


    /**
     * Filter bookings by specific date
     * 
     * @param Request $request
     */
    public function filterByDate($request)
    {
        $this->bookingQuery->where('date', $this->date);
    }

    /**
     * Filter bookings for a particular Building
     * 
     * @param Request $request
     */
    public function filterByBuilding($request)
    {
        $building_id = $request->input('building_id');

        if($building_id != "all"){ 
            $labs = Building::findOrFail($building_id)->labs()->get()->pluck('id')->toArray();

            $this->bookingQuery->whereIn('lab_id', $labs);
            $this->labQuery->whereIn('id', $labs);
        }
    }
}