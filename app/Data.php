<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class Zone extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, SoftDeletes;

    protected $fillable = [
        'depth', 'rop', 'rpm', 'wob', 'tflo', 'stor', 'mse', 'mi'
    ];

    protected $hidden = [
        'well_id', 'status'
    ];

    public function well()
    {
        return $this->belongsTo('App\Well', 'well_id');
    }
}
