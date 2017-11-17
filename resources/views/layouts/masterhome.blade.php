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
  <div class="row">
  <div class="col-md-3">
  <a class="navbar-brand" href="/login"><img src="img/logo.svg" width="130"></a>
  </div>
  <div class="col-md-3"></div>
  <div class="col-md-6" >
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Manual de usuario</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/faq">Preguntas frecuentes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Glosario</a>
      </li>
    </ul>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  <i class="fa fa-user" aria-hidden="true"></i> Ingresar
</button>
</div> 
  </div>
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
        <div class="text"><h4>EmPaz es una herramienta en línea, desarrollada por la Fundación Ideas para la Paz (FIP) y la Cámara de Comercio de Bogotá (CCB), que permite evaluar los aportes en construcción de paz que genera una organización desde su gestión estratégica y mediante iniciativas en el marco de su operación comercial e inversión social. Está dirigida a empresas de cualquier tamaño y sector, a fundaciones empresariales, asociaciones y gremios.</h4>
        <a href="/registro" class="btn-registro"><i class="fa fa-user-plus" aria-hidden="true"></i> REGISTRARSE</a></div>
      </div>
    </div>
    <div class="carousel-item" id="slide2">
      <div class="content-slider">
        <div class="text"><h4>EmPaz es una herramienta en línea, desarrollada por la Fundación Ideas para la Paz (FIP) y la Cámara de Comercio de Bogotá (CCB), que permite evaluar los aportes en construcción de paz que genera una organización desde su gestión estratégica y mediante iniciativas en el marco de su operación comercial e inversión social. Está dirigida a empresas de cualquier tamaño y sector, a fundaciones empresariales, asociaciones y gremios.</h4>
        <a href="/registro" class="btn-registro"><i class="fa fa-user-plus" aria-hidden="true"></i> REGISTRARSE</a></div>
      </div>
    </div>
    <div class="carousel-item" id="slide3">
      <div class="content-slider">
        <div class="text"><h4>EmPaz es una herramienta en línea, desarrollada por la Fundación Ideas para la Paz (FIP) y la Cámara de Comercio de Bogotá (CCB), que permite evaluar los aportes en construcción de paz que genera una organización desde su gestión estratégica y mediante iniciativas en el marco de su operación comercial e inversión social. Está dirigida a empresas de cualquier tamaño y sector, a fundaciones empresariales, asociaciones y gremios.</h4>
        <a href="/registro" class="btn-registro"><i class="fa fa-user-plus" aria-hidden="true"></i> REGISTRARSE</a></div>
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
        </div></div>
  </div>
</div>  
</section>
  <div >
    @yield('content')
  </div>
</body>
<script src="/popper/umd/popper.js"></script>
<script src="/js/bootstrap-slider.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
  crossorigin="anonymous"></script>
<script src="/js/jquery.multi-select.js" type="text/javascript"></script>

</html>
