<!DOCTYPE html>
<html>

<head>
    <title>CV</title>
    <style>
        body {
            font-family: sans-serif;
        }

        h1 {
            color: navy;
        }
    </style>
</head>

<body>
    <h1>{{ $job_user->name }}</h1>
    <hr>
    <p><strong>Email:</strong> {{ $job_user->email }}</p>
    <hr>
    @forelse ($profile->phones as $phone)
        <p><strong>Phone:</strong>{{ $phone->phone_no }}</p>
    @empty
        -
    @endforelse
    <hr>
    <p><strong>Address:</strong> {{ $profile->address }}
        <hr>
    <h3>Work Experience:</h3>
    <p>{{ $profile->experience }}</p>
    <hr>
    <h3>Skills:</h3>
    <p>{{ $profile->skills }}</p>
    <hr>
    <h3>Education:</h3>
    <p>{{ $profile->education }}</p>
</body>

</html>
