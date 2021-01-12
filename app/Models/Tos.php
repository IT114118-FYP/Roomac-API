<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Resource;

class Tos extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tos_en',
        'tos_hk',
        'tos_cn',
    ];

    public function resources()
    {
        return $this->hasMany(Resource::class);
    }
}
