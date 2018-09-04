<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="{{ url('/') }}">
      ACCOUNTINGSOFTWARE
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>
  <div class="navbar-end">
      @auth
        <div class="navbar-item">
          <div class="field">
            <p class="control">
              <i class="fa fa-user m-r-5"></i>
              {{ Auth::user()->name }}
            </p>
          </div>
        </div>
        <div class="navbar-item">
          <div class="field">
            <p class="control">
              <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="button is-danger" type="submit">
                  <span class="icon">
                    <i class="fa fa-sign-out"></i>
                  </span>
                  <span>Logout</span>
                </button>
              </form>
            </p>
          </div>
        </div>
      @endauth
      @if (Request::is('login'))
          <a class="navbar-item" href="{{ route('register') }}">
            Register
          </a>
      @elseif (Request::is('register'))
        <a class="navbar-item" href="{{ route('login') }}">
          Login
        </a>
      @endif
    </div>
</nav>