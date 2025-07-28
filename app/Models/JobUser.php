<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class JobUser extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function jobseeker()
    {
        return $this->hasOne(Jobseeker::class);
    }
    public function company()
    {
        return $this->hasOne(Company::class);
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
