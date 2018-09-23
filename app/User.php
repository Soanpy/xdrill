<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'status', 'company_id', 'email_verified_at', 'deleted_at', 'type'
    ];

    public function company()
    {
        return $this->belongsTo('App\Company', 'company_id');
    }

    public function wells()
    {
        return $this->hasMany('App\Well', 'user_id');
    }
}
