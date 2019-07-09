@extends('layouts.menu')



@section('campos')
            <div id="div_pais" class="form-group{{ $errors->has('pais') ? ' has-error' : '' }}">
              <label for="pais" class="col-md-4 control-label">País de residencia:<code>*</code></label>
              <div class="col-md-6">
                <select id="pais" name="pais" tabindex="{{ ++$tabindex }}" class="form-control">
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


            <div id="div_estado" class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
              <label for="estado" class="col-md-4 control-label">Estado donde se ubica:<code>*</code></label>
              <div class="col-md-6">
                <select id="estado" name="estado" tabindex="{{ ++$tabindex }}" class="form-control" required autofocus>
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


            <div id="div_condado" class="form-group{{ $errors->has('condado') ? ' has-error' : '' }}">
              <label for="condado" class="col-md-4 control-label">Condado: <code>*</code></label>
              <div class="col-md-6">
                <input id="condado" type="text" class="form-control" name="condado" tabindex="{{ ++$tabindex }}" value="@if(old('condado')){{ old('condado') }}@else{{ $datos->condado }}@endif" maxlength="35">
                @if ($errors->has('condado'))
                <span class="help-block">
                  <strong>{{ $errors->first('condado') }}</strong>
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
                <input id="numero_exterior" type="number" class="form-control" tabindex="{{ ++$tabindex }}" name="numero_exterior" value="@if(old('numero_exterior')){{ old('numero_exterior') }}@else{{ $datos->numero_exterior }}@endif" max="9999" >
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
                <input id="numero_interior" type="number" class="form-control" name="numero_interior" tabindex="{{ ++$tabindex }}" value="@if(old('numero_interior')){{ old('numero_interior') }}@else{{ $datos->numero_interior }}@endif" max="999">
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


            <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
              <label for="telefono" class="col-md-4 control-label">Teléfono con lada:</label>
              <div class="col-md-3">
                <input id="telefono" type="text" class="form-control" name="telefono" tabindex="{{ ++$tabindex }}" value="@if(old('telefono')){{ old('telefono') }}@else{{ $datos->telefono }}@endif" maxlength="20">
                @if ($errors->has('telefono'))
                <span class="help-block">
                  <strong>{{ $errors->first('telefono') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('extension') ? ' has-error' : '' }}">
              <label for="extension" class="col-md-4 control-label">Extensión:</label>
              <div class="col-md-3">
                <input id="extension" type="text" class="form-control" name="extension" tabindex="{{ ++$tabindex }}" value="@if(old('extension')){{ old('extension') }}@else{{ $datos->extension }}@endif" maxlength="20">
                @if ($errors->has('extension'))
                <span class="help-block">
                  <strong>{{ $errors->first('extension') }}</strong>
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
$("#pais").ready(mostrar);
$("#pais").change(mostrar);

function mostrar()
{
  var radioValue = $( "#pais" ).val();

  if(radioValue != "MEXICO")
  {
    $('#div_provincia').show('slow');
    $('#div_condado').show('slow');

    $('#div_estado').hide('slow');
    $('#div_municipio').hide('slow');

    $('#provincia').attr("required", "required");
    $('#condado').attr("required", "required");

    $("#estado").removeAttr("required");
    $("#municipio").removeAttr("required");
  }
  else
  {
    $('#div_provincia').hide('slow');
    $('#div_condado').hide('slow');

    $('#div_estado').show('slow');
    $('#div_municipio').show('slow');

    $("#provincia").removeAttr("required");
    $("#condado").removeAttr("required");

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
