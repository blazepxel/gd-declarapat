@extends('layouts.menu')



@section('campos')

  <div class="form-group{{ $errors->has('nivel') ? ' has-error' : '' }}">
    <label for="nivel" class="col-md-4 control-label">Nivel Educativo:<code>*</code></label>
    <div class="col-md-6">
      <select id="nivel" name="nivel_educativo" tabindex="{{ ++$tabindex }}" class="form-control" required autofocus>
        <option></option>
        @foreach($catalogos->niveles_educativos() as $nivel)
        <option value="{{ $nivel->id }}" @if($nivel->nivel == old('nivel')) selected @endif >{{ $nivel->nivel }}</option>
        @endforeach
      </select>
      @if($errors->has('nivel'))
      <span class="help-block">
        <strong>{{ $errors->first('nivel') }}</strong>
      </span>
      @endif
    </div>
  </div>


  <div id="div_ubicacion">
    <div id="div_pais" class="form-group{{ $errors->has('pais') ? ' has-error' : '' }}">
      <label for="pais" class="col-md-4 control-label">País donde se ubica:<code>*</code></label>
      <div class="col-md-6">
      <select id="pais" name="pais" tabindex="{{ ++$tabindex }}" class="form-control" required>
        <option></option>
        @foreach($catalogos->paises() as $pais)
        <option
          @if($pais->pais == old('pais'))
            selected
          @elseif($pais->pais == "MEXICO" and old('pais') == null)
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
        <input id="provincia" type="text" class="form-control" tabindex="{{ ++$tabindex }}" value="@if(old('provincia')){{ old('provincia') }}@endif" maxlength="35">
        @if ($errors->has('provincia'))
        <span class="help-block">
          <strong>{{ $errors->first('provincia') }}</strong>
        </span>
        @endif
      </div>
    </div>


    <div id="div_condado" class="form-group{{ $errors->has('condado') ? ' has-error' : '' }}">
      <label for="condado" class="col-md-4 control-label">Municipio o condado: <code>*</code></label>
      <div class="col-md-6">
        <input id="condado" type="text" class="form-control" tabindex="{{ ++$tabindex }}" value="@if(old('condado')){{ old('condado') }}@endif" maxlength="35">
        @if ($errors->has('condado'))
        <span class="help-block">
          <strong>{{ $errors->first('condado') }}</strong>
        </span>
        @endif
      </div>
    </div>


    <div id="div_estado" class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
      <label for="estado" class="col-md-4 control-label">Estado en que se ubica:<code>*</code></label>
      <div class="col-md-6">
        <select id="estado" tabindex="{{ ++$tabindex }}" class="form-control">
          <option></option>
          @foreach($catalogos->estados() as $estado)
          <option value="{{ $estado->id }}" @if($estado->estado == old('estado')) selected @endif >{{ $estado->estado }}</option>
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
        <select id="municipio" tabindex="{{ ++$tabindex }}" class="form-control">
          <option></option>
        </select>
        @if($errors->has('municipio'))
        <span class="help-block">
          <strong>{{ $errors->first('municipio') }}</strong>
        </span>
        @endif
      </div>
    </div>





    <div class="form-group{{ $errors->has('conocimiento') ? ' has-error' : '' }}">
      <label for="conocimiento" class="col-md-4 control-label">Carrera/Área de conocimiento: <code>*</code></label>
      <div class="col-md-6">
        <input id="conocimiento" type="text" class="form-control" name="conocimiento" tabindex="{{ ++$tabindex }}" value="@if(old('conocimiento')){{ old('conocimiento') }}@endif" maxlength="35">
        @if ($errors->has('conocimiento'))
        <span class="help-block">
          <strong>{{ $errors->first('conocimiento') }}</strong>
        </span>
        @endif
      </div>
    </div>
  </div>


  <div class="form-group{{ $errors->has('institucion') ? ' has-error' : '' }}">
    <label for="institucion" class="col-md-4 control-label">Institución: <code>*</code></label>
    <div class="col-md-6">
      <input id="institucion" type="text" class="form-control" name="institucion" value="@if(old('institucion')){{ old('institucion') }}@endif" tabindex="{{ ++$tabindex }}" required maxlength="35">
      @if ($errors->has('institucion'))
      <span class="help-block">
        <strong>{{ $errors->first('institucion') }}</strong>
      </span>
      @endif
    </div>
  </div>


  <div class="form-group{{ $errors->has('estatus') ? ' has-error' : '' }}">
    <label for="estatus" class="col-md-4 control-label">Estatus:<code>*</code></label>
    <div class="col-md-6">
      <select id="estatus" name="estatus" tabindex="{{ ++$tabindex }}" class="form-control" required>
        <option></option>
        @foreach($catalogos->estatus_escolaridad() as $estatus)
        <option @if($estatus->estatus == old('estatus')) selected @endif >{{ $estatus->estatus }}</option>
        @endforeach
      </select>
      @if($errors->has('estatus'))
      <span class="help-block">
        <strong>{{ $errors->first('estatus') }}</strong>
      </span>
      @endif
    </div>
  </div>


  <div id="div_cursado" class="form-group{{ $errors->has('periodos') ? ' has-error' : '' }}">
    <label for="no_periodos" class="col-md-4 control-label">Periodos cursados: <code>*</code></label>
    <div class="col-md-2">
      <input id="no_periodos" type="number" class="form-control" name="no_periodos" value="@if(old('no_periodos')){{ old('no_periodos') }}@endif" tabindex="{{ ++$tabindex }}" required max="10" min="1">
      @if ($errors->has('no_periodos'))
      <span class="help-block">
        <strong>{{ $errors->first('no_periodos') }}</strong>
      </span>
      @endif
    </div>
    <div class="col-md-4">
      <select id="periodo" name="periodo" tabindex="{{ ++$tabindex }}" class="form-control">
        <option></option>
        @foreach($catalogos->periodos() as $periodo)
        <option @if($periodo->periodo == old('periodo')) selected @endif >{{ $periodo->periodo }}</option>
        @endforeach
      </select>
      @if($errors->has('periodo'))
      <span class="help-block">
        <strong>{{ $errors->first('periodo') }}</strong>
      </span>
      @endif
    </div>
  </div>


  <div class="form-group{{ $errors->has('documento') ? ' has-error' : '' }}">
    <label for="documento" class="col-md-4 control-label">Documento obtenido:<code>*</code></label>
    <div class="col-md-6">
      <select id="documento" name="documento" tabindex="{{ ++$tabindex }}" class="form-control" required>
        <option></option>
      </select>
      @if($errors->has('documento'))
      <span class="help-block">
        <strong>{{ $errors->first('documento') }}</strong>
      </span>
      @endif
    </div>
  </div>


  <div id="div_cedula" class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
    <label for="cedula" class="col-md-4 control-label">Cédula: <code>*</code></label>
    <div class="col-md-6">
      <input id="cedula" type="text" class="form-control" name="cedula" value="@if(old('cedula')){{ old('cedula') }}@endif" tabindex="{{ ++$tabindex }}" maxlength="35">
      @if ($errors->has('cedula'))
      <span class="help-block">
        <strong>{{ $errors->first('cedula') }}</strong>
      </span>
      @endif
    </div>
  </div>

@endsection




@section('jquery')
<script>
$('#nivel').ready(mostrar_ubicacion);
$('#nivel').on('change',mostrar_ubicacion);

$('#estatus').ready(mostrar_cursando);
$('#estatus').on('change',mostrar_cursando);

$('#documento').ready(mostrar_cedula);
$('#documento').on('change',mostrar_cedula);


function mostrar_ubicacion(){
  if($('#nivel').val() > 3)
  {
    $('#div_ubicacion').show('slow');

    $("#conocimiento").attr("required","true");

    $('#pais').ready(mostrar_estado);
    $('#pais').on('change',mostrar_estado);
  }
  else
  {
    $('#div_ubicacion').hide('slow');

    $("#provincia").removeAttr("required");
    $("#condado").removeAttr("required");

    $("#estado").removeAttr("required");
    $("#municipio").removeAttr("required");

    $("#conocimiento").removeAttr("required");
  }
}


function mostrar_estado(){

  if($('#pais').val() == "MEXICO" && $('#div_ubicacion').is(":visible"))
  {
    $('#div_estado').show('slow');
    $('#div_municipio').show('slow');

    $("#estado").attr("required","true");
    $("#municipio").attr("required","true");

    $("#estado").attr("name","estado");
    $("#municipio").attr("name","municipio");

    $('#div_provincia').hide('slow');
    $('#div_condado').hide('slow');

    $("#provincia").removeAttr("name");
    $("#condado").removeAttr("name");    

    $("#provincia").removeAttr("required");
    $("#condado").removeAttr("required");
  }
  else if($('#pais').val() != "MEXICO" && $('#div_ubicacion').is(":visible"))
  {
    $('#div_estado').hide('slow');
    $('#div_municipio').hide('slow');

    $("#estado").removeAttr("required");
    $("#municipio").removeAttr("required");

    $("#estado").removeAttr("name");
    $("#municipio").removeAttr("name");

    $('#div_provincia').show('slow');
    $('#div_condado').show('slow');

    $("#provincia").attr("required","true");
    $("#condado").attr("required","true");

    $("#provincia").attr("name","estado");
    $("#condado").attr("name","municipio");
  }
}


function mostrar_cursando(){
  if($('#estatus').val() != "FINALIZADO" && $('#estatus').val() != '')
  {
    $('#div_cursado').show('slow');
    $("#no_periodos").attr("required","true");
    $("#periodo").attr("required","true");
  }
  else
  {
    $('#div_cursado').hide('slow');
    $("#no_periodos").removeAttr("required");
    $("#periodo").removeAttr("required");
  }
}


function mostrar_cedula(){
  if($('#documento').val() == "TITULO")
  {
    $('#div_cedula').show('slow');
    $("#cedula").attr("required","true");
  }
  else
  {
    $('#div_cedula').hide('slow');
    $("#cedula").removeAttr("required");
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


$("#nivel").change(event => {
  $.get(`/catalogo/documentos/${event.target.value}`, function(res){

		$("#documento").empty();

		res.forEach(element => {
			$("#documento").append(`<option> ${element}</option>`);
		});
	});
});
</script>
@endsection
