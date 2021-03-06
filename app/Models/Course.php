<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'category_id',
        'description',
        'rating',
        'views',
        'levels',
        'hours',
        'image',
        'active',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
