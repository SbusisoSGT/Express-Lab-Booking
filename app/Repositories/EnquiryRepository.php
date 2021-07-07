<?php

namespace App\Repositories;

use App\Enquiry;

class EnquiryRepository
{

    /**
     * Create an instance of the model with the request data
     * 
     * @param $request
     * @return Enquiry $enquiry
     */
    public function create($request)
    {
        $enquiry = new Enquiry();
        $enquiry->full_name = $request->input('full_name');
        $enquiry->email = $request->input('email');
        $enquiry->mobile_numbers = $request->input('mobile_numbers');
        $enquiry->message = $request->input('message');
        $enquiry->save();
    }

}