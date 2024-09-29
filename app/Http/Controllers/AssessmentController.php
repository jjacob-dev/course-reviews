<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{

    
    public function details(string $id)
    {
        // Fetch course details for matching course code
        $assessment = Course::where('id', $id)->firstOrFail();

        return view('assessment-details', compact('assessment')); 
    }

}
