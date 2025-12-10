<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();

        // search by name or student_id
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('student_id', 'like', "%{$search}%")
                  ->orWhere('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%");
            });
        }

        // filter by course
        if ($request->filled('course')) {
            $query->where('course_id', $request->course);
        }

        // get unique courses for dropdown
        $courses = Student::select('course_id')->distinct()->pluck('course_id');

        // paginate results
        $students = $query->paginate(15)->withQueryString();

        return view('students.index', compact('students', 'courses'));
    }
}
