<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Services\BookingService;
use App\Traits\ReturnBookings;
use App\Traits\MakesABooking;
use App\Booking;

class BookingController extends Controller
{
    use MakesABooking, ReturnBookings;

    private $bookingService;
    
    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

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
        list($labs, $bookings, $date) = $this->bookingService->bookings($request);

        return view('lab-booking.index')
                ->with([
                    'labs' => $labs,
                    'bookings' => $bookings,
                    'date' =>$date
                ]);
    }

    public function store(Request $request)
    {
        //Breaking the booking into separate time bookings
        $bookings = $this->bookings($request);

        for($x = 0; $x < count($bookings); $x++)
        {
            $BookingInstance = new Booking;
            $BookingInstance->date = $bookings[$x]['date'];
            $BookingInstance->start_time = $bookings[$x]['start_time'];
            $BookingInstance->end_time = $bookings[$x]['end_time'];
            $BookingInstance->module = $bookings[$x]['module'];
            $BookingInstance->purpose = $bookings[$x]['purpose'];
            $BookingInstance->lab_id = $bookings[$x]['lab_id'];
            $BookingInstance->save();
        }

        return redirect()
                    ->back()
                        ->with('successful', 'Booking was made successfully!!');


        // //If Lab is Available, then book it and return successful message
        // if($this->checkBookingAvail($bookings))
        // {
            

                    
        // }else //If lab is unavailable, return other available labs
        // {
        //     $inputLab = DB::table('labs')
        //                     ->select('*')
        //                     ->where('lab_id', $input['lab_id'])
        //                     ->get();

        //     $labs = $this->checkOtherLabs($input);

        //     array_push($labs, $inputLab[0]);
            
        //     $labs = array_reverse($labs);
            
        //     return redirect()
        //             ->back()
        //             ->with([
        //                     'unsuccessful' => 'Lab Not Available',
        //                     'otherAvailLabs' => $this->checkOtherLabs($input),
        //                     'date' => $input['date'],
        //                     'bookings' => $this->dayBookings($input['date']),
        //                     'labs' => $labs,
        //                     'periods' => $this->slots('07:45', '16:55')
        //             ]);

        // }      
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

    /**
     * 
     */
    private function name()
    {

        return $bookings;
    }
}
