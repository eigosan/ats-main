<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matched Resumes</title>
</head>
<body>
    <h1>Matched Resumes</h1>

    @if (count($matches) > 0)
        <ul>
            @foreach ($matches as $match)
                <li>{{ $match }}</li>
            @endforeach
        </ul>
    @else
        <p>No matches found. Please try again with a different resume.</p>
    @endif

    <a href="{{ route('resume.filter.form') }}">Back to Form</a>
</body>
</html>
