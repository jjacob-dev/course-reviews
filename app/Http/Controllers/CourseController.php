<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        // Fetch all courses from the database
        $courses = Course::all();

        return view('courses', compact('courses')); 
    }

    public function details(string $code)
    {
        // Fetch course details for matching course code
        $course = Course::where('code', $code)->firstOrFail();

        $teachers = $course->users()->where('type', 'teacher')->get();
       
        return view('course-details', compact('course', 'teachers')); 
    }

}
