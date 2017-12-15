<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>EmPaz - @yield('title')</title>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
    crossorigin="anonymous">
  <link rel="stylesheet" href="/css/bootstrap-slider.css">
  <link href="/css/multi-select.css" media="screen" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="/styles.css">
  <link rel="stylesheet" href="/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto+Mono:100,100i,300,300i,400,400i,500,500i,700,700i|Roboto+Slab:100,300,400,700|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
    rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/js/fusioncharts.charts.js"></script>
<script src="/js/fusioncharts.js"></script>
<script src="/js/fusioncharts.powercharts.js"></script>
</head>

<body>
  <header class="master">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="/home">
            <img src="/img/logo-b.svg" width="130">
          </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
        </button>

          <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link" href="/dummypdf.pdf" target="_blank">Manual de usuario</a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" href="/faq">FAQs</a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" href="/glosario">Glosario</a>
                    </li>

                    @if(Auth::user())
                    <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"><i class="fa fa-user-circle-o" aria-hidden="true"></i> {{ Auth::user()->nombre }} Acciones
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                              <a class="dropdown-item" href="{{ Auth::user()->role === 'empresa' ? '/profile/empresa' : '/profile/user' }}">Perfil</a>
                              @if(Auth::user()->role === 'superadmin')
                              <div class="menu-usuarios">
                                  <a class="dropdown-item" href="/users"><i class="fa fa-user" aria-hidden="true"></i> Usuarios</a>
                              </div>
                              @endif
                               @if(Auth::user()->role === 'experto' || Auth::user()->role === 'superadmin')
                                  <a class="dropdown-item" href="/cuestionarios"><i class="fa fa-list-ul" aria-hidden="true"></i> Cuestionario</a>
                                  <a class="dropdown-item" href="/dimensiones"><i class="fa fa-list-ul" aria-hidden="true"></i> Dimensiones</a>
                                  <a class="dropdown-item" href="/indicadores"><i class="fa fa-area-chart" aria-hidden="true"></i> Indicadores</a>
                                  <a class="dropdown-item" href="/preguntas"><i class="fa fa-question-circle" aria-hidden="true"></i></i> Preguntas</a>
                              @endif
                              @if(Auth::user()->role === 'empresa')
                              <a class="dropdown-item" href="/responder"><i class="fa fa-list-ul" aria-hidden="true"></i> Cuestionario</a>
                              @endif
                              @if(Auth::user()->role === 'consulta' || Auth::user()->role === 'superadmin')
                              <a class="dropdown-item" href="/preguntas"><i class="fa fa-question-circle" aria-hidden="true"></i></i> Dashboard</a>
                              @endif
                              <div class="menu-logout">
                                  <a class="logout-link dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();"><i class="fa fa-lock" aria-hidden="true"></i> 
                                  Cerrar sesión
                                  </a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}
                                  </form>
                              </div>

                          </div>
                    </li>
                    @endif
              </ul>
          </div>
    </nav>
  </header>
  <div class="container app-container">
    @yield('content')
  </div>
</body>

<script src="/popper/umd/popper.js"></script>
<script src="/js/bootstrap-slider.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
  crossorigin="anonymous"></script>
<script src="/js/jquery.multi-select.js" type="text/javascript"></script>
<script type="text/javascript">
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })

</script>

</html>