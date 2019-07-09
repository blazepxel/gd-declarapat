@extends('layouts.menu')




@section('campos')

            <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
              <label for="nombre" class="col-md-4 control-label">Nombre(s): <code>*</code></label>
              <div class="col-md-6">
                <input id="nombre" autofocus type="text" class="form-control" name="nombre" value="@if(old('nombre')){{ old('nombre') }}@else{{ $datos->nombre }}@endif" tabindex="{{ ++$tabindex }}" required maxlength="25">
                @if ($errors->has('nombre'))
                <span class="help-block">
                  <strong>{{ $errors->first('nombre') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('primer_apellido') ? ' has-error' : '' }}">
              <label for="primer_apellido" class="col-md-4 control-label">Primer Apellido: <code>*</code></label>
              <div class="col-md-6">
                <input id="primer_apellido" type="text" class="form-control" name="primer_apellido" value="@if(old('primer_apellido')){{ old('primer_apellido') }}@else{{ $datos->primer_apellido }}@endif" tabindex="{{ ++$tabindex }}" required maxlength="25">
                @if ($errors->has('primer_apellido'))
                <span class="help-block">
                  <strong>{{ $errors->first('primer_apellido') }}</strong>
                </span>CCCCCC
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('segundo_apellido') ? ' has-error' : '' }}">
              <label for="segundo_apellido" class="col-md-4 control-label">Segundo Apellido: </label>
              <div class="col-md-6">
                <input id="segundo_apellido" type="text" class="form-control" name="segundo_apellido" value="@if(old('segundo_apellido')){{ old('segundo_apellido') }}@else{{ $datos->segundo_apellido }}@endif" tabindex="{{ ++$tabindex }}" maxlength="25">
                @if ($errors->has('segundo_apellido'))
                <span class="help-block">
                  <strong>{{ $errors->first('segundo_apellido') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('curp') ? ' has-error' : '' }}">
              <label for="curp" class="col-md-4 control-label">CURP: <code>*</code></label>
              <div class="col-md-6">
                <input id="curp" type="text" class="form-control" name="curp" value="@if(old('curp')){{ old('curp') }}@else{{ $datos->curp }}@endif" tabindex="{{ ++$tabindex }}" required maxlength="18" minlength="18">
                @if ($errors->has('curp'))
                <span class="help-block">
                  <strong>{{ $errors->first('curp') }}</strong>
                </span>
                @endif
                <a href="https://www.gob.mx/curp/" target="_blank">
                  Obtener mi CURP
                </a>
              </div>
            </div>


            <div class="form-group{{ $errors->has('rfc') ? ' has-error' : '' }} {{ $errors->has('homoclave') ? ' has-error' : '' }}">
              <label for="homoclave" class="col-md-4 control-label">RFC/Homoclave: <code>*</code></label>
              <div class="col-md-4">
                <input id="rfc" type="text" class="form-control" name="rfc" value="{{ \Auth::user()->rfc }}" readonly>
                @if ($errors->has('rfc'))
                <span class="help-block">
                  <strong>{{ $errors->first('rfc') }}</strong>
                </span>
                @endif
              </div>
              <div class="col-md-2">
                <input id="homoclave" type="text" class="form-control" name="homoclave" value="@if(old('homoclave')){{ old('homoclave') }}@else{{ $datos->homoclave }}@endif" tabindex="{{ ++$tabindex }}" minlength="3" maxlength="3" placeholder="homoclave" required>
                @if ($errors->has('homoclave'))
                <span class="help-block">
                  <strong>{{ $errors->first('homoclave') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('email_laboral') ? ' has-error' : '' }}">
              <label for="email_laboral" class="col-md-4 control-label">E-mail Laboral:</label>
              <div class="col-md-6">
                <input id="email_laboral" type="email" class="form-control" name="email_laboral" value="@if(old('email_laboral')){{ old('email_laboral') }}@else{{ $datos->email_laboral }}@endif" tabindex="{{ ++$tabindex }}" maxlength="55">
                @if ($errors->has('email_laboral'))
                <span class="help-block">
                  <strong>{{ $errors->first('email_laboral') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('email_personal') ? ' has-error' : '' }}">
              <label for="email_personal" class="col-md-4 control-label">E-mail personal:</label>
              <div class="col-md-6">
                <input id="email_personal" type="email" class="form-control" name="email_personal" value="@if(old('email_personal')){{ old('email_personal') }}@else{{ $datos->email_personal }}@endif" tabindex="{{ ++$tabindex }}" maxlength="55">
                @if($errors->has('email_personal'))
                <span class="help-block">
                  <strong>{{ $errors->first('email_personal') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('estado_civil') ? ' has-error' : '' }}">
              <label for="estado_civil" class="col-md-4 estado_civil control-label">Estado Civil:<code>*</code></label>
              <div class="col-md-6">
                <select id="estado_civil" name="estado_civil" class="form-control" tabindex="{{ ++$tabindex }}" required>
                  <option></option>
                  @foreach($catalogos->estado_civil() as $estado)
                  <option
                    @if(old('estado_civil') == $estado->estado)
                    selected
                    @elseif($datos->estado_civil == $estado->estado and old('estado_civil') == null)
                    selected
                    @endif
                  >{{ $estado->estado }}</option>
                  @endforeach
                </select>
                @if($errors->has('estado_civil'))
                <span class="help-block">
                  <strong>{{ $errors->first('estado_civil') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div id="div_regimen" class="form-group{{ $errors->has('regimen') ? ' has-error' : '' }}">
              <label for="regimen_matrimonial" class="col-md-4 control-label">Régimen Matrimonial:<code>*</code></label>
              <div class="col-md-6">
                <select id="regimen_matrimonial" name="regimen_matrimonial" tabindex="{{ ++$tabindex }}" class="form-control">
                  <option></option>
                  @foreach($catalogos->regimen_matrimonial() as $regimen)
                  <option
                    @if($regimen->regimen == old('regimen_matrimonial'))
                    selected
                    @elseif($regimen->regimen == $datos->regimen_matrimonial and old('regimen_matrimonial') == null)
                    selected
                    @endif
                  >{{ $regimen->regimen }}</option>
                  @endforeach
                </select>
                @if($errors->has('regimen'))
                <span class="help-block">
                  <strong>{{ $errors->first('regimen') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('pais') ? ' has-error' : '' }}">
              <label for="pais" class="col-md-4 control-label">País de nacimiento:<code>*</code></label>
              <div class="col-md-6">
                <select id="pais" name="pais" tabindex="{{ ++$tabindex }}" class="form-control" required>
                  <option></option>
                  @foreach($catalogos->paises() as $pais)
                  <option
                    @if($pais->pais == old('pais'))
                    selected
                    @elseif($pais->pais == $datos->pais and old('pais') == null)
                    selected
                    @endif
                  >{{ $pais->pais }}</option>
                  @endforeach
                </select>
                @if($errors->has('pais'))
                <span class="help-block">
                  <strong>{{ $errors->first('pais') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div id="div_provincia" class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
              <label for="provincia" class="col-md-4 control-label">Provincia: <code>*</code></label>
              <div class="col-md-6">
                <input id="provincia" type="text" class="form-control" name="estado" value="@if(old('estado')){{ old('estado') }}@else{{ $datos->estado }}@endif" tabindex="{{ ++$tabindex }}" required maxlength="25">
                @if ($errors->has('estado'))
                <span class="help-block">
                  <strong>{{ $errors->first('estado') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div id="div_estado" class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
              <label for="estado" class="col-md-4 control-label">Estado donde nació:<code>*</code></label>
              <div class="col-md-6">
                <select id="estado" name="estado" tabindex="{{ ++$tabindex }}" class="form-control" required>
                  <option></option>
                  @foreach($catalogos->estados() as $estado)
                  <option
                    @if($estado->estado == old('estado'))
                    selected
                    @elseif($estado->estado == $datos->estado and old('estado') == null)
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


            <div class="form-group{{ $errors->has('nacionalidad') ? ' has-error' : '' }}">
              <label for="nacionalidad" class="col-md-4 control-label">Nacionalidad:<code>*</code></label>
              <div class="col-md-6">
                <select id="nacionalidad" name="nacionalidad" tabindex="{{ ++$tabindex }}" class="form-control" required>
                  <option></option>
                  @foreach($catalogos->nacionalidades() as $nacionalidad)
                  <option
                    @if($nacionalidad->nacionalidad == old('nacionalidad'))
                    selected
                    @elseif($nacionalidad->nacionalidad == $datos->nacionalidad and old('nacionalidad') == null)
                    selected
                    @endif
                  >{{ $nacionalidad->nacionalidad }}</option>
                  @endforeach
                </select>
                @if($errors->has('nacionalidad'))
                <span class="help-block">
                  <strong>{{ $errors->first('nacionalidad') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('celular') ? ' has-error' : '' }}">
              <label for="cel" class="col-md-4 control-label">Número Celular:</label>
              <div class="col-md-6">
                <input id="cel" name="celular" type="text" value="@if(old('celular')){{ old('celular') }}@else{{ $datos->celular }}@endif" tabindex="{{ ++$tabindex }}" class="form-control" minlength="10" maxlength="13">
                @if($errors->has('celular'))
                <span class="help-block">
                  <strong>{{ $errors->first('celular') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <!-- aclaraciones -->
            <div class="row">
              <div class="col-md-4  control-label">
                <div class="btn-group control-label">
                  <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#aclaracion">Agregar una aclaración:</button>
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="collapse" data-target="#aclaracion" aria-haspopup="true" aria-expanded="false" tabindex="{{ ++$tabindex }}">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                </div>
              </div>
            </div>


            <div class="collapse" id="aclaracion">
              <div class="form-group">
                <div class="col-md-12">
                  <br>
                    <textarea id="aclaraciones" rows="7" name="aclaraciones" tabindex="{{ ++$tabindex }}" placeholder="Aclaraciones únicamente sobre este formato"  class="form-control">@if(old('aclaraciones')){{ old('aclaraciones') }}@else{{ $datos->aclaraciones }}@endif</textarea>
                </div>
              </div>
            </div>
            <!--// aclaraciones -->

@endsection




@section('jquery')
<script>
$('#estado_civil').ready(mostrar_civil);
$('#estado_civil').on('change',mostrar_civil);

function mostrar_civil(){
  if($('#estado_civil').val() == "CASADO (A)")
  {
    $('#div_regimen').show('slow');
    $("#regimen_matrimonial").attr("required", "true");
  }
  else
  {
    $('#div_regimen').hide('slow');
    $("#regimen_matrimonial").removeAttr("required");
  }
}


$('#pais').ready(mostrar_pais);
$('#pais').on('change',mostrar_pais);

function mostrar_pais(){
  if($("#pais").val() == "MEXICO")
  {
    $('#div_estado').show('slow');
    $("#estado").attr("required", "true");
    $("#estado").attr("name", "estado");

    $('#div_provincia').hide('slow');
    $("#provincia").removeAttr("required");
    $("#provincia").removeAttr("name");
  }
  else
  {
    $('#div_estado').hide('slow');
    $("#estado").removeAttr("required");
    $("#estado").removeAttr("name");

    $('#div_provincia').show('slow');
    $("#provincia").attr("required", "true");
    $("#provincia").attr("name","estado");
  }
}
</script>
@endsection
