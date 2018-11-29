<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Telemetry extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'method', 'controller', 'description'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}