<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'description',
    ];

    // Relationship: A course has many assessments
    public function assessments()
    {
        return $this->hasMany(Assessment::class);
    }

    // Relationship: A course can have many students
    public function students()
    {
        return $this->belongsToMany(User::class, 'user_course');
    }
}
