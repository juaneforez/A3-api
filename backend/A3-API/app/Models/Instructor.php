<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;
    protected $table = 'instructor';

    protected $fillable = [
        'document',
        'fullname',
        'sena_email',
        'personal_email',
        'phone',
        'password',
        'remember_token',
        'type',
        'profile',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function learning_environments()
    {
        return $this->hasMany(Learning_environment::class);
    }

    public function scheduling_environments()
    {
        return $this->hasMany(Scheduling_environment::class);
    }

}
