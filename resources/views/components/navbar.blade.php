<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ url('/') }}">HanBlog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'active' : ''}}" aria-current="page" href="{{ url('/') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('posts') ? 'active' : ''}}" href="{{ url('/posts') }}">Posts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('categories*') ? 'active' : ''}}" href="{{ url('/categories') }}">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('about') ? 'active' : ''}}" href="{{ url('/about') }}">About</a>
          </li>
        </ul>
        @auth
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;">
              Welcome, {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="{{ url("/dashboard") }}">Dashboard</a></li>
              <li>
                <form action="/logout" method="POST">
                  @csrf
                  <button class="dropdown-item">Logout</button>
                </form>
              </li>
            </ul>
          </li>
        </ul>
        @else
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link btn px-4" href="{{ url('/login') }}">Login</a>
            </li>
          </ul>
        @endauth
        
      </div>
    </div>
  </nav>