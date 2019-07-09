@extends('layouts.app')



@section('content')
<div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4><strong>Editar Mis Datos</strong></h4>
        </div>
        <div class="panel-body">
          <ul>
            <li>Los campos marcados con <code>*</code> son obligatorios.</li>
          </ul>
        </div>
        <div class="panel-body">
          <form class="form-horizontal" autocomplete="off" role="form" method="POST" action="{{ url('/declarante/'.Auth::user()->rfc) }}">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}

          @if(Auth::user()->esadmin == 1)
          <fieldset>
            <legend>Datos de la Institución:</legend>

            <div id="div_estado" class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
              <label for="estado" class="col-md-4 control-label">Entidad de la Institución:<code>*</code></label>
              <div class="col-md-6">
                <select id="estado" name="estado" tabindex="{{ ++$tabindex }}" class="form-control" required>
                  <option></option>
                  @foreach($catalogos->estados() as $estado)
                  <option
                    @if($estado->estado == $config->estado or $estado->estado == old('estado'))
                    selected
                    @endif
                  >{{ $estado->estado }}</option>
                  @endforeach
                </select>
                @if($errors->has('estado'))
                <span class="help-block">
                  <strong>{{ $errors->first('estado') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('institucion') ? ' has-error' : '' }}">
              <label for="institucion" class="col-md-4 control-label">Institución: <code>*</code></label>
              <div class="col-md-6">
                <input id="institucion" type="text" class="form-control" name="institucion" value="@if(old('institucion')){{ old('institucion') }}@else{{ $config->institucion }}@endif" maxlength="40" placeholder="H. Ayuntamiento de..." autofocus required>
                @if ($errors->has('institucion'))
                <span class="help-block">
                  <strong>{{ $errors->first('institucion') }}</strong>
                </span>
                @endif
                <code>Institución / Organismo / Dependencia en la que se declara</code>
              </div>
            </div>


            <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
              <label for="telefono" class="col-md-4 control-label">Teléfono: <code>*</code></label>
              <div class="col-md-6">
                <input id="telefono" type="text" class="form-control" name="telefono" value="@if(old('telefono')){{ old('telefono') }}@else{{ $config->telefono }}@endif" maxlength="16" placeholder="(722) 274 04 24" required>
                @if ($errors->has('telefono'))
                <span class="help-block">
                  <strong>{{ $errors->first('telefono') }}</strong>
                </span>
                @endif
                <code>Teléfono de la oficina de contraloría de tu institución</code>
              </div>
            </div>
          </fieldset>

          <p>&nbsp;</p>
          @endif

          <fieldset>
            @if(Auth::user()->esadmin == 1)
            <legend>Datos del Administrador:</legend>
            <div class="form-group{{ $errors->has('rfc') ? ' has-error' : '' }}">
              <label for="nombres" class="col-md-4 control-label">Usuario: <code>*</code></label>
              <div class="col-md-6">
                <input id="rfc" type="text" class="form-control" name="rfc" value="@if(old('rfc')){{ old('rfc') }}@else{{ $user->rfc }}@endif" maxlength="35">
                @if ($errors->has('rfc'))
                <span class="help-block">
                  <strong>{{ $errors->first('rfc') }}</strong>
                </span>
                @endif
                <code>Usuario para ingresar al panel de contralor</code>
              </div>
            </div>
            @endif


            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password" class="col-md-4 control-label">Contraseña: <code>*</code></label>
              <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" maxlength="35">
                @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
              <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña: <code>*</code></label>
              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" maxlength="35">
                @if($errors->has('password-confirm'))
                <span class="help-block">
                  <strong>{{ $errors->first('password-confirm') }}</strong>
                </span>
                @endif
              </div>
            </div>
          </fieldset>


            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-danger">
                  <i class="glyphicon glyphicon-saved"></i> Guardar
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
