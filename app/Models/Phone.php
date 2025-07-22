<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

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
