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
