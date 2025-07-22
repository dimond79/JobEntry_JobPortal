<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Job Entry | Employer Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Job Entry</a>
            <div class="d-flex">
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-light">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h2>Welcome, Employer!</h2>
            <p class="text-muted">Manage your job postings and applicants on Job Entry.</p>
        </div>

        <div class="row g-4">

            <!-- Post New Job -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Post a Job</h5>
                        <p class="card-text">Create and publish a new job vacancy.</p>
                        <a href="/employer/jobs/create" class="btn btn-sm btn-dark">Post Job</a>
                    </div>
                </div>
            </div>

            <!-- Manage Jobs -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Manage Jobs</h5>
                        <p class="card-text">Edit, delete, or review your job listings.</p>
                        <a href="/employer/jobs" class="btn btn-sm btn-dark">View Jobs</a>
                    </div>
                </div>
            </div>

            <!-- Applications -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">View Applications</h5>
                        <p class="card-text">Review candidates who applied for your jobs.</p>
                        <a href="/employer/applications" class="btn btn-sm btn-dark">View Applications</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>
