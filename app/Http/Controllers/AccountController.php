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
    public function index()
    {
        $role = DB::table('roles')
                    ->select('role')
                    ->where('id', auth()->user()->role_id)
                    ->first();

        return view('lab-booking.account.show')
                ->with(['role' => $role]);
    }

    public function show($account)
    {
        
    }

    public function edit()
    {   
        $role = DB::table('roles')
                    ->select('role')
                    ->where('id', auth()->user()->role_id)
                    ->first();

        return view('lab-booking.account.edit')
                ->with(['role' => $role]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $user->update($request->all());

        return view('lab-booking.account.edit')
                ->with('message', 'Update was successful');

    }

    public function create()
    {
        return view('lab-booking.account.create');
    } 
}
