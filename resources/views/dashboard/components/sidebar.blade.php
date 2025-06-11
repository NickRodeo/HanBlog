<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary d-md-flex flex-column">
  <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="sidebarMenuLabel">HanBlog</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto h-100 vh-100 ">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="{{ url("/dashboard") }}">
            <svg class="bi"><use xlink:href="#house-fill"/></svg>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2" href="{{ url("/dashboard/posts") }}">
            <svg class="bi"><use xlink:href="#file-earmark"/></svg>
            My Posts
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2" href="{{ url("/") }}">
            <svg class="bi"><use xlink:href="#arrow-left-circle"/></svg> Back to Home
          </a>
        </li>
      </ul>
      @can('admin')
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
          <span>Administrator</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <svg class="bi"><use xlink:href="#plus-circle"/></svg>
          </a>
        </h6>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="{{ url("dashboard/categories") }}">
              <svg class="bi"><use xlink:href="#file-earmark-text"/></svg>
              Categories
            </a>
          </li>
        </ul>        
      @endcan
      <hr class="my-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <form action="{{ url('/logout') }}" method="POST">
            @csrf
            <button class="nav-link d-flex align-items-center gap-2">
              <svg class="bi"><use xlink:href="#door-closed"/></svg>
              Log out
            </button>
           </form>
        </li> 
      </ul>
    </div>
  </div>
</div>
