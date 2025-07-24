<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('jobseeker.dashboard') }}">Job Entry</a>
        <div class="d-flex">
            <form action={{ route('logout') }} method="POST">
                @csrf
                <a href="{{ route('home.page') }}" class="btn btn-secondary">Website</a>
                <button type="submit" class="btn btn-outline-light">Logout</button>
            </form>
        </div>
    </div>
</nav>
