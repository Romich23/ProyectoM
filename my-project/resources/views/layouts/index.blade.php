<!doctype html>
 <html lang="en">
 <head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
  <title>@yield('title', 'ITCH')</title>
 </head>
 <body>
  <!-- header -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
    <div class="container">
      <a class="navbar-brand" href="#">ITCH</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                @if (auth()->user()->getRole() == 'admin')
                                <div class="d-flex">
                                  <a
                                      href="{{ url('/dashboard') }}"
                                      class="nav-link active"
                                  >
                                      Dashboard
                                  </a>
                                  <form id="logout" action="{{ route('logout') }}" method="POST">
                                    <a role="button" class="nav-link active"
                                        onclick="document.getElementById('logout').submit();">Cerrar Sesión</a>
                                    @csrf
                                 </form>
                                </div>
                                    @else
                                    <form id="logout" action="{{ route('logout') }}" method="POST">
                                    <a role="button" class="nav-link active"
                                        onclick="document.getElementById('logout').submit();">Cerrar Sesión</a>
                                    @csrf
                                 </form>
                                @endif
                                @else
                                <div class="d-flex">
                                  <a
                                      href="{{ route('login') }}"
                                      class="navbar-brand"
                                  >
                                      Log in
                                  </a>
  
                                  @if (Route::has('register'))
                                      <a
                                          href="{{ route('register') }}"
                                          class="navbar-brand"
                                      >
                                          Register
                                      </a>
                                </div>

                                    @endif
                                @endauth
                            </nav>
                        @endif
        </div>
      </div>
    </div>
  </nav>
  <header class="masthead bg-primary text-white text-center py-4">
    <div class="container d-flex align-items-center flex-column">
      <h2>@yield('subtitle', 'Reportes ITCH')</h2>
    </div>
  </header>
  <!-- header -->
  <div class="container my-4">
    @yield('content')
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
 </body>
 </html>
