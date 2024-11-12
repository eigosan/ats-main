<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Filtering</title>
</head>
<body>
    <h1>Filter Your Resume</h1>

    <!-- Form to submit resume text for filtering -->
    <form action="{{ route('resume.filter.submit') }}" method="POST">
        @csrf
        <div>
            <label for="resume_text">Enter Your Resume Text:</label>
            <textarea id="resume_text" name="resume_text" rows="6" cols="50" required></textarea>
        </div>
        <div>
            <button type="submit">Filter Resume</button>
        </div>
    </form>
</body>
</html>
