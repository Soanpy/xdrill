<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class Zone extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, SoftDeletes;

    protected $fillable = [
        'name'
    ];

    protected $hidden = [
        'user_id', 'company_id', 'country_id', 'status'
    ];

    public function country()
    {
        return $this->belongsTo('App\Country', 'country_id');
    }

    public function company()
    {
        return $this->belongsTo('App\Company', 'company_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
