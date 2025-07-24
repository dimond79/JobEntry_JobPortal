<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_no',
        'cv_file',
        'message',
        'job_id',
        'status',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
