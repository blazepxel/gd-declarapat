@extends('layouts.menu')



@section('campos')

            <div class="form-group">
              <label class="col-md-4 control-label">Tipo de operación:<code>*</code></label>
              <div class="col-md-6">
                <label>
                  <input type="radio" name="operacion" value="INCORPORACION" tabindex="{{ ++$tabindex }}" checked required>
                  INCORPORACIÓN
                </label>
                <label>
                  <input type="radio" name="operacion" value="OBRA" tabindex="{{ ++$tabindex }}">
                  OBRA
                </label>
                <label>
                  <input type="radio" name="operacion" value="VENTA" tabindex="{{ ++$tabindex }}">
                  VENTA
                </label>
                <label>
                  <input type="radio" name="operacion" value="VENTA" tabindex="{{ ++$tabindex }}">
                  SIN CAMBIO
                </label>
              </div>
            </div>


            <div class="form-group{{ $errors->has('tipo_bien') ? ' has-error' : '' }}">
              <label for="tipo_bien" class="col-md-4 control-label">Tipo de bien:<code>*</code></label>
              <div class="col-md-6">
                <select id="tipo_bien" name="tipo_bien" tabindex="{{ ++$tabindex }}" class="form-control" required autofocus>
                  <option></option>
                  @foreach($catalogos->tipos_bienes() as $tipo)
                  <option
                    @if($tipo->tipo == $datos->tipo_bien or $tipo->tipo == old('tipo'))
                    selected
                    @endif
                  >{{ $tipo->tipo }}</option>
                  @endforeach
                </select>
                @if($errors->has('tipo_bien'))
                <span class="help-block">
                  <strong>{{ $errors->first('tipo_bien') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div id="div_tipo_obra" class="form-group{{ $errors->has('tipo_obra') ? ' has-error' : '' }}">
              <label for="tipo_obra" class="col-md-4 control-label">Tipo obra:<code>*</code></label>
              <div class="col-md-6">
                <select id="tipo_obra" name="tipo_obra" tabindex="{{ ++$tabindex }}" class="form-control" required>
                  <option></option>
                  @foreach($catalogos->tipos_obra() as $tipo)
                  <option
                    @if($tipo->tipo == $datos->tipo_obra or $tipo->tipo == old('tipo_obra'))
                    selected
                    @endif
                  >{{ $tipo->tipo }}</option>
                  @endforeach
                </select>
                @if($errors->has('tipo_obra'))
                <span class="help-block">
                  <strong>{{ $errors->first('tipo_obra') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('superficie_terreno') ? ' has-error' : '' }}">
              <label for="superficie_terreno" class="col-md-4 control-label">Superficie del terreno, o indiviso: <code>*</code></label>
              <div class="col-md-3">
                <input id="superficie_terreno" type="number" class="form-control" name="superficie_terreno" tabindex="{{ ++$tabindex }}" value="@if(old('superficie_terreno')){{ old('superficie_terreno') }}@else{{ $datos->superficie_terreno }}@endif" maxlength="35" required>
                @if ($errors->has('superficie_terreno'))
                <span class="help-block">
                  <strong>{{ $errors->first('superficie_terreno') }}</strong>
                </span>
                @endif
              </div>
              <code>mtrs. cuadrados</code>
            </div>


            <div id="div_superficie_construccion" class="form-group{{ $errors->has('superficie_construccion') ? ' has-error' : '' }}">
              <label for="superficie_construccion" class="col-md-4 control-label">Superficie de construcción: <code>*</code></label>
              <div class="col-md-3">
                <input id="superficie_construccion" type="number" class="form-control" name="superficie_construccion" tabindex="{{ ++$tabindex }}" value="@if(old('superficie_construccion')){{ old('superficie_construccion') }}@else{{ $datos->superficie_construccion }}@endif" maxlength="35">
                @if ($errors->has('superficie_construccion'))
                <span class="help-block">
                  <strong>{{ $errors->first('superficie_construccion') }}</strong>
                </span>
                @endif
              </div>
              <code>mtrs. cuadrados</code>
            </div>


        <fieldset>
          <legend>Datos Adquisición:</legend>

            <div  class="form-group{{ $errors->has('forma_adquisicion') ? ' has-error' : '' }}">
              <label for="forma_adquisicion" class="col-md-4 control-label">Forma de adquisición:<code>*</code></label>
              <div class="col-md-6">
                <select id="forma_adquisicion" name="forma_adquisicion" tabindex="{{ ++$tabindex }}" class="form-control" required>
                  <option></option>
                  @foreach($catalogos->formas_adquisicion() as $forma)
                  <option
                    @if($forma->forma == $datos->forma_adquisicion or $forma->forma == old('forma'))
                    selected
                    @endif
                  >{{ $forma->forma }}</option>
                  @endforeach
                </select>
                @if($errors->has('forma_adquisicion'))
                <span class="help-block">
                  <strong>{{ $errors->first('forma_adquisicion') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('nombre_cesionario') ? ' has-error' : '' }}">
              <label for="nombre_cesionario" class="col-md-4 control-label">Nombre o razón social: <code>*</code></label>
              <div class="col-md-6">
                <input id="nombre_cesionario" type="text" class="form-control" name="nombre_cesionario" tabindex="{{ ++$tabindex }}" value="@if(old('nombre_cesionario')){{ old('nombre_cesionario') }}@else{{ $datos->nombre_cesionario }}@endif" maxlength="35" required>
                @if ($errors->has('nombre_cesionario'))
                <span class="help-block">
                  <strong>{{ $errors->first('nombre_cesionario') }}</strong>
                </span>
                @endif
                <code>Del cesionario, del autor de la donación o herencia o permuta o rifa o sorteo o vendedor o enajenante con el titular.</code>
              </div>
            </div>


            <div class="form-group{{ $errors->has('especifica_relacion') ? ' has-error' : '' }}">
              <label for="especifica_relacion" class="col-md-4 control-label">Especifíca la relación vendedor o enajenante con el titular: <code>*</code></label>
              <div class="col-md-6">
              <select id="especifica_relacion" name="especifica_relacion" tabindex="{{ ++$tabindex }}" class="form-control" required>
                  <option></option>
                  @foreach($catalogos->especifica_relacion() as $tipo)
                  <option
                    @if($tipo->tipo == $datos->especifica_relacion or $tipo->tipo == old('especifica_relacion'))
                    selected
                    @endif
                  >{{ $tipo->tipo }}</option>
                  @endforeach
                </select>
                @if ($errors->has('especifica_relacion'))
                <span class="help-block">
                  <strong>{{ $errors->first('especifica_relacion') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div id="div_otro" class="form-group{{ $errors->has('relacion_titular') ? ' has-error' : '' }}">
              <label for="relacion_titular" class="col-md-4 control-label">Especifica la relación: <code>*</code></label>
              <div class="col-md-6">
                <input id="relacion_titular" type="text" class="form-control" name="relacion_titular" tabindex="{{ ++$tabindex }}" value="@if(old('relacion_titular')){{ old('relacion_titular') }}@else{{ $datos->relacion_titular }}@endif" maxlength="35" >
                @if ($errors->has('relacion_titular'))
                <span class="help-block">
                  <strong>{{ $errors->first('relacion_titular') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('valor_inmueble') ? ' has-error' : '' }} {{ $errors->has('valor') ? ' has-error' : '' }}">
              <label for="valor_inmueble" class="col-md-4 control-label">Valor del inmueble conforme a escritura pública: <code>*</code></label>
              <div class="col-md-3">
                <input id="valor_inmueble" type="text" class="form-control" name="valor_inmueble" value="@if(old('valor_inmueble')){{ old('valor_inmueble') }}@else{{ $datos->valor_inmueble }}@endif" tabindex="{{ ++$tabindex }}" maxlength="35" required>
                @if ($errors->has('valor_inmueble'))
                <span class="help-block">
                  <strong>{{ $errors->first('valor_inmueble') }}</strong>
                </span>
                @endif
              </div>
              <div class="col-md-3">
                <input id="moneda_valor" type="text" class="form-control" name="moneda_valor" value="MXN @if(old('moneda_valor')){{ old('moneda_valor') }}@else{{ $datos->moneda_valor }}@endif" tabindex="{{ ++$tabindex }}" placeholder="TIPO MONEDA" required>
                @if ($errors->has('moneda_valor'))
                <span class="help-block">
                  <strong>{{ $errors->first('moneda_valor') }}</strong>
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


            <div class="form-group{{ $errors->has('registro_publico') ? ' has-error' : '' }}">
              <label for="registro_publico" class="col-md-4 control-label">Datos del Registro Público de la Propiedad: Folio real u otro dato que permita la identificación del mismo<code>*</code></label>
              <div class="col-md-3">
                <input id="registro_publico" type="text" class="form-control" name="registro_publico" tabindex="{{ ++$tabindex }}" value="@if(old('registro_publico')){{ old('registro_publico') }}@else{{ $datos->registro_publico }}@endif" maxlength="35" required>
                @if ($errors->has('registro_publico'))
                <span class="help-block">
                  <strong>{{ $errors->first('registro_publico') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('titular') ? ' has-error' : '' }}">
              <label for="titular" class="col-md-4 control-label">Titular:<code>*</code></label>
              <div class="col-md-6">
                <select id="titular" name="titular" tabindex="{{ ++$tabindex }}" class="form-control" required>
                  <option></option>
                  <option>DECLARANTE</option>
                  <option>CONYUGE</option>
                  <option>DECLARANTE Y CONYUGE</option>
                  <option>DEPENDIENTES</option>
                  <option>CONCUBINA O CONCUBINARIO</option>
                  <option>DECLARANTE EN COPROPIEDAD</option>
                  <option>CONYUGE EN COPROPIEDAD</option>
                </select>
                @if($errors->has('titular'))
                <span class="help-block">
                  <strong>{{ $errors->first('titular') }}</strong>
                </span>
                @endif
              </div>
            </div>
          </fieldset>


          <fieldset>
            <legend id="legend">DATOS OPERACIÓN</legend>

<div id="div_datos_operacion_venta">

            <div class="form-group{{ $errors->has('forma_operacion') ? ' has-error' : '' }}">
              <label for="forma_operacion" class="col-md-4 control-label">Forma de operación:<code>*</code></label>
              <div class="col-md-6">
                <select id="forma_operacion" name="forma_operacion" tabindex="{{ ++$tabindex }}" class="form-control" required>
                  <option></option>
                  @foreach($catalogos->formas_adquisicion() as $forma)
                  <option
                    @if($forma->forma == $datos->forma_adquisicion or $forma->forma == old('forma'))
                    selected
                    @endif
                  >{{ $forma->forma }}</option>
                  @endforeach
                </select>
                @if($errors->has('forma_operacion'))
                <span class="help-block">
                  <strong>{{ $errors->first('forma_operacion') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('valor_venta') ? ' has-error' : '' }} {{ $errors->has('moneda_venta') ? ' has-error' : '' }}">
              <label for="valor_venta" class="col-md-4 control-label">Valor de la venta: <code>*</code></label>
              <div class="col-md-3">
                <input id="valor_venta" type="text" class="form-control" name="valor_venta" value="@if(old('valor_venta')){{ old('valor_venta') }}@else{{ $datos->valor_venta }}@endif" tabindex="{{ ++$tabindex }}"  required>
                @if ($errors->has('rfc'))
                <span class="help-block">
                  <strong>{{ $errors->first('rfc') }}</strong>
                </span>
                @endif
              </div>
              <div class="col-md-3">
                <input id="moneda_venta" type="text" class="form-control" name="moneda_venta" value="MXN" tabindex="{{ ++$tabindex }}"  placeholder="TIPO MONEDA" required>
                @if ($errors->has('moneda_venta'))
                <span class="help-block">
                  <strong>{{ $errors->first('moneda_venta') }}</strong>
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
</div>







                    <div id="div_datos_operacion_obra">
                      <div class="form-group{{ $errors->has('nombre_credito') ? ' has-error' : '' }} {{ $errors->has('nombre_credito') ? ' has-error' : '' }}">
                        <label for="nombre_credito" class="col-md-4 control-label">Inversión de la obra: <code>*</code></label>
                        <div class="col-md-3">
                          <input id="nombre_credito" type="text" class="form-control" name="nombre_credito" value="@if(old('nombre_credito')){{ old('nombre_credito') }}@else{{ $datos->nombre_credito }}@endif" tabindex="{{ ++$tabindex }}" >
                          @if ($errors->has('nombre_credito'))
                          <span class="help-block">
                            <strong>{{ $errors->first('nombre_credito') }}</strong>
                          </span>
                          @endif
                        </div>
                        <div class="col-md-3">
                          <input id="nombre_donacion" type="text" class="form-control" name="nombre_donacion" value="MXN" tabindex="{{ ++$tabindex }}"  placeholder="TIPO MONEDA" required>
                          @if ($errors->has('nombre_donacion'))
                          <span class="help-block">
                            <strong>{{ $errors->first('nombre_donacion') }}</strong>
                          </span>
                          @endif
                        </div>
                      </div>


                      <div class="form-group{{ $errors->has('fecha_obra') ? ' has-error' : '' }}">
                        <label for="fecha_obra" class="col-md-4 control-label">Fecha de la obra: <code>*</code></label>
                        <div class="col-md-4">
                          <input id="fecha_obra" type="date" class="form-control" name="fecha_obra" tabindex="{{ ++$tabindex }}" value="@if(old('fecha_obra')){{ old('fecha_obra') }}@else{{ $datos->fecha_obra }}@endif" required>
                          @if ($errors->has('fecha_obra'))
                          <span class="help-block">
                            <strong>{{ $errors->first('fecha_obra') }}</strong>
                          </span>
                          @endif
                        </div>
                      </div>
          </div>
</fieldset>

<fieldset>
  <legend>UBICACIÓN</legend>
            <div class="form-group{{ $errors->has('ubicacion') ? ' has-error' : '' }}">
              <label for="MEXICO" class="col-md-4 control-label">Lugar donde se ubica:<code>*</code></label>
              <div class="col-md-6">
                <label>
                  <input id="MEXICO" type="radio" name="ubicacion" value="MEXICO"     tabindex="{{ ++$tabindex }}" @if(old('ubicacion') == "MEXICO")     checked @elseif($datos->ubicacion == "MEXICO"     and old('ubicacion') == null) checked @endif required checked>
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
              <label for="estado" class="col-md-4 control-label">Estado donde se ubica:<code>*</code></label>
              <div class="col-md-6">
                <select id="estado" name="estado" tabindex="{{ ++$tabindex }}" class="form-control" required >
                  <option></option>
                  @foreach($catalogos->estados() as $estado)
                  <option value="{{ $estado->id }}"
                    @if($estado->id == old('estado'))
                    selected
                    @elseif($estado->id == $datos->estado_id and old('estado') == null)
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


            <div id="div_municipio" class="form-group{{ $errors->has('municipio') ? ' has-error' : '' }}">
              <label for="municipio" class="col-md-4 control-label">Municipio donde se ubica:<code>*</code></label>
              <div class="col-md-6">
                <select id="municipio" name="municipio" tabindex="{{ ++$tabindex }}" class="form-control" required>
                  <option></option>
                </select>
                @if($errors->has('municipio'))
                <span class="help-block">
                  <strong>{{ $errors->first('municipio') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div id="div_pais" class="form-group{{ $errors->has('pais') ? ' has-error' : '' }}">
              <label for="pais" class="col-md-4 control-label">País de residencia:<code>*</code></label>
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


            <div id="div_provincia" class="form-group{{ $errors->has('provincia') ? ' has-error' : '' }}">
              <label for="provincia" class="col-md-4 control-label">Estado o Provincia: <code>*</code></label>
              <div class="col-md-6">
                <input id="provincia" type="text" class="form-control" name="provincia" tabindex="{{ ++$tabindex }}" value="@if(old('provincia')){{ old('provincia') }}@else{{ $datos->provincia }}@endif" maxlength="35">
                @if ($errors->has('provincia'))
                <span class="help-block">
                  <strong>{{ $errors->first('provincia') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('colonia') ? ' has-error' : '' }}">
              <label for="colonia" class="col-md-4 control-label">Localidad o Colonia: <code>*</code></label>
              <div class="col-md-6">
                <input id="colonia" type="text" class="form-control" name="colonia" tabindex="{{ ++$tabindex }}" value="@if(old('colonia')){{ old('colonia') }}@else{{ $datos->colonia }}@endif" maxlength="35" required>
                @if ($errors->has('colonia'))
                <span class="help-block">
                  <strong>{{ $errors->first('colonia') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('calle') ? ' has-error' : '' }}">
              <label for="calle" class="col-md-4 control-label">Calle: <code>*</code></label>
              <div class="col-md-6">
                <input id="calle" type="text" class="form-control" name="calle" tabindex="{{ ++$tabindex }}" value="@if(old('calle')){{ old('calle') }}@else{{ $datos->calle }}@endif" maxlength="35" required>
                @if ($errors->has('calle'))
                <span class="help-block">
                  <strong>{{ $errors->first('calle') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('numero_exterior') ? ' has-error' : '' }}">
              <label for="numero_exterior" class="col-md-4 control-label">Número Exterior:</label>
              <div class="col-md-3">
                <input id="numero_exterior" type="number" class="form-control" tabindex="{{ ++$tabindex }}" name="numero_exterior" value="@if(old('numero_exterior')){{ old('numero_exterior') }}@else{{ $datos->numero_exterior }}@endif" max="9999" min="1">
                @if ($errors->has('numero_exterior'))
                <span class="help-block">
                  <strong>{{ $errors->first('numero_exterior') }}</strong>
                </span>
                @endif
              </div>
              <code>S/N dejar en blanco</code>
            </div>


            <div class="form-group{{ $errors->has('numero_interior') ? ' has-error' : '' }}">
              <label for="numero_interior" class="col-md-4 control-label">Número Interior:</label>
              <div class="col-md-3">
                <input id="numero_interior" type="number" class="form-control" name="numero_interior" tabindex="{{ ++$tabindex }}" value="@if(old('numero_interior')){{ old('numero_interior') }}@else{{ $datos->numero_interior }}@endif" max="999" min="1">
                @if ($errors->has('numero_interior'))
                <span class="help-block">
                  <strong>{{ $errors->first('numero_interior') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('cp') ? ' has-error' : '' }}">
              <label for="cp" class="col-md-4 control-label">Código Postal: <code>*</code></label>
              <div class="col-md-3">
                <input id="cp" type="number" class="form-control" name="cp" tabindex="{{ ++$tabindex }}" value="@if(old('cp')){{ old('cp') }}@else{{ $datos->cp }}@endif" max="99998" min="1000" required>
                @if ($errors->has('cp'))
                <span class="help-block">
                  <strong>{{ $errors->first('cp') }}</strong>
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

function mostrar()
{
  var radioValue = $("input[name='ubicacion']:checked").val();

  if(radioValue == "EXTRANJERO")
  {
    $('#div_pais').show('slow');
    $('#div_provincia').show('slow');

    $('#div_estado').hide('slow');
    $('#div_municipio').hide('slow');

    $('#pais').attr("required", "required");
    $('#provincia').attr("required", "required");

    $("#estado").removeAttr("required");
    $("#municipio").removeAttr("required");
  }
  else
  {
    $('#div_pais').hide('slow');
    $('#div_provincia').hide('slow');

    $('#div_estado').show('slow');
    $('#div_municipio').show('slow');

    $("#pais").removeAttr("required");
    $("#provincia").removeAttr("required");

    $('#estado').attr("required", "required");
    $('#municipio').attr("required", "required");
  }
}


$("#estado").change(event => {
  $.get(`/catalogo/municipios/${event.target.value}`, function(res){

		$("#municipio").empty();

		res.forEach(element => {
			$("#municipio").append(`<option> ${element} </option>`);
		});
	});
});



$("#estado").ready(event => {
  @if($datos->municipio and old('municipio') == null)
    var muni = '{{ $datos->municipio }}';

    $.get(`/catalogo/municipios/{{ $datos->estado_id }}`, function(res){
  @else
    var muni = "{{ old('municipio') }}";

    $.get(`/catalogo/municipios/{{ old('estado') }}`, function(res){
  @endif

	  $("#municipio").empty();

		res.forEach(element => { $('#municipio').append('<option ' + (muni == element ? ' selected ': '') + ` > ${element} </option>`);	});
	});
});






$("input[name='operacion']").ready(mostrar_obra);
$("input[name='operacion']").change(mostrar_obra);

$("#tipo_bien").ready(mostrar_superficie);
$("#tipo_bien").change(mostrar_superficie);

$("#especifica_relacion").ready(mostrar_otro);
$("#especifica_relacion").change(mostrar_otro);

function mostrar_obra()
{
  var radioValue = $("input[name='operacion']:checked").val();

  if(radioValue == "OBRA")
  {
    $('#legend').show('slow');

    $('#div_tipo_obra').show('slow');
    $('#div_datos_operacion_obra').show('slow');
    $('#div_datos_operacion_venta').hide('slow');

    $("#forma_operacion").removeAttr("required", "required");  
    $("#valor_venta").removeAttr("required", "required");
    $("#fecha_venta").removeAttr("required", "required");
  }
  else
  {
    $('#legend').show('slow');

    $('#div_tipo_obra').hide('slow');
    $('#div_datos_operacion_venta').show('slow');
    $('#div_datos_operacion_obra').hide('slow');

    $("#fecha_obra").removeAttr("required", "required");
    $("#inversion_obra").removeAttr("required", "required");
    $("#moneda_obra").removeAttr("required", "required");
  }

  if(radioValue == "INCORPORACION")
  {
    $('#div_datos_operacion_obra').hide('slow');
    $('#div_datos_operacion_venta').hide('slow');

    $("#tipo_obra").removeAttr("required", "required");

    $("#forma_operacion").removeAttr("required", "required");  
    $("#valor_venta").removeAttr("required", "required");
    $("#fecha_venta").removeAttr("required", "required");

    $("#fecha_obra").removeAttr("required", "required");
    $("#inversion_obra").removeAttr("required", "required");
    $("#moneda_obra").removeAttr("required", "required");

    $('#legend').hide('slow');
  }
}

function mostrar_superficie()
{
  if($("#tipo_bien").children("option:selected").val() == "TERRENO RUSTICO" || $("#tipo_bien").children("option:selected").val() == "TERRENO")
  {
    $('#div_superficie_construccion').hide('slow');
  }
  else
  {
    $('#div_superficie_construccion').show('slow');      
  }
}

function mostrar_otro()
{
  var tipo = $("#especifica_relacion").children("option:selected").val();

  if(tipo == "OTRO")
  {
    $('#div_otro').show('slow');
  }
  else
  {
    $('#div_otro').hide('slow');
    $("#especifica_relacion_otro").removeAttr("required", "required");
  }
}
</script>
@endsection
