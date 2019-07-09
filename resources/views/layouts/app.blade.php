<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Declaración Patrimonial</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" media="all" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('/personalizame.css') }}">

  <link rel="stylesheet" href="{{ asset('/ie.css') }}">

  @yield('css')
</head>

<body id="app-layout">
<h1 class="ie">ESTA PAGINA NO ES VISIBLE EN INTERNET EXPLORER.</h1>
<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header">

      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a class="navbar-brand">
        {{ $config['institucion'] }}
      </a>
    </div>

    <div class="collapse navbar-collapse" id="app-navbar-collapse">
      <ul class="nav navbar-nav navbar-right">

        @if (Auth::guest())
        <li><a href="{{ url('/administrador') }}">Acceso para Contralores</a></li>
        @else
        <li>
          <a>
            {{ Auth::user()->nombre }}
          </a>
        </li>
        <li>
          <a href="{{ url('/salir') }}">
            <strong><i class="fa fa-btn fa-sign-out"></i> Salir</strong>
          </a>
        </li>
        @endif

      </ul>
    </div>
  </div>
</nav>

@yield('nocontent')

<div class="container">
  <div class="row">
    <div class="col-md-12">

      @include('layouts.alert')

      <p>&nbsp;</p>

      @yield('content')

    </div>
  </div><!--row-->
</div><!--container-->

<footer class="page-footer font-small blue">
  <div class="footer-copyright text-center py-3">
    Instructivo para el llenado de la declaración. Consúltalo <a target="_blank" class="text-danger" href="https://declaranet.gob.mx/DeclaranetPlusWebapp/resources/pdf/llenado.pdf">Aquí</a>
    <br><span class="text-muted">Sistema de declaración patrimonial para municipios</span>
  </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    @yield('jquery')
</body>
</html>
