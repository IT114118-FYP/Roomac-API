<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

use App\Models\Resource;

class Branch extends Model
{
    use HasFactory;//, Searchable;

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'title_en',
        'title_hk',
        'title_cn',
    ];

    public function resources(){
        return $this->hasMany(Resource::class);
    }
}
