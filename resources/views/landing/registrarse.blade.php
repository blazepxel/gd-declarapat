@extends('layouts.app')

@section('content')

    <div class="col-md-8 col-md-offset-2">

      <div class="panel panel-default">
        <div class="panel-heading"><h4>Registrarse:</h4></div>

        <div class="panel-body">

          <form class="form-horizontal" role="form" autocomplete="off" method="POST" action="{{ url('/registrarse') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
              <label for="nombre" class="col-md-4 control-label">Nombre:</label>
              <div class="col-md-6">
                <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required tabindex="{{ ++$tabindex }}" maxlength="25">
                @if ($errors->has('nombre'))
                <span class="help-block">
                  <strong>{{ $errors->first('nombre') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('apellido_paterno') ? ' has-error' : '' }}">
              <label for="apellido_paterno" class="col-md-4 control-label">Apellido Paterno:</label>
              <div class="col-md-6">
                <input id="apellido_paterno" type="text" class="form-control" name="apellido_paterno" value="{{ old('apellido_paterno') }}" required tabindex="{{ ++$tabindex }}" maxlength="25">
                @if ($errors->has('apellido_paterno'))
                <span class="help-block">
                  <strong>{{ $errors->first('apellido_paterno') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('apellido_materno') ? ' has-error' : '' }}">
              <label for="apellido_materno" class="col-md-4 control-label">Apellido Materno:</label>
              <div class="col-md-6">
                <input id="apellido_materno" type="text" class="form-control" name="apellido_materno" value="{{ old('apellido_materno') }}" required tabindex="{{ ++$tabindex }}" maxlength="25">
                @if ($errors->has('apellido_materno'))
                <span class="help-block">
                  <strong>{{ $errors->first('apellido_materno') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('rfc') ? ' has-error' : '' }}">
              <label for="rfc" class="col-md-4 control-label">Usuario/RFC:</label>
              <div class="col-md-6">
                <input id="rfc" type="text" class="form-control" name="rfc" value="{{ old('rfc') }}" required tabindex="{{ ++$tabindex }}" minlength="10" maxlength="10">
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
                <input id="password" type="password" class="form-control" name="password" required tabindex="{{ ++$tabindex }}" minlength="6" maxlength="20">
                @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
              <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña:</label>
              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required tabindex="{{ ++$tabindex }}" minlength="6" maxlength="20">
                @if ($errors->has('password_confirmation'))
                <span class="help-block">
                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-danger" tabindex="{{ ++$tabindex }}">
                  <i class="fa fa-btn fa-user"></i> Registrarse
                </button>
              </div>
            </div>
          </form>

        </div>

        <div class="panel-footer">
          <a href="{{ url('/') }}" class="btn btn-light text-danger">
            <i class="fa fa-arrow-left"></i>
            Regresar al Inicio
          </a>
        </div><!--footer-->

      </div><!--panel-->
    </div><!--col-md-8-->

@endsection
