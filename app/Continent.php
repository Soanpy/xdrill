<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Continent extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name'
    ];
    protected $hidden =  [
        'status', 'created_at', 'updated_at'
    ];

    public function countries()
    {
        return $this->hasMany('App\Country', 'continent_id');
    }
}
