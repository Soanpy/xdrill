<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Zone extends Model
{
    use SoftDeletes;

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

    public function creator()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
