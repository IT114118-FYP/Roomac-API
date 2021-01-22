<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

use App\Models\User;
use App\Models\Resource;

class ResourceBooking extends Model
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
        'branch_setting_version_id',
        'start_time',
        'end_time',
    ];
    
    public function getStartTimeAttribute()
    {
        return (new Carbon($this->attributes['start_time']))->format('Y-m-d\TH:i:s');
    }

    public function getEndTimeAttribute()
    {
        return (new Carbon($this->attributes['end_time']))->format('Y-m-d\TH:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function resource()
    {
        return $this->belongsTo(Resource::class);
    }
}
