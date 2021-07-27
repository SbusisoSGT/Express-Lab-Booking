<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Traits\MakesABooking;
use Illuminate\Http\Request;
use App\Booking;
use App\User;


class AccountController extends Controller
{
    /**
     * Return account overview page
     * 
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return view('lab-booking.account.show');
    }

    /**
     * Return account edit page
     * 
     * @return Illuminate\Http\Response
     */
    public function edit()
    {
        return view('lab-booking.account.edit');
    }

    /**
     * Process edit account form
     * 
     * @param Request $request
     * @return Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = auth()->user();
        $user->update($request->all());

        return redirect()->back();
    }
}
