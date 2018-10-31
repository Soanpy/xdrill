<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Data extends Model
{
    use SoftDeletes;

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
