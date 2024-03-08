<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnvironmentType extends Model
{
    use HasFactory;
    protected $table = 'environment_type';
    protected $fillable = [
        'description',
    ];
    public function learning_environments()
    {
        return $this->hasMany(Learning_Environment::class);
    }
}


