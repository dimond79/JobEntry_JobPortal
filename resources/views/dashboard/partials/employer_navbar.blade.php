 <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
     <div class="container-fluid">
         <a class="navbar-brand" href="{{ route('employer.dashboard') }}">Job Entry | Employer Dashboard</a>
         <div class="d-flex">
             <form action="{{ route('logout') }}" method="POST" class="d-inline">
                 @csrf
                 <button type="submit" class="btn btn-outline-light">Logout</button>
             </form>
         </div>
     </div>
 </nav>
