<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class ResourceBooking extends Model
{
    use HasFactory;

    protected $dates = ['created_at', 'updated_at'];

    public function getStartTimeAttribute()
    {
        return (new Carbon($this->attributes['start_time']))->format('Y-m-d\TH:i:s');
    }

    public function getEndTimeAttribute()
    {
        return (new Carbon($this->attributes['end_time']))->format('Y-m-d\TH:i:s');
    }
}
