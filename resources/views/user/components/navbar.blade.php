
<nav class="navbar navbar-expand-lg navbar-light shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="#"><span class="text-primary">One</span>-Health</a>

      <form action="#">
        <div class="input-group input-navbar">
          <div class="input-group-prepend">
            <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
          </div>
          <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
        </div>
      </form>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupport">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="doctors.html">Doctors</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="blog.html">News</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact</a>
          </li>
          @if(Route::has('login'))
          @auth
          {{-- <x-app-layout>
          </x-app-layout> --}}
          <li class="nav-item">
            <a class="nav-link" href="{{url('my_appointment')}}">My Appointments</a>
          </li>
          <li class = "nav-item">
              {{Auth::user()->name}}
          </li>
          <li class = "nav-item">
              <a href = "{{Route('logout')}}" class = "btn btn-primary btn btn-primary ml-lg-3">Logout</a>
          </li>
          @else
          <li class="nav-item">
            <a class="btn btn-primary ml-lg-3" href="{{Route('login')}}">Login</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-primary ml-lg-3" href="{{Route('register')}}">Register</a>
          </li>
          @endauth
          @endif
        </ul>
      </div> <!-- .navbar-collapse -->
    </div> <!-- .container -->
  </nav>
</header>