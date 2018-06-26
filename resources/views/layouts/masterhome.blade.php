<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" value="{{ old('viewport') }}" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>EmPaz - Medición Empresarial para la Paz</title>
  <meta name="description" content="EmPaz es una herramienta en línea, desarrollada por la Fundación Ideas para la Paz (FIP) y la Cámara de Comercio de Bogotá (CCB), que permite evaluar los aportes a la construcción de paz que genera una organización desde su gestión estratégica y a través de iniciativas, en el marco de su operación comercial e inversión social. Está dirigida a empresas de cualquier tamaño y sector, a fundaciones empresariales, asociaciones y gremios.">
  <meta name="keywords" content="Empresas,Paz">
  <meta name="author" content="FIP, CCB">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
    crossorigin="anonymous">
  <link rel="stylesheet" href="/css/bootstrap-slider.css">
  <link rel="shortcut icon" href="favicon.ico"/>
  <link href="/css/multi-select.css" media="screen" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="/styles.css">
  <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto+Mono:100,100i,300,300i,400,400i,500,500i,700,700i|Roboto+Slab:100,300,400,700|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
<!-- [if IE]>
  <style type="text/css">
  .container{
    transform: translateX(-25%);
}
</style>
<![endif] -->
</head>



<body>
<div id="mensaje"></div>
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/login"><img src="img/logo.png" width="130"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
         <a class="nav-link" href="/acerca">Acerca de Empaz</a>
      </li>
        <li class="nav-item">
          <a class="nav-link" href="/manual">Manual</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/faqs">Preguntas frecuentes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/glosario">Glosario</a>
        </li>

        <!-- If user is authenticated -->
        @if(Auth::user())
        <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Acciones de usuario
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  @if(Auth::user()->role === 'superadmin')
                  <div class="menu-usuarios">
                      <a class="dropdown-item" href="/users"><i class="dropdown-icon fa fa-users" aria-hidden="true"></i>Usuarios</a>
                  </div>
                  @endif
                   @if(Auth::user()->role === 'experto' || Auth::user()->role === 'superadmin')
                      <a class="dropdown-item" href="/cuestionarios"><i class="dropdown-icon fa fa-list-ul" aria-hidden="true"></i>Cuestionario</a>
                      <a class="dropdown-item" href="/dimensiones"><i class="dropdown-icon fa fa-pie-chart" aria-hidden="true"></i>Dimensiones</a>
                      <a class="dropdown-item" href="/indicadores"><i class="dropdown-icon fa fa-area-chart" aria-hidden="true"></i>Indicadores</a>
                      <a class="dropdown-item" href="/preguntas"><i class="dropdown-icon fa fa-question-circle" aria-hidden="true"></i></i>Preguntas</a>
                      <a class="dropdown-item" href="/files"><i class="dropdown-icon fa fa-copy" aria-hidden="true"></i></i>Archivos</a>
                  @endif
                  @if(Auth::user()->role != 'consulta')
                  <a class="dropdown-item" href="/responder"><i class="dropdown-icon fa fa-briefcase" aria-hidden="true"></i>EmPaz</a>
                  @endif
                  @if(Auth::user()->role === 'consulta' || Auth::user()->role === 'superadmin')
                  <a class="dropdown-item" href="/dashboard"><i class="dropdown-icon fa fa-tachometer" aria-hidden="true"></i>Resultados</a>
                  @endif
                  <a class="dropdown-highlight dropdown-item" href="{{ Auth::user()->role === 'empresa' ? '/profile/empresa' : '/profile/user' }}"><i class="dropdown-icon fa fa-info-circle" aria-hidden="true"></i>Perfil</a>
                  <a class="dropdown-highlight dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"><i class="dropdown-icon fa fa-sign-out" aria-hidden="true"></i>Salir</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>

              </div>
        </li>
      </ul>
      @else
      </ul>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        <i class="fa fa-user" aria-hidden="true"></i> Ingresar
      </button>
      @endif
    </div>

</nav>
</header>
<section>
<div class="content-text">
    <div class="text">
      <div class="back-ground">
      <div class="home-text">
        <h2>¡Bienvenido a EmPaz!</h2>
        <h4>Esta herramienta, desarrollada por la <strong>Fundación Ideas para la Paz (FIP)</strong> y la <strong>Cámara de Comercio de Bogotá (CCB)</strong>, mide los aportes empresariales a la construcción de paz. Es gratis, interactiva, y está dirigida a empresas de cualquier tamaño y sector. </h4>
        <h4>Diligenciar EmPaz le permitirá contestar preguntas sobre diversos aspectos relacionados con la paz y la prevención de conflictos desde la operación comercial y la inversión social de su empresa. Los resultados obtenidos son presentados en un informe de diagnóstico con algunas recomendaciones para mejorar sus aportes a este propósito, acorde a su nivel de cumplimiento de los indicadores de medición establecidos.</h4>
        <h4>Completar la evaluación le llevará alrededor de 1 a 2 horas, si tiene toda la información disponible. El registro de los datos de su empresa y los resultados de la evaluación son estrictamente confidenciales.</h4>
      </div>
    </div>
      @if(!Auth::user())
      <a href="/registro" class="btn-registro"><i class="fa fa-user-plus" aria-hidden="true"></i> REGISTRARSE</a>
      @endif
      <div class="flecha">
        <a class="" href="#section02"><img src="img/flecha-ini.svg" style="height: 50px; width: 50px;"></a>
      </div>
      <h4 style="color: #fff">Conozca más</h4>
  </div>
</div>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active" id="slide1">
      <div class="content-slider">
        </div>
    </div>
    <div class="carousel-item" id="slide2">
      <div class="content-slider">
      </div>
    </div>
    <div class="carousel-item" id="slide3">
      <div class="content-slider">
      </div>
    </div>
  </div>
</div>
<div class="creditos">Foto: Revista Semana</div>
</section>
<section id="section02">
<div class="container">
  <div class="row">
    <div class="col-md-5 circular" style="margin-top:5%">
      <img src="/img/content1.jpg">
      <p class="cre">Foto: Revista Semana</p>
    </div>
    <div class="col-md-7">
      <div class="text">
        <h3>Empresas y paz: un buen negocio</h3>

        <h4>Las empresas sostenibles prosperan en entornos estables y pacíficos. Estos entornos eliminan los costos directos e indirectos de la violencia, mejoran la calidad de los mercados, aumentan los rendimientos financieros y favorecen la atracción de capital de inversión. Por esto, apostarle a la paz no solo significa hacer un aporte al bienestar de la sociedad: es un buen negocio.</h4>
        <h4>Aplicar EmPaz le permite a su empresa:</h4>

        <ul>
        <li>Identificar fortalezas y oportunidades de mejora para la construcción de paz en su área de influencia.</li>
        <li>Realizar un proceso de autoevaluación y aprendizaje interno para el mejoramiento continuo de la gestión.</li>
        <li>Obtener insumos para la toma de decisiones a nivel estratégico y operativo.</li>
        <li>Mejorar la capacidad de análisis y gestión de riesgos económicos, sociales, en derechos humanos y prevención de conflictos de su organización.</li>
        <li>Visibilizar ante sus grupos de interés internos y externos, oportunidades y resultados de su empresa en la construcción de paz.</li>
        </ul>
      </div>
    </div>
  </div>
</div>
</section>

<div class="modal {{ !$errors->has('auth') ? 'fade' : '' }}" id="exampleModal" data-keep-showing="{{ $errors->has('auth') }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
      <div class="col-md-5 derecha">
        <h3>Registrar nueva empresa</h3>
         <a href="/registro">Crear nuevo perfil</a>
      </div>
      <div class="col-md-7">
      <h3>Ingresar</h3>
         <div class="panel panel-default">

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col-md-10">
                              <i class="fa fa-user" aria-hidden="true"></i>
                                <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" value="{{ old('email') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="col-md-10">
                              <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                <input id="password" type="password" placeholder="Contraseña" class="form-control" name="password" value="{{ old('password') }}" required>
                            </div>
                        </div>

                        <div class="form-group" id="contentemail">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" value="{{ old('remember') }}" {{ old('remember') ? 'checked' : '' }}> Recordarme
                                    </label>
                                </div>
                            </div>
                            @if ($errors)
                                <span class="help-block">
                                    <strong>{{ $errors->first() }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-primary">
                                    Ingresar
                                </button>

                                <a class="recuperarpass" style="color: #fff!important;" href="{{ route('password.request') }}">
                                    ¿Olvidó su contraseña?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div></div></div>
      </div>
    </div>
  </div>
</div>


<footer>
  <div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6">
      <a href="http://ideaspaz.org/" target="_blank"><img src="http://ideaspaz.org/img/website/graphics/logo.svg" width="100"></a>
      <a class="navbar-brand" href="https://www.ccb.org.co/" target="_blank"><img src="/img/CCB_140.png" width="190"></a>
    </div>
  </div>
</footer>

  <!-- <div >
    @yield('content')
  </div> -->

</body>
<script type="text/javascript">
  $(function () {
      $('*[data-keep-showing="1"]').modal('show').addClass('fade'); // Keep showing login modal when there are errors.
  });
</script>
<script src="/popper/umd/popper.js"></script>
<script src="/js/bootstrap-slider.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
  crossorigin="anonymous"></script>
<script src="/js/jquery.multi-select.js" type="text/javascript"></script>
<script type="text/javascript">
  var mensaje = document.cookie.split('mensaje=')[1];
  if(mensaje != null) document.getElementById('mensaje').style.display = 'none';
  else document.cookie = 'mensaje=visto;path=/';

  $(window).scroll(function () {
      if ($(this).scrollTop() >= 120) {
        $('.navbar').addClass("bgcolor");
        $('.navbar').removeClass("bg-light");
      } else {
        $('.navbar').addClass("bg-light");
        $('.navbar').removeClass("bgcolor");
      }
});

      $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {

            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 2000);
                return false;
            }
        }
    });
</script>
@yield('inlinejs')
</html>
