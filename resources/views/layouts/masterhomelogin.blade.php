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
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto+Mono:100,100i,300,300i,400,400i,500,500i,700,700i|Roboto+Slab:100,300,400,700|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

</head>

<body>
<header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="/home">
            <img src="/img/logo-b.svg" width="130">
          </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

          <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link" href="#">Manual de usuario</a>
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
                              <div class="dropdown-divider"></div>
                               @if(Auth::user()->role === 'experto' || Auth::user()->role === 'superadmin')
                                  <a class="dropdown-item" href="/cuestionarios"><i class="fa fa-list-ul" aria-hidden="true"></i> Cuestionario</a>
                                  <a class="dropdown-item" href="/dimensiones"><i class="fa fa-list-ul" aria-hidden="true"></i> Dimensiones</a>
                                  <a class="dropdown-item" href="/indicadores"><i class="fa fa-area-chart" aria-hidden="true"></i> Indicadores</a>
                                  <a class="dropdown-item" href="/preguntas"><i class="fa fa-question-circle" aria-hidden="true"></i></i> Preguntas</a>
                              @endif @if(Auth::user()->role === 'empresa')
                              <a class="dropdown-item" href="/responder"><i class="fa fa-list-ul" aria-hidden="true"></i> Cuestionario</a>
                              @endif

                              <div class="dropdown-divider"></div>

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
<section>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active" id="slide1">
      <div class="content-slider">
        <div class="text"><h4><strong>EmPaz</strong> es una herramienta en línea, desarrollada por la Fundación Ideas para la Paz (FIP) y la Cámara de Comercio de Bogotá (CCB), que permite evaluar los aportes en construcción de paz que genera una organización desde su gestión estratégica y mediante iniciativas en el marco de su operación comercial e inversión social. Está dirigida a empresas de cualquier tamaño y sector, a fundaciones empresariales, asociaciones y gremios.</h4>
        <!-- <a href="http://104.131.34.207/register" class="btn-registro"><i class="fa fa-user-plus" aria-hidden="true"></i> REGISTRASE</a></div> -->
      </div>
    </div>
    <div class="carousel-item" id="slide2">
      <div class="content-slider">
        <div class="text"><h4><strong>EmPaz</strong> es una herramienta en línea, desarrollada por la Fundación Ideas para la Paz (FIP) y la Cámara de Comercio de Bogotá (CCB), que permite evaluar los aportes en construcción de paz que genera una organización desde su gestión estratégica y mediante iniciativas en el marco de su operación comercial e inversión social. Está dirigida a empresas de cualquier tamaño y sector, a fundaciones empresariales, asociaciones y gremios.</h4>
       <!--  <a href="http://104.131.34.207/register" class="btn-registro"><i class="fa fa-user-plus" aria-hidden="true"></i> REGISTRASE</a></div> -->
      </div>
    </div>
    <div class="carousel-item" id="slide3">
      <div class="content-slider">
        <div class="text"><h4><strong>EmPaz</strong> es una herramienta en línea, desarrollada por la Fundación Ideas para la Paz (FIP) y la Cámara de Comercio de Bogotá (CCB), que permite evaluar los aportes en construcción de paz que genera una organización desde su gestión estratégica y mediante iniciativas en el marco de su operación comercial e inversión social. Está dirigida a empresas de cualquier tamaño y sector, a fundaciones empresariales, asociaciones y gremios.</h4>
        <!-- <a href="http://104.131.34.207/register" class="btn-registro"><i class="fa fa-user-plus" aria-hidden="true"></i> REGISTRASE</a></div> -->
      </div>
    </div>
  </div>
</div>
</section>
<section id="section02">
  <div class="container">
  <div class="row">
    <div class="col-md-5 circular">
      <img src="/img/content1.jpg">
    </div>
    <div class="col-md-7"><div class="text">
    <h3>¿Por qué una herramienta de medición empresarial para la paz?</h3>

    <h4>Cada vez más empresas quieren invertir en la construcción de paz, pero no saben cómo, ni cómo medir los resultados de sus actividades al respecto. Las que ya están realizando acciones valiosas en la materia, también necesitan lineamientos sobre cómo planear y dar seguimiento a estas acciones y cómo superar las brechas.</h4>

<h4>Aplicar EmPaz le permite a la organización:</h4>

<ul>
<li>Identificar fortalezas y oportunidades de mejora para la construcción de paz en el área de influencia de la empresa.</li>
<li>Realizar un proceso de autoevaluación y aprendizaje interno para el mejoramiento continuo de la gestión.</li>
<li>Obtener insumos para la toma de decisiones a nivel estratégico y operativo.</li>
<li>Mejorar la capacidad de análisis y gestión de riesgos económicos, sociales, en derechos humanos y prevención de conflictos de la organización.</li>
<li>Visibilizar ante los grupos de interés internos y externos, oportunidades y resultados de la empresa en construcción de paz.</li>
        <!-- <a href="/registero" class="btn-registro"><i class="fa fa-user-plus" aria-hidden="true"></i> REGISTRASE</a></div></div> -->
  </div>
</div>  
</section>
</body>
<script src="/popper/umd/popper.js"></script>
<script src="/js/bootstrap-slider.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
  crossorigin="anonymous"></script>
<script src="/js/jquery.multi-select.js" type="text/javascript"></script>

</html>
