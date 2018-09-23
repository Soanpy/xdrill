<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class Well extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, SoftDeletes;

    protected $fillable = [
        'name', 'title', 'description'
    ];

    protected $hidden = [
        'user_id', 'company_id', 'status'
    ];

    public function company()
    {
        return $this->belongsTo('App\Company', 'company_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
