<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobseeker extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'gender',
        'dob',
        'address',
        'education',
        'experience',
        'skills',
        'cv',
        'profile_image',
        'job_user_id',
    ];

    public function job_user()
    {
        return $this->belongsTo(JobUser::class);
    }

    public function phones()
    {
        return $this->hasMany(Phone::class);
    }
}
