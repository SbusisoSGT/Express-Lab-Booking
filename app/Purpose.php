<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purpose extends Model
{

    public $timestamps = false;

    protected $fillable = ['name'];

    /**
     * Get the Labs that have this purpose
     */
    public function labs()
    {
        return $this->belongsToMany('App\Lab');
    }
}
