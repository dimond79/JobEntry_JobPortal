<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [

        'cv_path',
        'message',
        'job_id',
        'jobseeker_id',
        'job_user_id',
        'status',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function jobseeker()
    {
        return $this->belongsTo(Jobseeker::class);
    }

    public function jobUser()
    {
        return $this->belongsTo(JobUser::class);
    }
}
