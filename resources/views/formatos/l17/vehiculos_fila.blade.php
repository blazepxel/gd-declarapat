@extends('layouts.menu')



@section('campos')

            <div class="form-group{{ $errors->has('operacion') ? ' has-error' : '' }}">
              <label for="INCORPORACION" class="col-md-4 control-label">Tipo de operación:<code>*</code></label>
              <div class="col-md-6">
                <label>
                  <input id="INCORPORACION" type="radio" name="operacion" value="INCORPORACION" tabindex="{{ ++$tabindex }}" checked required>
                  INCORPORACIÓN
                </label>
                <label>
                  <input id="SINIESTRO" type="radio" name="operacion" value="SINIESTRO" tabindex="{{ ++$tabindex }}" @if($datos->ubicacion == "MEXICO" or old('ubicacion') == "EXTRANJERO") checked  @endif required>
                  SINIESTRO
                </label>
                <label>
                  <input id="VENTA" type="radio" name="operacion" value="VENTA" tabindex="{{ ++$tabindex }}" @if($datos->ubicacion == "MEXICO" or old('ubicacion') == "EXTRANJERO") checked  @endif required>
                  VENTA
                </label>
              </div>
            </div>


            <div  class="form-group{{ $errors->has('marca') ? ' has-error' : '' }}">
              <label for="marca" class="col-md-4 control-label">Marca:<code>*</code></label>
              <div class="col-md-6">
              <input id="marca" type="text" class="form-control" name="marca" tabindex="{{ ++$tabindex }}" value="@if(old('tipo')){{ old('tipo') }}@else{{ $datos->tipo }}@endif" maxlength="35" required>
                @if($errors->has('marca'))
                <span class="help-block">
                  <strong>{{ $errors->first('marca') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
              <label for="tipo" class="col-md-4 control-label">Tipo: <code>*</code></label>
              <div class="col-md-4">
                <input id="tipo" type="text" class="form-control" name="tipo" tabindex="{{ ++$tabindex }}" value="@if(old('tipo')){{ old('tipo') }}@else{{ $datos->tipo }}@endif" maxlength="35" required>
                @if ($errors->has('tipo'))
                <span class="help-block">
                  <strong>{{ $errors->first('tipo') }}</strong>
                </span>
                @endif
                <code>Jetta, Tsuru, Camioneta, etc</code>
              </div>
            </div>


            <div class="form-group{{ $errors->has('modelo') ? ' has-error' : '' }}">
              <label for="modelo" class="col-md-4 control-label">Modelo: <code>*</code></label>
              <div class="col-md-4">
                <input id="modelo" type="text" class="form-control" name="modelo" tabindex="{{ ++$tabindex }}" value="@if(old('modelo')){{ old('modelo') }}@else{{ $datos->modelo }}@endif" maxlength="35" required>
                @if ($errors->has('modelo'))
                <span class="help-block">
                  <strong>{{ $errors->first('modelo') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('serie') ? ' has-error' : '' }}">
              <label for="serie" class="col-md-4 control-label">Serie: <code>*</code></label>
              <div class="col-md-4">
                <input id="modelo" type="text" class="form-control" name="serie" tabindex="{{ ++$tabindex }}" value="@if(old('serie')){{ old('serie') }}@else{{ $datos->serie }}@endif" maxlength="35" required>
                @if ($errors->has('serie'))
                <span class="help-block">
                  <strong>{{ $errors->first('serie') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('ubicacion') ? ' has-error' : '' }}">
              <label for="MEXICO" class="col-md-4 control-label">País de registro:<code>*</code></label>
              <div class="col-md-6">
                <label>
                  <input id="MEXICO" type="radio" name="ubicacion" value="MEXICO"     tabindex="{{ ++$tabindex }}" @if(old('ubicacion') == "MEXICO")     checked @elseif($datos->ubicacion == "MEXICO"     and old('ubicacion') == null) checked @endif required>
                  MEXICO
                </label>
                &nbsp;&nbsp;&nbsp;
                <label>
                  <input             type="radio" name="ubicacion" value="EXTRANJERO" tabindex="{{ ++$tabindex }}" @if(old('ubicacion') == "EXTRANJERO") checked @elseif($datos->ubicacion == "EXTRANJERO" and old('ubicacion') == null) checked @endif>
                  EXTRANJERO
                </label>
              </div>
            </div>


            <div id="div_estado" class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
              <label for="estado" class="col-md-4 control-label">Estado de registro:<code>*</code></label>
              <div class="col-md-6">
                <select id="estado" name="estado" tabindex="{{ ++$tabindex }}" class="form-control" required autofocus>
                  <option></option>
                  @foreach($catalogos->estados() as $estado)
                  <option value="{{ $estado->id }}"
                    @if($estado->id == old('estado'))
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


            <div id="div_pais" class="form-group{{ $errors->has('pais') ? ' has-error' : '' }}">
              <label for="pais" class="col-md-4 control-label">País de registro:<code>*</code></label>
              <div class="col-md-6">
                <select id="pais" name="pais" tabindex="{{ ++$tabindex }}" class="form-control">
                  <option></option>
                  @foreach($catalogos->paises('MEXICO') as $pais)
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

        <fieldset>
          <legend>DATOS DE ADQUISICIÓN</legend>



          <div  class="form-group{{ $errors->has('forma_adquisicion') ? ' has-error' : '' }}">
              <label for="forma_adquisicion" class="col-md-4 control-label">Forma de adquisición:<code>*</code></label>
              <div class="col-md-6"7>
                <select id="forma_adquisicion" name="forma_adquisicion" tabindex="{{ ++$tabindex }}" class="form-control">
                  <option></option>
                  <option>CESION</option>
                  <option>CONTADO</option>
                  <option>CREDITO</option>
                  <option>DONACION</option>
                  <option>HERENCIA</option>
                  <option>PERMUTA</option>
                  <option>RIFA O SORTEO</option>
                  <option>TRASPASO</option>
                </select>
                @if($errors->has('forma_adquisicion'))
                <span class="help-block">
                  <strong>{{ $errors->first('forma_adquisicion') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('nombre_cesionario') ? ' has-error' : '' }}">
              <label for="nombre_cesionario" class="col-md-4 control-label">Nombre o razón social del cesionario, autor de la donacion o herencia: <code>*</code></label>
              <div class="col-md-6">
                <input id="nombre_cesionario" type="text" class="form-control" name="nombre_cesionario" tabindex="{{ ++$tabindex }}" value="@if(old('nombre_cesionario')){{ old('nombre_cesionario') }}@else{{ $datos->nombre_cesionario }}@endif" maxlength="35" required>
                @if ($errors->has('nombre_cesionario'))
                <span class="help-block">
                  <strong>{{ $errors->first('nombre_cesionario') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('relacion_cesionario') ? ' has-error' : '' }}">
              <label for="relacion_cesionario" class="col-md-4 control-label">Relación del cesionario, del autor de la donación, herencia con el titular:<code>*</code></label>
              <div class="col-md-6">
                <select id="relacion_cesionario" name="relacion_cesionario" tabindex="{{ ++$tabindex }}" class="form-control" required>
                  <option></option>
                  <option>CONYUGE</option>
                  <option>CONCUBINARIO</option>
                  <option>PADRE</option>
                  <option>MADRE</option>
                  <option>ABUELO</option>
                  <option>BISABUELO</option>
                  <option>TATARABUELO</option>
                  <option>HIJO</option>
                  <option>NIETO</option>
                  <option>BISNIETO</option>
                  <option>TATARANIETO</option>
                  <option>HERMANO</option>
                  <option>MEDIO HERMANO</option>
                  <option>TIO</option>
                  <option>PRIMO</option>
                  <option>SOBRINO</option>
                  <option>SUEGRO</option>
                  <option>CUÑADO</option>
                  <option>CONCUÑO</option>
                  <option>ADOPTADO</option>
                  <option>ADOPTANTE</option>
                  <option>OTRO (ESPECIFICAR EN ACLARACIONES)</option>
                </select>
                @if($errors->has('relacion_cesionario'))
                <span class="help-block">
                  <strong>{{ $errors->first('relacion_cesionario') }}</strong>
                </span>
                @endif
                <code>En caso de ser otro especificar en aclaraciones</code>
              </div>
            </div>


            <div class="form-group{{ $errors->has('valor_adquisicion') ? ' has-error' : '' }} {{ $errors->has('moneda_adquisicion') ? ' has-error' : '' }}">
              <label for="valor_adquisicion" class="col-md-4 control-label">Valor del vehículo al momento de la adquisición: <code>*</code></label>
              <div class="col-md-3">
                <input id="valor_adquisicion" type="text" class="form-control" name="valor_adquisicion" value="@if(old('valor_adquisicion')){{ old('valor_adquisicion') }}@else{{ $datos->valor_adquisicion }}@endif" tabindex="{{ ++$tabindex }}" required>
                @if ($errors->has('valor_adquisicion'))
                <span class="help-block">
                  <strong>{{ $errors->first('valor_adquisicion') }}</strong>
                </span>
                @endif
              </div>
              <div class="col-md-3">
                <input id="moneda_adquisicion" type="text" class="form-control" name="moneda_adquisicion" value="MXN" tabindex="{{ ++$tabindex }}"  placeholder="TIPO MONEDA" required>
                @if ($errors->has('moneda_adquisicion'))
                <span class="help-block">
                  <strong>{{ $errors->first('moneda_adquisicion') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('fecha_adquisicion') ? ' has-error' : '' }}">
              <label for="fecha_adquisicion" class="col-md-4 control-label">Fecha de adquisición: <code>*</code></label>
              <div class="col-md-4">
                <input id="fecha_adquisicion" type="date" class="form-control" name="fecha_adquisicion" tabindex="{{ ++$tabindex }}" value="@if(old('fecha_adquisicion')){{ old('fecha_adquisicion') }}@else{{ $datos->fecha_adquisicion }}@endif" required>
                @if ($errors->has('fecha_adquisicion'))
                <span class="help-block">
                  <strong>{{ $errors->first('fecha_adquisicion') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('titular') ? ' has-error' : '' }}">
              <label for="titular" class="col-md-4 control-label">Titular:<code>*</code></label>
              <div class="col-md-6">
                <select id="titular" name="titular" tabindex="{{ ++$tabindex }}" class="form-control" required>
                  <option></option>
                  <option>CONCUBINARIO</option>
                  <option>CONYUGE</option>
                  <option>CONYUGE EN COPROPIEDAD</option>
                  <option>DECLARANTE</option>
                  <option>DECLARANTE EN COPROPIEDAD</option>
                  <option>DECLARANTE Y CONYUGE</option>
                  <option>DEPENDIENTE</option>
                </select>
                @if($errors->has('titular'))
                <span class="help-block">
                  <strong>{{ $errors->first('titular') }}</strong>
                </span>
                @endif
              </div>
            </div>
          </fieldset>

        <fieldset id="datos_operacion">
          <h3>DATOS OPERACION</h3>

            <div id="div_estado" class="form-group{{ $errors->has('forma_operacion') ? ' has-error' : '' }}">
              <label for="forma_operacion" class="col-md-4 control-label">Forma de operación:<code>*</code></label>
              <div class="col-md-6">
                <select id="forma_operacion" name="forma_operacion" tabindex="{{ ++$tabindex }}" class="form-control" required>
                  <option></option>
                  <option>CESION</option>
                  <option>CONTADO</option>
                  <option>CREDITO</option>
                  <option>DONACION</option>
                  <option>HERENCIA</option>
                  <option>PERMUTA</option>
                  <option>RIFA O SORTEO</option>
                  <option>TRASPASO</option>
                </select>
                @if($errors->has('forma_operacion'))
                <span class="help-block">
                  <strong>{{ $errors->first('forma_operacion') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('valor_operacion') ? ' has-error' : '' }} {{ $errors->has('moneda_operacion') ? ' has-error' : '' }}">
              <label for="valor_operacion" class="col-md-4 control-label">Valor de la operación: <code>*</code></label>
              <div class="col-md-3">
                <input id="valor_operacion" type="text" class="form-control" name="valor_operacion" value="@if(old('valor_operacion')){{ old('valor_operacion') }}@else{{ $datos->valor_operacion }}@endif" tabindex="{{ ++$tabindex }}" required>
                @if ($errors->has('valor_operacion'))
                <span class="help-block">
                  <strong>{{ $errors->first('valor_operacion') }}</strong>
                </span>
                @endif
              </div>
              <div class="col-md-3">
                <input id="moneda_operacion" type="text" class="form-control" name="moneda_operacion" value="MXN" tabindex="{{ ++$tabindex }}" placeholder="TIPO MONEDA" required>
                @if ($errors->has('moneda_operacion'))
                <span class="help-block">
                  <strong>{{ $errors->first('moneda_operacion') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('fecha_venta') ? ' has-error' : '' }}">
              <label for="fecha_venta" class="col-md-4 control-label">Fecha de la venta: <code>*</code></label>
              <div class="col-md-4">
                <input id="fecha_venta" type="date" class="form-control" name="fecha_venta" tabindex="{{ ++$tabindex }}" value="@if(old('fecha_venta')){{ old('fecha_venta') }}@else{{ $datos->fecha_ventas }}@endif" required>
                @if ($errors->has('fecha_venta'))
                <span class="help-block">
                  <strong>{{ $errors->first('fecha_venta') }}</strong>
                </span>
                @endif
              </div>
            </div>
          </fieldset>


          <fieldset id="datos_siniestro">
            <legend>DATOS SINIESTRO</legend>

            <div id="div_estado" class="form-group{{ $errors->has('tipo_siniestro') ? ' has-error' : '' }}">
              <label for="tipo_siniestro" class="col-md-4 control-label">Tipo de siniestro:<code>*</code></label>
              <div class="col-md-6">
                <select id="tipo_siniestro" name="tipo_siniestro" tabindex="{{ ++$tabindex }}" class="form-control" required>
                  <option></option>
                  <option>ALUD</option>
                  <option>COLISION</option>
                  <option>EXPLOSION</option>
                  <option>GRANIZO</option>
                  <option>HURACAN</option>
                  <option>INCENDIO</option>
                  <option>INUNDACION</option>
                  <option>ROBO</option>
                  <option>TERREMOTO</option>
                  <option>TORNADO</option>
                  <option>VOLCAN</option>
                </select>
                @if($errors->has('tipo_siniestro'))
                <span class="help-block">
                  <strong>{{ $errors->first('tipo_siniestro') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div id="div_estado" class="form-group{{ $errors->has('aseguradora') ? ' has-error' : '' }}">
              <label for="aseguradora" class="col-md-4 control-label">Aseguradora:<code>*</code></label>
              <div class="col-md-6">
                <input id="aseguradora" type="text" class="form-control" name="aseguradora" tabindex="{{ ++$tabindex }}" value="" required>
                @if($errors->has('aseguradora'))
                <span class="help-block">
                  <strong>{{ $errors->first('aseguradora') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('fecha_siniestro') ? ' has-error' : '' }}">
              <label for="fecha_siniestro" class="col-md-4 control-label">Fecha del siniestro: <code>*</code></label>
              <div class="col-md-4">
                <input id="fecha_siniestro" type="date" class="form-control" name="fecha_siniestro" tabindex="{{ ++$tabindex }}" value="@if(old('fecha_siniestro')){{ old('fecha_siniestro') }}@else{{ $datos->fecha_siniestro }}@endif" required>
                @if ($errors->has('fecha_siniestro'))
                <span class="help-block">
                  <strong>{{ $errors->first('fecha_siniestro') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('valor_siniestro') ? ' has-error' : '' }} {{ $errors->has('moneda_siniestro') ? ' has-error' : '' }}">
              <label for="valor_siniestro" class="col-md-4 control-label">Valor de la operación: <code>*</code></label>
              <div class="col-md-3">
                <input id="valor_siniestro" type="text" class="form-control" name="valor_siniestro" value="@if(old('valor_siniestro')){{ old('valor_siniestro') }}@else{{ $datos->valor_siniestro }}@endif" tabindex="{{ ++$tabindex }}" required>
                @if ($errors->has('valor_siniestro'))
                <span class="help-block">
                  <strong>{{ $errors->first('valor_siniestro') }}</strong>
                </span>
                @endif
              </div>
              <div class="col-md-3">
                <input id="moneda_siniestro" type="text" class="form-control" name="moneda_siniestro" value="MXN" tabindex="{{ ++$tabindex }}"  placeholder="TIPO MONEDA" required>
                @if ($errors->has('moneda_siniestro'))
                <span class="help-block">
                  <strong>{{ $errors->first('moneda_siniestro') }}</strong>
                </span>
                @endif
              </div>
            </div>
          </fieldset>

@endsection




@section('jquery')
<script>
$("input[name='ubicacion']").ready(mostrar);
$("input[name='ubicacion']").change(mostrar);

$("input[name='operacion']").ready(mostrar_operacion);
$("input[name='operacion']").change(mostrar_operacion);


function mostrar_operacion()
{
  var radioValueb = $("input[name='operacion']:checked").val();

  if(radioValueb == "INCORPORACION")
  {
    $('#datos_siniestro').hide('slow');
    $('#datos_operacion').hide('slow');

    $("#tipo_siniestro").removeAttr("required", "required");
    $("#aseguradora").removeAttr("required", "required");
    $("#fecha_siniestro").removeAttr("required", "required");
    $("#valor_siniestro").removeAttr("required", "required");
    $("#moneda_siniestro").removeAttr("required", "required");

    $("#forma_operacion").removeAttr("required", "required");
    $("#valor_operacion").removeAttr("required", "required");
    $("#fecha_venta").removeAttr("required", "required");
    $("#moneda_siniestro").removeAttr("required", "required");
  }
  else if(radioValueb == "SINIESTRO")
  {
    $('#datos_siniestro').show('slow');
    $('#datos_operacion').hide('slow');

    $("#forma_operacion").removeAttr("required", "required");
    $("#valor_operacion").removeAttr("required", "required");
    $("#fecha_venta").removeAttr("required", "required");
    $("#moneda_siniestro").removeAttr("required", "required");
  }
  else if(radioValueb == "VENTA")
  {
    $('#datos_operacion').show('slow');
    $('#datos_siniestro').hide('slow');

    $("#tipo_siniestro").removeAttr("required", "required");
    $("#aseguradora").removeAttr("required", "required");
    $("#fecha_siniestro").removeAttr("required", "required");
    $("#valor_siniestro").removeAttr("required", "required");
    $("#moneda_siniestro").removeAttr("required", "required");
  }
}





function mostrar()
{
  var radioValue = $("input[name='ubicacion']:checked").val();

  if(radioValue == "EXTRANJERO")
  {
    $('#div_pais').show('slow');
    $('#div_provincia').show('slow');

    $('#div_estado').hide('slow');

    $('#pais').attr("required", "required");
    $('#provincia').attr("required", "required");

    $("#estado").removeAttr("required");
  }
  else
  {
    $('#div_pais').hide('slow');
    $('#div_provincia').hide('slow');

    $('#div_estado').show('slow');

    $("#pais").removeAttr("required");
    $("#provincia").removeAttr("required");

    $('#estado').attr("required", "required");
  }
}
</script>
@endsection
