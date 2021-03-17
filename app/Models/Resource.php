<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

use App\Models\Branch;
use App\Models\Category;
use App\Models\Tos;

class Resource extends Model
{
    use HasFactory;//, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'branch_id',
        'category_id',
        'tos_id',
        'interval',
        'number',
        'title_en',
        'title_hk',
        'title_cn',
        'image_url',
        'min_user',
        'max_user',
        'opening_time',
        'closing_time',
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tos()
    {
        return $this->belongsTo(Tos::class);
    }
}
