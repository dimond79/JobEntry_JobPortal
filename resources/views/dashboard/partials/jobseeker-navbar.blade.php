<nav class="navbar navbar-expand-lg navbar-dark bg-primary py-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('jobseeker.dashboard') }}">Job Entry | JobSeeker Dashboard</a>
        <div class="d-flex">
            <form action={{ route('logout') }} method="POST">
                @csrf
                <a href="{{ route('home.page') }}" class="btn btn-secondary">Website</a>
                <button type="submit" class="btn btn-outline-light">Logout</button>
            </form>
        </div>
    </div>
</nav>
