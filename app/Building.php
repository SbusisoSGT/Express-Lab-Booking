<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $table = 'buildings';

    public $timestamps = false;

    protected $fillable = ['name'];

    /**
     * Get the labs for the building.
     */

    public function labs()
    {
        return $this->hasMany('App\Lab');
    }
}
