<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scheduling_environment extends Model
{
    use HasFactory;

    protected $table = 'scheduling_environment';


    protected $fillable = [
        'course_id',
        'instructor_id',
        'date_scheduling',
        'initial_hour',
        'final_hour',
        'environment_id',

    ];

    public function scheduling_environments()
    {
        return $this->belongsTo(Scheduling_environment::class);
    }

    public function courses()
    {
        return $this->belongsTo(Course::class);
    }

    public function learning_environments()
    {
        return $this->belongsTo(Learning_environment::class);
    }

    public function instructors()
    {
        return $this->belongsTo(Instructor::class);
    }

}
