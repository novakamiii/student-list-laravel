<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Student</title>
</head>

<body>
    <h2 class="text-xl font-bold mb-4">Add Student</h2>

    @if ($errors->any())
        <div class="mb-3 text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/students">
        @csrf

        <div>
            <label>Student ID (optional)</label><br>
            <input type="text" name="student_id" value="{{ old('student_id') }}">
            <small>Leave blank to auto-generate</small>
        </div>

        <div class="mb-2">
            <label>First Name</label><br>
            <input type="text" name="first_name" value="{{ old('first_name') }}" required>
        </div>

        <div class="mb-2">
            <label>Last Name</label><br>
            <input type="text" name="last_name" value="{{ old('last_name') }}" required>
        </div>

        <div class="mb-2">
            <label>Course</label><br>
            <select name="course_id" required>
                <option value="">Select Course</option>
                @foreach (['BSIT', 'BSHM', 'BSBA', 'BSHR', 'BSCS'] as $course)
                    <option value="{{ $course }}" {{ old('course_id') == $course ? 'selected' : '' }}>
                        {{ $course }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            <label>Passed?</label><br>
            <select name="is_passed" required>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <button type="submit">Save</button>
    </form>

</body>

</html>
