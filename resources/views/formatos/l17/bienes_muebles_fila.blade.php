@extends('layouts.menu')



@section('campos')

            <div class="form-group{{ $errors->has('operacion') ? ' has-error' : '' }}">
              <label for="INCORPORACION" class="col-md-4 control-label">Tipo de operación:<code>*</code></label>
              <div class="col-md-6">
                <label>
                  <input id="INCORPORACION" type="radio" name="operacion" value="INCORPORACION" tabindex="{{ ++$tabindex }}" @if($datos->ubicacion == "MEXICO" or old('ubicacion') == "EXTRANJERO") checked  @endif required>
                  INCORPORACIÓN
                </label>
                <label>
                  <input type="radio" name="operacion" value="VENTA" tabindex="{{ ++$tabindex }}" @if($datos->ubicacion == "MEXICO" or old('ubicacion') == "EXTRANJERO") checked  @endif required>
                  VENTA
                </label>
              </div>
            </div>


            <div class="form-group{{ $errors->has('tipo_bien') ? ' has-error' : '' }}">
              <label for="tipo_bien" class="col-md-4 control-label">Tipo de bien:<code>*</code></label>
              <div class="col-md-6">
                <select id="tipo_bien" name="tipo_bien" tabindex="{{ ++$tabindex }}" class="form-control" required autofocus>
                  <option></option>
                  <option>COLECCIONES</option>
                  <option>JOYAS</option>
                  <option>MENAJE DE CASA (MUEBLES Y ACCESORIOS)</option>
                  <option>NINGUNO DE LOS ANTERIORES</option>
                  <option>OBRAS DE ARTE</option>
                  <option>SEMOVIENTE</option>
                </select>
                @if($errors->has('descripcion'))
                <span class="help-block">
                  <strong>{{ $errors->first('tipo_bien') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
              <label for="descripcion" class="col-md-4 control-label">Descrición del bien: <code>*</code></label>
              <div class="col-md-6">
                <input id="descripcion" type="text" class="form-control" name="descripcion" tabindex="{{ ++$tabindex }}" value="@if(old('descripcion')){{ old('descripcion') }}@else{{ $datos->descripcion }}@endif" maxlength="35" required>
                @if($errors->has('descripcion'))
                <span class="help-block">
                  <strong>{{ $errors->first('descripcion') }}</strong>
                </span>
                @endif
              </div>
            </div>

        <fieldset>
          <legend>DATOS DE ADQUISICIÓN</legend>

            <div  class="form-group{{ $errors->has('forma_adquisicion') ? ' has-error' : '' }}">
              <label for="forma_adquisicion" class="col-md-4 control-label">Forma de adquisición:<code>*</code></label>
              <div class="col-md-6">
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


            <div class="form-group{{ $errors->has('valor_bien') ? ' has-error' : '' }} {{ $errors->has('moneda_bien') ? ' has-error' : '' }}">
              <label for="valor_bien" class="col-md-4 control-label">Valor del bien: <code>*</code></label>
              <div class="col-md-3">
                <input id="valor_bien" type="text" class="form-control" name="valor_bien" value="@if(old('valor_bien')){{ old('valor_bien') }}@else{{ $datos->valor_bien }}@endif" tabindex="{{ ++$tabindex }}" required>
                @if ($errors->has('valor_bien'))
                <span class="help-block">
                  <strong>{{ $errors->first('valor_bien') }}</strong>
                </span>
                @endif
              </div>
              <div class="col-md-3">
                <input id="moneda_bien" type="text" class="form-control" name="moneda_bien" value="MXN" tabindex="{{ ++$tabindex }}" placeholder="TIPO MONEDA" required>
                @if ($errors->has('valor'))
                <span class="help-block">
                  <strong>{{ $errors->first('moneda_bien') }}</strong>
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
                  <option>CONAYUGE</option>
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
          <legend>DATOS OPERACIÓN</legend>
            <div class="form-group{{ $errors->has('forma_operacion') ? ' has-error' : '' }}">
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


            <div class="form-group{{ $errors->has('fecha_venta') ? ' has-error' : '' }}">
              <label for="fecha_venta" class="col-md-4 control-label">Fecha de la operacion: <code>*</code></label>
              <div class="col-md-4">
                <input id="fecha_venta" type="date" class="form-control" name="fecha_venta" tabindex="{{ ++$tabindex }}" value="@if(old('fecha_venta')){{ old('fecha_venta') }}@else{{ $datos->fecha_ventas }}@endif" required>
                @if ($errors->has('fecha_venta'))
                <span class="help-block">
                  <strong>{{ $errors->first('fecha_venta') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('valor_operacion') ? ' has-error' : '' }} {{ $errors->has('moneda_operacion') ? ' has-error' : '' }}">
              <label for="valor_operacion" class="col-md-4 control-label">Valor del bien: <code>*</code></label>
              <div class="col-md-3">
                <input id="valor_operacion" type="text" class="form-control" name="valor_operacion" value="" tabindex="{{ ++$tabindex }}" required>
                @if ($errors->has('valor_operacion'))
                <span class="help-block">
                  <strong>{{ $errors->first('valor_operacion') }}</strong>
                </span>
                @endif
              </div>
              <div class="col-md-3">
                <input id="moneda_operacion" type="text" class="form-control" name="moneda_operacion" value="MXN" tabindex="{{ ++$tabindex }}" placeholder="TIPO MONEDA" required>
                @if ($errors->has('valor'))
                <span class="help-block">
                  <strong>{{ $errors->first('moneda_operacion') }}</strong>
                </span>
                @endif
              </div>
            </div>
          </fieldset>

@endsection




@section('jquery')
<script>
$("input[name='operacion']").ready(mostrar);
$("input[name='operacion']").change(mostrar);

function mostrar()
{
  var radioValue = $("input[name='operacion']:checked").val();

  if(radioValue == "VENTA")
  {
    $('#datos_operacion').show('slow');
  }
  else
  {
    $('#datos_operacion').hide('slow');
    $("#forma_operacion").removeAttr("required", "required");
    $("#fecha_venta").removeAttr("required", "required");
    $("#valor_operacion").removeAttr("required", "required");
  }
}
</script>
@endsection
