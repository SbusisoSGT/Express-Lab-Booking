<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['role'];

    public $timestamps = false;

    public function users()
    {
        return $this->hasMany('App\User');
    }                                                
}
