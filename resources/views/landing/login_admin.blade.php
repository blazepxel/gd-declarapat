@extends('layouts.app')

@section('content')

    <div class="col-md-6 col-md-offset-3">

      <div class="panel panel-default">
        <div class="panel-heading"><strong>Acceso para Contralores:</strong></div>
        <div class="panel-body">

          <form class="form-horizontal" autocomplete="off" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('rfc') ? ' has-error' : '' }}">
              <label for="rfc" class="col-md-4 control-label">Usuario:</label>
              <div class="col-md-6">
                <input id="rfc_login" type="text" class="form-control" name="rfc" value="{{ old('rfc') }}" autofocus>
                @if ($errors->has('rfc'))
                <span class="help-block">
                  <strong>{{ $errors->first('rfc') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password" class="col-md-4 control-label">Contraseña:</label>
              <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password">
                @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-danger">
                  <i class="fa fa-btn fa-sign-in"></i> Entrar
                </button>
              </div>
            </div>
          </form>

        </div><!--panel-body-->

        <div class="panel-footer">
          <a href="{{ url('/') }}" class="btn btn-light text-danger">
            <i class="fa fa-arrow-left"></i>
            Regresar al Inicio
          </a>
        </div>

      </div><!--panel-->
    </div><!--col-md-8-->

@endsection
