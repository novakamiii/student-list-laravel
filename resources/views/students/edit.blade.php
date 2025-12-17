<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h2>Edit Student</h2>

    <form method="POST" action="/students/{{ $student->id }}">
        @csrf
        @method('PUT')

        <p><strong>Student ID:</strong> {{ $student->student_id }}</p>

        <input name="first_name" value="{{ old('first_name', $student->first_name) }}" required>
        <input name="last_name" value="{{ old('last_name', $student->last_name) }}" required>

        <select name="course_id">
            @foreach (['BSIT', 'BSHM', 'BSBA', 'BSHR', 'BSCS'] as $course)
                <option value="{{ $course }}" {{ $student->course_id == $course ? 'selected' : '' }}>
                    {{ $course }}
                </option>
            @endforeach
        </select>

        <select name="is_passed">
            <option value="1" {{ $student->is_passed ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ !$student->is_passed ? 'selected' : '' }}>No</option>
        </select>

        <button type="submit">Update</button>
    </form>

</body>

</html>
