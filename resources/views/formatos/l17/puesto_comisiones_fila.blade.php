@extends('layouts.menu')



@section('campos')

            <div class="form-group{{ $errors->has('operacion') ? ' has-error' : '' }}">
              <label for="operacion" class="col-md-4 control-label">Tipo de operación:<code>*</code></label>
              <div class="col-md-6">
                <label>
                  <input id="operacion" type="radio" name="operacion" value="INCORPORACIÓN" tabindex="{{ ++$tabindex }}" @if($datos->ubicacion == "MEXICO" or old('ubicacion') == "EXTRANJERO") checked  @endif required>
                  INCORPORACIÓN
                </label>
              </div>
            </div>


            <div class="form-group{{ $errors->has('responsable') ? ' has-error' : '' }}">
              <label for="responsable" class="col-md-4 control-label">Responsable del conflicto de interés: <code>*</code></label>
              <div class="col-md-6">
                <select id="responsable" name="responsable" tabindex="{{ ++$tabindex }}" class="form-control" required autofocus>
                  <option></option>
                  <option>CONYUGE</option>
                  <option>DEPENDIENTE</option>
                  <option>DECLARANTE</option>
                </select>
                @if($errors->has('responsable'))
                <span class="help-block">
                  <strong>{{ $errors->first('responsable') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('entidad') ? ' has-error' : '' }}">
              <label for="entidad" class="col-md-4 control-label">Nombre de la entidad (Empresa, asociación, sindicato, etc.): <code>*</code></label>
              <div class="col-md-6">
                <input id="entidad" type="text" class="form-control" name="entidad" tabindex="{{ ++$tabindex }}" value="@if(old('entidad')){{ old('entidad') }}@else{{ $datos->entidad }}@endif" maxlength="35" required>
                @if ($errors->has('entidad'))
                <span class="help-block">
                  <strong>{{ $errors->first('entidad') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('vinculo') ? ' has-error' : '' }}">
              <label for="vinculo" class="col-md-4 control-label">Naturaleza del vínculo:<code>*</code></label>
              <div class="col-md-6">
                <select id="vinculo" name="vinculo" tabindex="{{ ++$tabindex }}" class="form-control" required>
                  <option></option>
                  <option>SOCIO</option>
                  <option>COLABORADOR</option>
                  <option>OTRO</option>
                </select>
                @if($errors->has('vinculo'))
                <span class="help-block">
                  <strong>{{ $errors->first('vinculo') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('antiguedad') ? ' has-error' : '' }}">
              <label for="antiguedad" class="col-md-4 control-label">Antigüedad del vínculo (Años): <code>*</code></label>
              <div class="col-md-2">
                <input id="antiguedad" type="text" class="form-control" name="antiguedad" tabindex="{{ ++$tabindex }}" value="@if(old('antiguedad')){{ old('antiguedad') }}@else{{ $datos->antiguedad }}@endif" maxlength="35" required>
                @if ($errors->has('antiguedad'))
                <span class="help-block">
                  <strong>{{ $errors->first('antiguedad') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('frecuencia') ? ' has-error' : '' }}">
              <label for="frecuencia" class="col-md-4 control-label">Frecuencia anual:<code>*</code></label>
              <div class="col-md-6">
                <select id="frecuencia" name="frecuencia" tabindex="{{ ++$tabindex }}" class="form-control" required>
                  <option></option>
                  <option>3 OCASIONES</option>
                  <option>4 A 7 OCASIONES</option>
                  <option>8 A 11 OCASIONES</option>
                  <option>MENSUALMENTE</option>
                  <option>OCASIONALMENTE</option>
                  <option>OTRA</option>
                </select>
                @if($errors->has('frecuencia'))
                <span class="help-block">
                  <strong>{{ $errors->first('frecuencia') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('participacion') ? ' has-error' : '' }}">
              <label for="participacion" class="col-md-4 control-label">Participación en la administracion:</label>
              <div class="col-md-6">
                <select id="participacion" name="participacion" tabindex="{{ ++$tabindex }}" class="form-control">
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


            <div class="form-group{{ $errors->has('tipo_persona') ? ' has-error' : '' }}">
              <label for="tipo_persona" class="col-md-4 control-label">Tipo de persona jurídica:<code>*</code></label>
              <div class="col-md-6">
                <select id="tipo_persona" name="tipo_persona" tabindex="{{ ++$tabindex }}" class="form-control" required>
                  <option></option>
                  <option>INSTITUCIONES DEL DERECHO PUBLICO</option>
                  <option>SOCIEDADES A ASOCIACIONES DEL DERECHO PRIVADO</option>
                  <option>FUNDACION</option>
                  <option>ASOCIACION GREMIAL</option>
                  <option>SINDICATO O FEDERACION DE ORGANIZACIONES COMUNITARIAS</option>
                  <option>IGLESIA O ENTIDAD RELIGIOSA</option>
                  <option>OTRO</option>
                </select>
                @if($errors->has('tipo_persona'))
                <span class="help-block">
                  <strong>{{ $errors->first('tipo_persona') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('tipo_aporte') ? ' has-error' : '' }}">
              <label for="tipo_aporte" class="col-md-4 control-label">Tipo de colboración o aporte:<code>*</code></label>
              <div class="col-md-6">
                <select id="tipo_aporte" name="tipo_aporte" tabindex="{{ ++$tabindex }}" class="form-control" required>
                  <option></option>
                  <option>CUOTAS</option>
                  <option>SERVICIOS PROFESIONALES</option>
                  <option>PARTICIPACION VOLUNTARIA</option>
                  <option>PARTICIPACION REMUNERADA</option>
                  <option>OTROS APORTES</option>
                </select>
                @if($errors->has('tipo_aporte'))
                <span class="help-block">
                  <strong>{{ $errors->first('tipo_aporte') }}</strong>
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
                <select id="estado" name="estado" tabindex="{{ ++$tabindex }}" class="form-control">
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
