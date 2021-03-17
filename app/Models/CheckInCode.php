<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

use App\Models\Resource;

class CheckInCode extends Model
{
    use HasFactory;//, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'resource_booking_id',
    ];

    public function resource()
    {
        return $this->belongsTo(Resource::class);
    }
}
