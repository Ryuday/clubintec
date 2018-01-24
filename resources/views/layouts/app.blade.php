<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ config('app.name', 'Clubintec') }}
    </title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-default bg-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <!-- Collapsed Hamburger -->
        <a class="navbar-brand" href="{{ url('/') }}">Clubintec</a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
            <span class="sr-only">Clubintec</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
          <!-- Authentication Links -->
          @guest
            @if (Request::url() == route('register') || Request::url() == route('contact'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Iniciar Sesion</a>
              </li>
            @endif
            @if (Request::url() == route('login') || Request::url() == route('contact'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Registrar</a>
              </li>
            @endif
            @if (Request::url() == route('login') || Request::url() == route('register'))
              <li class="nav-item">
                <a href="{{ route('contact') }}">Contacto</a>
              </li>
            @endif
          @else
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->username }}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('contact') }}">Contacto</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                  Cerrar Sesión
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </div>
            </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>
      <div id="app">
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                <div class="panel-heading">
                    @yield('subtitle', 'Iniciar Sesión')
                </div>
                <div class="panel-body">
                  @include('flash::message')
                  @yield('content')
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
