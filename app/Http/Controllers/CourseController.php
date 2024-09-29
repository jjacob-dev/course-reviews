<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function enroll(Request $request)
    {
        $courseId = $request->input('course_id');
        $user = auth()->user();
        
        // Check if user is already enrolled
        if (!$user->courses()->where('course_id', $courseId)->exists()) {
            
            DB::table('user_courses')->insert([
                'user_id' => $user->id,
                'course_id' => $courseId,
            ]);

            return response()->json(['success' => true, 'message' => 'You have been enrolled']);
        }

        return response()->json(['success' => false, 'message' => 'Already enrolled']);
    }

    public function enrolled()
    {
        $user = auth()->user(); 
        // Fetch all courses from the database
        $courses = $user->courses;

        return view('home', compact('user', 'courses')); 
    }

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

        $assessments = $course->assessments;
       
        return view('course-details', compact('course', 'teachers', 'assessments')); 
    }

}
