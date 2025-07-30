<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'responsibility',
        'level',
        'salary_min',
        'salary_max',
        'type',
        'category',
        'location',
        'category_id',
        'user_id',
        'slug',
        'date_line',
        'qualification',
        'company_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }



    protected $casts = [
        'date_line' => 'date',
    ];
}
