@extends('layouts.menu')



@section('campos')

            <div class="form-group{{ $errors->has('operacion') ? ' has-error' : '' }}">
              <label for="operacion" class="col-md-4 control-label">Tipo de operación:<code>*</code></label>
              <div class="col-md-6">
                <label>
                  <input id="operacion" type="radio" name="operacion" value="INCORPORACION" tabindex="{{ ++$tabindex }}" required>
                  INCORPORACIÓN
                </label>
              </div>
            </div>


            <div class="form-group{{ $errors->has('responsable') ? ' has-error' : '' }}">
              <label for="responsable" class="col-md-4 control-label">Responsable del conflicto de interés: <code>*</code></label>
              <div class="col-md-6">
                <select id="responsable" name="responsableb" tabindex="{{ ++$tabindex }}" class="form-control" required autofocus>
                  <option></option>
                  <option>CONYUGE</option>
                  <option>DEPENDIENTE</option>
                  <option>DECLARANTE</option>
                </select>
                @if ($errors->has('responsable'))
                <span class="help-block">
                  <strong>{{ $errors->first('responsable') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
              <label for="nombre" class="col-md-4 control-label">Nombre Persona/Sociedad: <code>*</code></label>
              <div class="col-md-6">
                <input id="nombre" type="text" class="form-control" name="nombreb" tabindex="{{ ++$tabindex }}" value="@if(old('nombre')){{ old('nombre') }}@else{{ $datos->nombre }}@endif" required >
                @if ($errors->has('responsable'))
                <span class="help-block">
                  <strong>{{ $errors->first('responsable') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('fecha') ? ' has-error' : '' }}">
              <label for="fecha_constitucion" class="col-md-4 control-label">Fecha de constitución de la sociedad: <code>*</code></label>
              <div class="col-md-4">
                <input id="fecha_constitucion" type="date" class="form-control" name="fecha" tabindex="{{ ++$tabindex }}" value="@if(old('fecha')){{ old('fecha') }}@else{{ $datos->fecha }}@endif" required>
                @if ($errors->has('fecha'))
                <span class="help-block">
                  <strong>{{ $errors->first('fecha') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('registro_publico') ? ' has-error' : '' }}">
              <label for="registro_publico" class="col-md-4 control-label">Inscripción en el registro público u otro dato que permita su identificación: <code>*</code></label>
              <div class="col-md-6">
                <input id="registro_publico" type="text" class="form-control" name="registro_publico" tabindex="{{ ++$tabindex }}" value="@if(old('registro_publico')){{ old('registro_publico') }}@else{{ $datos->registro_publico }}@endif" required>
                @if ($errors->has('registro_publico'))
                <span class="help-block">
                  <strong>{{ $errors->first('registro_publico') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('sector') ? ' has-error' : '' }}">
              <label for="sector" class="col-md-4 control-label">Sector o industria: <code>*</code></label>
              <div class="col-md-6">
                <input id="sector" type="text" class="form-control" name="sector" tabindex="{{ ++$tabindex }}" value="@if(old('sector')){{ old('sector') }}@else{{ $datos->sector }}@endif" required>
                @if ($errors->has('sector'))
                <span class="help-block">
                  <strong>{{ $errors->first('sector') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('tipo_sociedad') ? ' has-error' : '' }}">
              <label for="tipo_sociedad" class="col-md-4 control-label">Tipo de sociedad en la que se participa o con la que se contrata: <code>*</code></label>
              <div class="col-md-6">
                <select id="tipo_sociedad" name="tipo_sociedad" tabindex="{{ ++$tabindex }}" class="form-control" required>
                  <option></option>
                  <option>SOCIEDAD ANONIMA</option>
                  <option>SOCIEDAD CIVIL</option>
                  <option>ASOCIACION CIVIL</option>
                  <option>OTRA</option>
                </select>
                @if ($errors->has('tipo_sociedad'))
                <span class="help-block">
                  <strong>{{ $errors->first('tipo_sociedad') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('tipo_contrato') ? ' has-error' : '' }}">
              <label for="tipo_contrato" class="col-md-4 control-label">Tipo de participación o contrato: <code>*</code></label>
              <div class="col-md-6">
                <select id="tipo_contrato" name="tipo_contrato" tabindex="{{ ++$tabindex }}" class="form-control" required>
                  <option></option>
                  <option>PORCENTAJE DE PARTICIPACION EN EL CAPITAL</option>
                  <option>PARTES SOCIALES</option>
                  <option>TRABAJO</option>
                  <option>OTRA</option>
                </select>
                @if ($errors->has('tipo_contrato'))
                <span class="help-block">
                  <strong>{{ $errors->first('tipo_contrato') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('tipo_contrato_especifica') ? ' has-error' : '' }}">
              <label for="tipo_contrato_especifica" class="col-md-4 control-label">Especifíca: <code>*</code></label>
              <div class="col-md-6">
                <input id="tipo_contrato_especifica" type="text" class="form-control" name="tipo_contrato_especifica" tabindex="{{ ++$tabindex }}" value="@if(old('tipo_contrato_especifica')){{ old('tipo_contrato_especifica') }}@else{{ $datos->tipo_contrato_especifica }}@endif" required>
                @if ($errors->has('tipo_contrato_especifica'))
                <span class="help-block">
                  <strong>{{ $errors->first('tipo_contrato_especifica') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('antiguedad') ? ' has-error' : '' }}">
              <label for="antiguedad" class="col-md-4 control-label">Antigüedad de la participación o convenio(años): <code>*</code></label>
              <div class="col-md-2">
                <input id="antiguedad" type="text" class="form-control" name="antiguedad" tabindex="{{ ++$tabindex }}" value="@if(old('antiguedad')){{ old('antiguedad') }}@else{{ $datos->antiguedad }}@endif" required>
                @if ($errors->has('antiguedad'))
                <span class="help-block">
                  <strong>{{ $errors->first('antiguedad') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('participacion') ? ' has-error' : '' }}">
              <label for="participacion" class="col-md-4 control-label">Inicio de participación o contrato: <code>*</code></label>
              <div class="col-md-6">
                <select id="participacion" name="inicio_participacion" tabindex="{{ ++$tabindex }}" class="form-control" required>
                  <option></option>
                  <option>ANTES DEL SERVICIO PUBLICO</option>
                  <option>DURANTE EL SERVICIO PUBLICO</option>
                </select>
                @if ($errors->has('participacion'))
                <span class="help-block">
                  <strong>{{ $errors->first('participacion') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('ubicacion') ? ' has-error' : '' }}">
              <label for="MEXICO" class="col-md-4 control-label">Lugar donde se ubica:<code>*</code></label>
              <div class="col-md-6">
                <label>
                  <input id="MEXICO" type="radio" name="ubicacion" value="MEXICO"     tabindex="{{ ++$tabindex }}" @if(old('ubicacion') == "MEXICO")     checked @elseif($datos->ubicacion == "MEXICO"     and old('ubicacion') == null) checked @endif checked>
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
                <select id="estado" name="estado" tabindex="{{ ++$tabindex }}" class="form-control"  autofocus>
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
                <select id="municipio" name="municipio" tabindex="{{ ++$tabindex }}" class="form-control" >
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
</script>
@endsection
