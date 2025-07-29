<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'phone_no',
        'jobseeker_id',
        'job_user_id'
    ];

    public function jobseeker()
    {
        return $this->belongsTo(Jobseeker::class);
    }
    public function jobUser()
    {
        return $this->belongsTo(JobUser::class);
    }
}
