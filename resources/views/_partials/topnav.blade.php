<nav class="navbar navbar-expand-md navbar-light bg-white">
    <div class="container">
    <a class="navbar-brand" href="/"><b>HELPDESK</b></a>
    </div>
    <div class="d-flex justify-content-between">
    <div>
      <ul class="navbar-nav mr-auto">
        @if(Auth::check())
        <li class="nav-item">
          <a class="nav-link" href="/logout">Logout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/help-request">Help Requests</a>
        </li>

        @else
                <li class="nav-item">
          <a class="nav-link" href="/get-help">Request Help</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="/register">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/login">Login</a>
        </li>
        @endif
        </ul>
    </div>
    </div>
  </nav>