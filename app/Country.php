<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name'
    ];

    protected $hidden =  [
        'continent_id', 'status', 'created_at', 'updated_at', 'deleted_at'
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
