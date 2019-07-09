@extends('layouts.menu')



@section('campos')

  <div class="form-group{{ $errors->has('sector') ? ' has-error' : '' }}">
    <label for="sector" class="col-md-4 control-label">Sector:<code>*</code></label>
    <div class="col-md-6">
      <select id="sector" name="sector" tabindex="{{ ++$tabindex }}" class="form-control" required>
        <option></option>
        @foreach($catalogos->sectores() as $sector)
        <option @if($sector->sector == old('sector')) selected @endif >{{ $sector->sector }}</option>
        @endforeach
      </select>
      @if($errors->has('sector'))
      <span class="help-block">
        <strong>{{ $errors->first('sector') }}</strong>
      </span>
      @endif
    </div>
  </div>


<div id="div_publico">
  <div class="form-group{{ $errors->has('poder') ? ' has-error' : '' }}">
    <label for="poder" class="col-md-4 control-label">Poder:<code>*</code></label>
    <div class="col-md-6">
      <select id="poder" name="poder" tabindex="{{ ++$tabindex }}" class="form-control" required>
        <option></option>
        @foreach($catalogos->poderes() as $poder)
        <option @if($poder->poder == old('poder')) selected @endif >{{ $poder->poder }}</option>
        @endforeach
      </select>
      @if($errors->has('poder'))
      <span class="help-block">
        <strong>{{ $errors->first('poder') }}</strong>
      </span>
      @endif
    </div>
  </div>


  <div class="form-group{{ $errors->has('ambito') ? ' has-error' : '' }}">
    <label for="ambito" class="col-md-4 control-label">Ámbito:<code>*</code></label>
    <div class="col-md-6">
      <select id="ambito" name="ambito" tabindex="{{ ++$tabindex }}" class="form-control" required>
        <option></option>
        @foreach($catalogos->ambitos() as $ambito)
        <option @if($ambito->ambito == old('ambito')) selected @endif >{{ $ambito->ambito }}</option>
        @endforeach
      </select>
      @if($errors->has('ambito'))
      <span class="help-block">
        <strong>{{ $errors->first('ambito') }}</strong>
      </span>
      @endif
    </div>
  </div>


  <div class="form-group{{ $errors->has('institucion') ? ' has-error' : '' }}">
    <label for="institucion" class="col-md-4 control-label">Institución: <code>*</code></label>
    <div class="col-md-6">
      <input id="institucion" type="text" class="form-control" name="institucion" tabindex="{{ ++$tabindex }}" value="@if(old('institucion')){{ old('institucion') }}@else{{ $datos->institucion }}@endif" maxlength="35" required>
      @if ($errors->has('institucion'))
      <span class="help-block">
        <strong>{{ $errors->first('institucion') }}</strong>
      </span>
      @endif
    </div>
  </div>


  <div class="form-group{{ $errors->has('unidad') ? ' has-error' : '' }}">
    <label for="unidad" class="col-md-4 control-label">Unidad Administrativa: <code>*</code></label>
    <div class="col-md-6">
      <input id="unidad" type="text" class="form-control" name="unidad" tabindex="{{ ++$tabindex }}" value="@if(old('unidad')){{ old('unidad') }}@else{{ $datos->puesto_o_cargo }}@endif" maxlength="35" required>
      @if ($errors->has('unidad'))
      <span class="help-block">
        <strong>{{ $errors->first('unidad') }}</strong>
      </span>
      @endif
    </div>
  </div>
</div>


<div id="div_nopublico">
  <div class="form-group{{ $errors->has('razon_social') ? ' has-error' : '' }}">
    <label for="razon_social" class="col-md-4 control-label">Nombre o Razón Social: <code>*</code></label>
    <div class="col-md-6">
      <input id="razon_social" type="text" class="form-control" name="razon_social" tabindex="{{ ++$tabindex }}" value="@if(old('razon_social')){{ old('razon_social') }}@else{{ $datos->razon_social }}@endif" maxlength="35" required>
      @if ($errors->has('razon_social'))
      <span class="help-block">
        <strong>{{ $errors->first('razon_social') }}</strong>
      </span>
      @endif
    </div>
  </div>


  <div class="form-group{{ $errors->has('area') ? ' has-error' : '' }}">
    <label for="area" class="col-md-4 control-label">Área: <code>*</code></label>
    <div class="col-md-6">
      <input id="area" type="text" class="form-control" name="area" tabindex="{{ ++$tabindex }}" value="@if(old('area')){{ old('area') }}@else{{ $datos->area }}@endif" maxlength="35" required>
      @if ($errors->has('area'))
      <span class="help-block">
        <strong>{{ $errors->first('area') }}</strong>
      </span>
      @endif
    </div>
  </div>
</div>


  <div class="form-group{{ $errors->has('puesto_o_cargo') ? ' has-error' : '' }}">
    <label for="puesto_o_cargo" class="col-md-4 control-label">Puesto o Cargo desempeñado: <code>*</code></label>
    <div class="col-md-6">
      <input id="puesto_o_cargo" type="text" class="form-control" name="puesto_o_cargo" tabindex="{{ ++$tabindex }}" value="@if(old('puesto_o_cargo')){{ old('puesto_o_cargo') }}@else{{ $datos->funcion }}@endif" maxlength="35" required>
      @if ($errors->has('puesto_o_cargo'))
      <span class="help-block">
        <strong>{{ $errors->first('puesto_o_cargo') }}</strong>
      </span>
      @endif
    </div>
  </div>


  <div class="form-group{{ $errors->has('funcion') ? ' has-error' : '' }}">
    <label for="funcion" class="col-md-4 control-label">Función Principal: <code>*</code></label>
    <div class="col-md-6">
      <input id="funcion" type="text" class="form-control" name="funcion" tabindex="{{ ++$tabindex }}" value="@if(old('funcion')){{ old('funcion') }}@else{{ $datos->funcion }}@endif" maxlength="35" required>
      @if ($errors->has('funcion'))
      <span class="help-block">
        <strong>{{ $errors->first('funcion') }}</strong>
      </span>
      @endif
    </div>
  </div>


  <div class="form-group{{ $errors->has('ingreso') ? ' has-error' : '' }}">
    <label for="ingreso" class="col-md-4 control-label">Fecha Ingreso: <code>*</code></label>
    <div class="col-md-4">
      <input id="ingreso" type="date" class="form-control" name="ingreso" tabindex="{{ ++$tabindex }}" value="@if(old('ingreso')){{ old('ingreso') }}@else{{ $datos->ingreso }}@endif" required>
      @if ($errors->has('ingreso'))
      <span class="help-block">
        <strong>{{ $errors->first('ingreso') }}</strong>
      </span>
      @endif
    </div>
  </div>


  <div class="form-group{{ $errors->has('egreso') ? ' has-error' : '' }}">
    <label for="egreso" class="col-md-4 control-label">Fecha Egreso: <code>*</code></label>
    <div class="col-md-4">
      <input id="egreso" type="date" class="form-control" name="egreso" tabindex="{{ ++$tabindex }}" value="@if(old('egreso')){{ old('egreso') }}@else{{ $datos->egreso }}@endif" required>
      @if ($errors->has('egreso'))
      <span class="help-block">
        <strong>{{ $errors->first('egreso') }}</strong>
      </span>
      @endif
    </div>
  </div>

@endsection




@section('jquery')
<script>
$('#sector').ready(mostrar_publico);
$('#sector').on('change',mostrar_publico);


function mostrar_publico(){
  if($('#sector').val() == "PUBLICO")
  {
    $('#div_publico').show('slow');
    $('#div_nopublico').hide('slow');

    $("#poder").attr("required","true");
    $("#ambito").attr("required","true");
    $("#institucion").attr("required","true");
    $("#unidad").attr("required","true");

    $("#razon_social").removeAttr("required");
    $("#area").removeAttr("required");
  }
  if($('#sector').val() == "PRIVADO" || $('#sector').val() == "SOCIAL")
  {
    $('#div_publico').hide('slow');
    $('#div_nopublico').show('slow');

    $("#razon_social").attr("required","true");
    $("#area").attr("required","true");

    $("#poder").removeAttr("required");
    $("#ambito").removeAttr("required");
    $("#institucion").removeAttr("required");
    $("#unidad").removeAttr("required");
  }
  if($('#sector').val() == '')
  {
    $('#div_publico').hide('slow');
    $('#div_nopublico').hide('slow');
  }
}
</script>
@endsection
