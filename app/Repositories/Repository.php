<?php

namespace App\Repositories;

interface Repository
{
    /**
     * Create an instance of the model with the request data
     * 
     * @param $request
     * @return void
     */
    public function create($request);
}
