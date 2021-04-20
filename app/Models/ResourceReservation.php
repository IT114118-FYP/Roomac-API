<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class ResourceReservation extends Model
{
    use HasFactory;

    protected $dates = ['created_at', 'updated_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'resource_id',
        'start_time',
        'end_time',
        'start',
        'end',
        'day_of_week',
        'repeat',
    ];

    public function getStartTimeAttribute()
    {
        return (new Carbon($this->attributes['start_time']))->format('Y-m-d\TH:i:s');
    }

    public function getEndTimeAttribute()
    {
        return (new Carbon($this->attributes['end_time']))->format('Y-m-d\TH:i:s');
    }
}
