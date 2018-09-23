<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'street', 'number', 'complement', 'district', 'city', 'state', 'country', 'phone'
    ];
    protected $hidden =  [
        'continent_id', 'status'
    ];

    public function employees()
    {
        return $this->hasMany('App\User', 'company_id')->where('status', 'ACTIVE');
    }

    public function wells()
    {
        return $this->hasMany('App\User', 'well_id')->where('status', 'ACTIVE');
    }
}
