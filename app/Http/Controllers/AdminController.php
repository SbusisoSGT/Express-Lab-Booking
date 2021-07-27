<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Return index page
     * 
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return view('lab-booking.admin.index');
    }
}
