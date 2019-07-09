@extends('layouts.app')



@section('content')
<div class="col-md-6 col-md-offset-3">

      <div class="panel panel-default">
        <div class="panel-heading">
          <h4><strong>Registrar</strong></h4>
        </div>
        <div class="panel-body">
          <ul>
            <li>Los campos marcados con <code>*</code> son obligatorios.</li>
          </ul>
        </div>
        <div class="panel-body">
          <form class="form-horizontal" autocomplete="off" role="form" method="POST" action="{{ url('/declarante') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('rfc') ? ' has-error' : '' }}">
              <label for="rfc" class="col-md-4 control-label">RFC: <code>*</code></label>
              <div class="col-md-6">
                <input id="rfc" type="text" class="form-control" name="rfc" value="{{ old('rfc') }}" maxlength="10" minlength="10" autofocus>
                @if ($errors->has('rfc'))
                <span class="help-block">
                  <strong>{{ $errors->first('rfc') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('homoclave') ? ' has-error' : '' }}">
              <label for="homoclave" class="col-md-4 control-label">Homoclave: <code>*</code></label>
              <div class="col-md-3">
                <input id="homoclave" type="text" class="form-control" name="homoclave" value="{{ old('homoclave') }}" maxlength="3" minlength="3">
                @if ($errors->has('homoclave'))
                <span class="help-block">
                  <strong>{{ $errors->first('homoclave') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
              <label for="nombres" class="col-md-4 control-label">Nombres: <code>*</code></label>
              <div class="col-md-6">
                <input id="nombres" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" maxlength="35">
                @if ($errors->has('nombre'))
                <span class="help-block">
                  <strong>{{ $errors->first('nombre') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('apellido_paterno') ? ' has-error' : '' }}">
              <label for="apellido_paterno" class="col-md-4 control-label">Apellido Paterno: <code>*</code></label>
              <div class="col-md-6">
                <input id="apellido_paterno" type="text" class="form-control" name="apellido_paterno" value="{{ old('apellido_paterno') }}" maxlength="35">
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
                <input id="apellido_materno" type="text" class="form-control" name="apellido_materno" value="{{ old('apellido_materno') }}" maxlength="35">
                @if($errors->has('apellido_materno'))
                <span class="help-block">
                  <strong>{{ $errors->first('apellido_materno') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <input id="password" type="hidden" class="form-control" value="declarapat" name="password">
            <input id="password-confirm" type="hidden" class="form-control" value="declarapat" name="password_confirmation">

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-danger">
                  <i class="fa fa-btn fa-user"></i> Registrar
                </button>
              </div>
            </div>
          </form>
        </div>
        <div class="panel-footer">
          <a href="{{ url('/') }}" class="btn btn-light text-danger">
            <i class="fa fa-arrow-left"></i>
            Regresar
          </a>
        </div>
      </div>

</div>
@endsection
