<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student List</title>
</head>

<body>
    <h2 class="text-xl font-bold mb-4">Student List</h2>

    <form method="GET" action="/students" class="mb-4 flex gap-3">
        <!-- Search -->
        <input type="text" name="search" placeholder="Search student" value="{{ request('search') }}"
            class="border px-3 py-1 rounded">

        <!-- Course Filter -->
        <select name="course" class="border px-3 py-1 rounded">
            <option value="">All Courses</option>
            @foreach ($courses as $course)
                <option value="{{ $course }}" {{ request('course') == $course ? 'selected' : '' }}>
                    {{ $course }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="px-4 py-1 bg-blue-600 text-white rounded">
            Filter
        </button>
    </form>

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-2 py-1">Student ID</th>
                <th class="border px-2 py-1">Name</th>
                <th class="border px-2 py-1">Course</th>
                <th class="border px-2 py-1">Passed</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td class="border px-2 py-1">{{ $student->student_id }}</td>
                    <td class="border px-2 py-1">{{ $student->first_name }} {{ $student->last_name }}</td>
                    <td class="border px-2 py-1">{{ $student->course_id }}</td>
                    <td class="border px-2 py-1">{{ $student->is_passed ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="/students/{{ $student->id }}/edit">Edit</a>

                        <form action="/students/{{ $student->id }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Delete this student?')">Delete</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="/students/create" class="mb-3 inline-block bg-green-600 text-white px-4 py-1 rounded">
        + Add Student
    </a>


    <div class="mt-4">
        {{ $students->links() }}
    </div>

</body>

</html>
