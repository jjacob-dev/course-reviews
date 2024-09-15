<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'instructions',
        'due_date',
        'type',
    ];

    // Relationship: An assessment belongs to a course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
