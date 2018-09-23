<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Well extends Model
{
    use SoftDeletes;

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

    public function analyses()
    {
        return $this->hasMany('App\WellAnalysis', 'well_id');
    }
}
