<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Traits\MakesABooking;
use Illuminate\Http\Request;
use App\Booking;

class BookingController extends Controller
{
    use MakesABooking;

    /**
     * Returns view for creating a booking
     *
     * @return Illuminate\Http\Response
     */
    public function create()
    {
        return view('lab-booking.create');
    }

    public function index(Request $request)
    {
        $periods = $this->slots("07:45", "16:55");
        $date = date('d-m-Y'); 
        //Bookings of all labs for specific date
        $bookings = $this->dayBookings($date);
					 
        $labs = DB::table('labs')
                    ->select('*')
                    ->orderBy('number_of_computers', 'DESC')
                    ->paginate(5);

        return view('lab-booking.index')
                ->with([
                    'labs' => $labs,
                    'periods' => $periods,
                    'bookings' => $bookings,
                    'date' => $date
                ]);
    }

    public function store(Request $request)
    {
        //Accepting User Input and storing it in an array
        $input = array(
                  'lab_id' => $request->input('lab_id'),
                  'date' => $request->input('booking_date'),
                  'start_time' => $request->input('start_time'),
                  'end_time' => $request->input('end_time'),
                  'purpose' => $request->input('purpose'),
                  'module' => $request->input('module')
        );

        //Breaking the booking into separate time bookings
        $bookings = $this->bookings($input);

        //If Lab is Available, then book it and return successful message
        if($this->checkBookingAvail($bookings))
        {
            $count = count($bookings);
            
            //Creating multilple instances and storing them in DB
            for($x = 0; $x < $count; $x++)
            {
                $BookingInstance = new Booking;
                $BookingInstance->booking_date = $bookings[$x]['booking_date'];
                $BookingInstance->start_time = $bookings[$x]['start_time'];
                $BookingInstance->end_time = $bookings[$x]['end_time'];
                $BookingInstance->module = $bookings[$x]['module'];
                $BookingInstance->purpose = $bookings[$x]['purpose'];
                $BookingInstance->lab_id = $bookings[$x]['lab_id'];
                $BookingInstance->save();
            }

            return redirect()->back()->with('successful', 'Booking was made successfully!!');
        
        }else //If lab is unavailable, return other available labs
        {
            $inputLab = DB::table('labs')
                            ->select('*')
                            ->where('lab_id', $input['lab_id'])
                            ->get();

            $labs = $this->checkOtherLabs($input);

            array_push($labs, $inputLab[0]);
            
            $labs = array_reverse($labs);
            
            return redirect()
                    ->back()
                    ->with([
                            'unsuccessful' => 'Lab Not Available',
                            'otherAvailLabs' => $this->checkOtherLabs($input),
                            'date' => $input['date'],
                            'bookings' => $this->dayBookings($input['date']),
                            'labs' => $labs,
                            'periods' => $this->slots('07:45', '16:55')
                    ]);

        }      
    }

    public function showWeekBookings(Request $request)
    {
       if(count($request->all()) == 0)
       
        $data = array(
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'lab_id' => $request->input('lab_id')
            );

        $weekBookings = $this->weekBookings($data);
        
        return view('lab-booking.week-bookings')->with('weekBookings', $weekBookings);
    }
}
