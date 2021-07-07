<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Lecturer extends Authenticatable
{
    protected $table = 'Lecturer';

    protected $hidden = [
        'password', 'remember_token',
    ];

    //protected $primaryKey = 'lecturer_id';
}
