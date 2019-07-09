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
                </span>
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


            <div class="form-group{{ $errors->has('parentesco') ? ' has-error' : '' }}">
              <label for="parentesco" class="col-md-4 control-label">Parentesco:<code>*</code></label>
              <div class="col-md-6">
                <select id="parentesco" name="parentesco" tabindex="{{ ++$tabindex }}" class="form-control" required>
                  <option></option>
                  @foreach($catalogos->parentescos() as $parentesco)
                  <option
                    @if($parentesco->parentesco == $datos->parentesco or $parentesco->parentesco == old('perentesco'))
                    selected
                    @endif
                  >{{ $parentesco->parentesco }}</option>
                  @endforeach
                </select>
                @if($errors->has('parentesco'))
                <span class="help-block">
                  <strong>{{ $errors->first('parentesco') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('ciudadano_extranjero') ? ' has-error' : '' }}">
              <label for="no_3" class="col-md-4 control-label">¿Es ciudadano extranjero?:<code>*</code></label>
              <div class="col-md-6">
                <label>
                  <input type="radio" name="ciudadano_extranjero" value="SÍ" tabindex="{{ ++$tabindex }}">
                  SÍ
                </label>
                &nbsp;&nbsp;&nbsp;
                <label>
                  <input id="no_3" type="radio" name="ciudadano_extranjero" value="NO" tabindex="{{ ++$tabindex }}" checked>
                  NO
                </label>
              </div>
            </div>


            <div id="div_curp" class="form-group{{ $errors->has('curp') ? ' has-error' : '' }}">
              <label for="curp" class="col-md-4 control-label">CURP:</label>
              <div class="col-md-6">
                <input id="curp" type="text" class="form-control" name="curp" value="@if(old('curp')){{ old('curp') }}@else{{ $datos->curp }}@endif" tabindex="{{ ++$tabindex }}" required maxlength="18" minlength="18">
                @if ($errors->has('curp'))
                <span class="help-block">
                  <strong>{{ $errors->first('curp') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('dependiente_economico') ? ' has-error' : '' }}">
              <label for="no_2" class="col-md-4 control-label">¿Es dependiente económico?:<code>*</code></label>
              <br>
              <div class="col-md-6">
                <label>
                  <input type="radio" name="dependiente_economico" value="SÍ" tabindex="{{ ++$tabindex }}" @if($datos->dependiente_economico == 1) checked  @endif>
                  SÍ
                </label>
                &nbsp;&nbsp;&nbsp;
                <label>
                  <input id="no_2" type="radio" name="dependiente_economico" value="NO" tabindex="{{ ++$tabindex }}" @if($datos->dependiente_economico == 0) checked @endif>
                  NO
                </label>
              </div>
            </div>


            <div class="form-group{{ $errors->has('servidor_publico') ? ' has-error' : '' }}">
              <label for="no_4" class="col-md-4 control-label">¿Se ha desempeñado en la administración pública?:<code>*</code></label>
              <br>
              <div class="col-md-6">
                <label>
                  <input type="radio" name="servidor_publico" value="SÍ" tabindex="{{ ++$tabindex }}">
                  SÍ
                </label>
                &nbsp;&nbsp;&nbsp;
                <label>
                  <input id="no_4" type="radio" name="servidor_publico" value="NO" tabindex="{{ ++$tabindex }}" checked>
                  NO
                </label>
              </div>
            </div>


          <div id="div_dependencia">
            <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
              <label for="dependencia" class="col-md-4 control-label">Indica la dependencia: <code>*</code></label>
              <div class="col-md-6">
                <input id="dependencia" type="text" class="form-control" name="dependencia" tabindex="{{ ++$tabindex }}" value="@if(old('dependencia')){{ old('dependencia') }}@else{{ $datos->dependencia }}@endif" maxlength="35" required>
                @if ($errors->has('descripcion'))
                <span class="help-block">
                  <strong>{{ $errors->first('descripcion') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('periodo') ? ' has-error' : '' }}">
              <label for="periodo" class="col-md-4 control-label">Indica el periodo: <code>*</code></label>
              <div class="col-md-6">
                <input id="periodo" type="text" class="form-control" name="periodo" tabindex="{{ ++$tabindex }}" value="@if(old('periodo')){{ old('periodo') }}@else{{ $datos->periodo }}@endif" maxlength="35" required>
                @if ($errors->has('descripcion'))
                <span class="help-block">
                  <strong>{{ $errors->first('descripcion') }}</strong>
                </span>
                @endif
              </div>
            </div>
          </div>


            <div class="form-group{{ $errors->has('cohabitante') ? ' has-error' : '' }}">
              <label for="no" class="col-md-4 control-label">¿Cohabita con el declarante?:<code>*</code></label>
              <br>
              <div class="col-md-6">
                <label>
                  <input type="radio" name="cohabitante" value="SÍ" tabindex="{{ ++$tabindex }}" id="cohabitante_si" required>
                  SÍ
                </label>
                &nbsp;&nbsp;&nbsp;
                <label>
                  <input id="no" type="radio" name="cohabitante" value="NO" tabindex="{{ ++$tabindex }}">
                  NO
                </label>
              </div>
            </div>


          <div id="div_cohabitante">

            <div id="div_pais" class="form-group{{ $errors->has('pais') ? ' has-error' : '' }}">
              <label for="pais" class="col-md-4 control-label">País donde se ubica:<code>*</code></label>
              <div class="col-md-6">
                <select id="pais" name="pais" tabindex="{{ ++$tabindex }}" class="form-control">
                  <option></option>
                  @foreach($catalogos->paises() as $pais)
                  <option
                    @if($pais->pais == $datos->pais or $pais->pais == old('pais'))
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
              <label for="estado" class="col-md-4 control-label">Entidad donde se ubica:<code>*</code></label>
              <div class="col-md-6">
                <select id="estado" name="estado" tabindex="{{ ++$tabindex }}" class="form-control">
                  <option></option>
                  @foreach($catalogos->estados() as $estado)
                  <option value="{{ $estado->id }}"
                    @if($estado->estado == $datos->estado or $estado->estado == old('estado'))
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
                <select id="municipio" name="municipio" tabindex="{{ ++$tabindex }}" class="form-control">
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
                <input id="provincia" type="text" class="form-control" name="provincia" tabindex="{{ ++$tabindex }}" value="@if(old('provincia')){{ old('provincia') }}@else{{ $datos->provincia }}@endif" maxlength="30">
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
                <input id="condado" type="text" class="form-control" name="condado" tabindex="{{ ++$tabindex }}" value="@if(old('condado')){{ old('condado') }}@else{{ $datos->condado }}@endif" maxlength="30" required>
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
                <input id="colonia" type="text" class="form-control" name="colonia" tabindex="{{ ++$tabindex }}" value="@if(old('colonia')){{ old('colonia') }}@else{{ $datos->colonia }}@endif" maxlength="30" required>
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
                <input id="calle" type="text" class="form-control" name="calle" tabindex="{{ ++$tabindex }}" value="@if(old('calle')){{ old('calle') }}@else{{ $datos->calle }}@endif" maxlength="30" required>
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
                <input id="numero_exterior" type="number" class="form-control" tabindex="{{ ++$tabindex }}" name="numero_exterior" value="@if(old('numero_exterior')){{ old('numero_exterior') }}@else{{ $datos->numero_exterior }}@endif" max="9999">
                @if ($errors->has('numero_exterior'))
                <span class="help-block">
                  <strong>{{ $errors->first('numero_exterior') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('numero_interior') ? ' has-error' : '' }}">
              <label for="numero_interior" class="col-md-4 control-label">Número Interior: </label>
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
                <input id="cp" type="number" class="form-control" name="cp" tabindex="{{ ++$tabindex }}" value="@if(old('cp')){{ old('cp') }}@else{{ $datos->cp }}@endif" max="99999" required>
                @if ($errors->has('cp'))
                <span class="help-block">
                  <strong>{{ $errors->first('cp') }}</strong>
                </span>
                @endif
              </div>
            </div>
          </div>

@endsection




@section('jquery')
<script>

$("input[name='servidor_publico']").ready(mostrar_dependencia);
$("input[name='servidor_publico']").change(mostrar_dependencia);

$("input[name='cohabitante']").ready(mostrar_cohabitante);
$("input[name='cohabitante']").change(mostrar_cohabitante);

$("#pais").ready(mostrar_pais);
$("#pais").change(mostrar_pais);

function mostrar_cohabitante()
{
  var radioValue = $("input[name='cohabitante']:checked").val();

  if(radioValue == "NO")
  {
    $('#div_cohabitante').show('slow');
    $("#colonia").attr("required", "required");
    $("#calle").attr("required", "required");
    $("#cp").attr("required", "required");


  }
  else
  {
    $('#div_cohabitante').hide('slow');
    $("#colonia").removeAttr("required", "required");
    $("#calle").removeAttr("required", "required");
    $("#cp").removeAttr("required", "required");
  }
}


function mostrar_pais()
{

  if($("#pais").val() == '')
  {
    $('#div_estado').hide('slow');
    $('#div_municipio').hide('slow');

    $('#div_provincia').hide('slow');
    $('#div_condado').hide('slow');
    
    $("#provincia").removeAttr("required");
    $("#condado").removeAttr("required");
    
    $("#estado").removeAttr("required");
    $("#municipio").removeAttr("required");
  }
  else if($("#pais").val() != "MEXICO")
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
  else if($("#pais").val() == "MEXICO")
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


function mostrar_dependencia()
{
  var radioValue = $("input[name='servidor_publico']:checked").val();

  if(radioValue == "NO")
  {
    $('#div_dependencia').hide('slow');
    $('#dependencia').removeAttr("required", "required");
    $('#periodo').removeAttr("required", "required");
  }
  else
  {
    $('#div_dependencia').show('slow');
    $('#dependencia').attr("required", "required");
    $('#periodo').attr("required", "required");
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

</script>
@endsection
