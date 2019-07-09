@extends('layouts.menu')



@section('campos')

<div class="form-group{{ $errors->has('ninguno') ? ' has-error' : '' }}">
  <label for="ninguno" class="col-md-4">Ninguna observación:<code>*</code></label>
  <div class="col-md-8">
    <label>
      <input id="ninguno" type="checkbox" name="ninguno" value="1" tabindex="{{ ++$tabindex }}" @if($datos->ninguno == 1) checked  @endif>
      <code>Palomea en caso de que NO haya observaciones.</code>
    </label>
  </div>
  <div class="col-md-4">
  </div>
</div>


<div id="div_observaciones">
  <div class="form-group">
    <label for="observaciones" class="col-md-4">Observaciones:</label>
  </div>
  <div class="form-group">
    <div class="col-md-12">
      <p>
      Deberás usar este espacio para aclarar o ampliar la información sobre cualquier asunto referido a tu patrimonio, asi como cualquier sugerencia o comentario sobre el formato.
      </p>
      <textarea id="observaciones" rows="7" name="observaciones" tabindex="{{ ++$tabindex }}" class="form-control">@if(old('observaciones')){{ old('observaciones') }}@else{{ $datos->observaciones }}@endif</textarea>
    </div>
  </div>
</div>

@endsection





@section('jquery')
<script>
$('#ninguno').ready(mostrar);
$("#ninguno").click(mostrar);

function mostrar(){
  if($("#ninguno").is(":checked")) {
    $("#div_observaciones").hide('slow');
    $("#observaciones").removeAttr("required", "required");
  }
  else
  {
    $("#div_observaciones").show('slow');
    $("#observaciones").attr("required", "required");
  }}
</script>
@endsection
