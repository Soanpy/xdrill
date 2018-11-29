<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WellAnalysis extends Model
{
    use SoftDeletes;

    protected $hidden = [
        'well_id', 'analysis_id', 'status'
    ];

    public function well()
    {
        return $this->belongsTo('App\Well', 'well_id');
    }

    public function analysis()
    {
        return $this->belongsTo('App\Analysis', 'analysis_id');
    }
}
