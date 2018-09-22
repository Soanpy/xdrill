<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, SoftDeletes;

    protected $fillable = [
        'name'
    ];

    protected $hidden =  [
        'continent_id', 'status'
    ];

    public function continent()
    {
        return $this->belongsTo('App\Continent', 'continent_id');
    }

    public function zones()
    {
        return $this->hasMany('App\Zone', 'country_id')->where('status', 'ACTIVE');
    }
}
