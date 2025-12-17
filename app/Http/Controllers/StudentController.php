<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    private function generateStudentId(): string
    {
        $year = now()->year;
        $random = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        $suffix = rand(0, 9);

        return "{$year}-{$random}{$suffix}-SP-0";
    }

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

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'nullable|unique:students,student_id',
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'course_id'  => 'required|in:BSIT,BSHM,BSBA,BSHR,BSCS',
            'is_passed'  => 'required|boolean',
        ]);

        // auto-generate only if empty
        $validated['student_id'] = $validated['student_id']
            ?? $this->generateStudentId();

        Student::create($validated);

        return redirect('/students')->with('success', 'Student added');
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'course_id'  => 'required|in:BSIT,BSHM,BSBA,BSHR,BSCS',
            'is_passed'  => 'required|boolean',
        ]);

        $student->update($validated);

        return redirect('/students')->with('success', 'Student updated');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect('/students')->with('success', 'Student deleted');
    }
}
