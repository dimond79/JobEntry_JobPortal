<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'email',
        'number',
        'description',
        'logo',
        'slug',
        'job_user_id'
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
    public function jobUser()
    {
        return $this->belongsTo(JobUser::class);
    }
}
