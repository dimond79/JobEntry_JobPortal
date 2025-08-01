<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jobseeker extends Model
{
    use HasFactory, SoftDeletes;

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
        'cv_download_count',
        'profile_view_count',
    ];

    public function job_user()
    {
        return $this->belongsTo(JobUser::class);
    }

    public function phones()
    {
        return $this->hasMany(Phone::class);
    }

    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }
}
