@extends('layouts.app')

@section('content')

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>


    <div class="col-md-6 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-body" style="height:220px !important; margin: 20px 0 21px; text-align:center;">
          <img src="{{ asset('/img/banner_2.png') }}" alt="Sistema Declarapat">
        </div>
      </div>
    </div>

    <div class="col-md-4 ">
      <div class="panel panel-default">
        <div class="panel-heading" style="height:41px !important; "><strong>Para realizar tu declaración ingresa aquí:</strong></div>
        <div class="panel-body" style="min-height:220px !important;">

          <form class="form-horizontal" autocomplete="off" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('rfc') ? ' has-error' : '' }}">
              <div class="col-md-12">
                <p>Inicia sesión:</p>
                <input id="rfc_login" type="text" class="form-control" name="rfc" value="{{ old('rfc') }}" minlength="10" maxlength="10" placeholder="RFC" autofocus>
                @if ($errors->has('rfc'))
                <span class="help-block">
                  <strong>{{ $errors->first('rfc') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <div class="col-md-12">
                <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña:">
                @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-10 col-md-offset-1">
                <button type="submit" class="btn btn-danger btn-block" style="margin-top:13px;">
                  <i class="fa fa-btn fa-sign-in"></i> Entrar
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      @if(CARPETA == "mineraldelareforma" or CARPETA == "puruandiro" or CARPETA == "tarimbaro")
      <a class="text-danger" href="{{ url('/registrarse') }}">¿Nuevo usuario? Regístrate</a>
      @endif
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </div>


@endsection
