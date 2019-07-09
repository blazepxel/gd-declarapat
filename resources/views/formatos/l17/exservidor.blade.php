@extends('layouts.menu')



@section('campos')

<div class="form-group{{ $errors->has('exservidor') ? ' has-error' : '' }}">
  <label for="si" class="col-md-12">¿Te desempeñaste como Servidor Público federal ó estatal ó municipal en el año inmediato anterior en una dependencia distinta a esta @Y($declaracion->created_at)?:<code>*</code></label>
  <br>
  <br>
  <div class="col-md-10">
    <label>
      <input type="radio" id="si" name="exservidor" value="1" tabindex="{{ ++$tabindex }}" @if($datos->exservidor == 1) checked  @endif>
      SÍ
    </label>
    &nbsp;&nbsp;&nbsp;
    <label>
      <input type="radio" name="exservidor" value="0" tabindex="{{ ++$tabindex }}" @if($datos->exservidor == 0) checked @endif>
      NO
    </label>
  </div>
</div>


<div id="div_fecha">
<div class="form-group{{ $errors->has('ingreso') ? ' has-error' : '' }}">
  <label for="ingreso" class="col-md-4 control-label">Fecha Ingreso: <code>*</code></label>
  <div class="col-md-4">
    <input id="ingreso" type="date" class="form-control" name="ingreso" tabindex="{{ ++$tabindex }}" value="@if(old('ingreso')){{ old('ingreso') }}@else{{ $datos->ingreso }}@endif">
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
    <input id="egreso" type="date" class="form-control" name="egreso" tabindex="{{ ++$tabindex }}" value="@if(old('egreso')){{ old('egreso') }}@else{{ $datos->egreso }}@endif">
    @if ($errors->has('egreso'))
    <span class="help-block">
      <strong>{{ $errors->first('egreso') }}</strong>
    </span>
    @endif
  </div>
</div>
</div>

<!-- aclaraciones -->
<div class="btn-group">
  <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#aclaracion">Agregar una aclaración:</button>
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="collapse" data-target="#aclaracion" aria-haspopup="true" aria-expanded="false" tabindex="{{ ++$tabindex }}">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
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
$(document).ready(function(){
  $("input[name$='exservidor']").ready(mostrar);
  $("input[name$='exservidor']").click(mostrar);

  function mostrar(){
    var radioValue = $("input[name='exservidor']:checked").val();

    if(radioValue == 1)
    {
      $('#div_fecha').show('slow');
    }
    else
    {
      $('#div_fecha').hide('slow');
    }
  }
});
</script>
@endsection
