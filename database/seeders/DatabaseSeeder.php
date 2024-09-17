<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Course;
use App\Models\Assessment;



use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Seed 5 Teachers
        $teachers = User::factory()->count(5)->create([
            'type' => 'teacher', // Set type to student
        ]);

        // Seed 50 Students
        $students = User::factory()->count(50)->create([
            'type' => 'student', // Set type to student
        ]);

        // Seed 5 Courses
      
        // Update course values
        Course::insert([
            ['name' => 'Web Application Development', 'code' => '2703ICT', 'description' => 'This course presents a systematic introduction to the development of dynamic, community-based, Web applications through the integration of HTML/CSS'],
            ['name' => 'Interactive App Development', 'code' => '2701ICT', 'description' => 'This course focuses on the implementation of highly interactive application development. The course introduces essential concepts, techniques and software tools'],
            ['name' => 'Data Management', 'code' => '1814ICT', 'description' => 'This course shows that Information derived from data is important to the management, productivity and competitive advantage of an organisation.'],
            ['name' => 'Software Technologies', 'code' => '2810ICT', 'description' => 'This course first gives an overview of low-level technologies such as programming with a focus on code reuse, scripting techniques and software configuration tools.'],
            ['name' => 'Programming Principles', 'code' => '1811ICT', 'description' => 'This course develops skills and concepts that are essential to good programming practice and problem solving.'],
        ]);

        $courses = Course::all();

        // Seed 5 assessments 
        Assessment::insert([
            ['title' => 'Assignment1', 'instructions' => 'Basically you gotta finish the assignment', 'due_date' => '2024-09-21 14:00:00', 'type' => 'student-select', 'course_id' => 1],
            ['title' => 'Assignment2', 'instructions' => 'Basically you gotta finish the assignment', 'due_date' => '2024-09-21 14:00:00', 'type' => 'student-select', 'course_id' => 2],
            ['title' => 'Assignment3', 'instructions' => 'Basically you gotta finish the assignment', 'due_date' => '2024-09-21 14:00:00', 'type' => 'student-select', 'course_id' => 3],
            ['title' => 'Assignment4', 'instructions' => 'Basically you gotta finish the assignment', 'due_date' => '2024-09-21 14:00:00', 'type' => 'teacher-assign', 'course_id' => 4],
            ['title' => 'Assignment5', 'instructions' => 'Basically you gotta finish the assignment', 'due_date' => '2024-09-21 14:00:00', 'type' => 'teacher-assign', 'course_id' => 5],
        ]);

        // Put each teacher in random courses
        foreach ($teachers as $teacher) {
            $randomCourses = $courses->random(rand(1, 2)); 
            foreach ($randomCourses as $course) {
                DB::table('user_courses')->insert([
                    'user_id' => $teacher->id,
                    'course_id' => $course->id,
                ]);
            }
        }

        // Enroll each student in random courses
        foreach ($students as $student) {
            $randomCourses = $courses->random(rand(1, 3)); 
            foreach ($randomCourses as $course) {
                DB::table('user_courses')->insert([
                    'user_id' => $student->id,
                    'course_id' => $course->id,
                ]);
            }
        }
    }
}
