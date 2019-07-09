@extends('layouts.menu')



@section('campos')

<div class="form-group{{ $errors->has('publico') ? ' has-error' : '' }}">
  <label for="si" class="col-md-12">¿Estás de acuerdo en hacer pública la información de tu posible conflicto de interés?:<code>*</code></label>
  <br>
  <br>
  <div class="col-md-10">
    <label>
      <input id="si" type="radio" name="publico" value="1" tabindex="{{ ++$tabindex }}" @if($datos->publico == 1 ) checked  @endif>
      SÍ
    </label>
    &nbsp;&nbsp;&nbsp;
    <label>
      <input type="radio" name="publico" value="0" tabindex="{{ ++$tabindex }}" @if($datos->publico == 0 ) checked @endif>
      NO
    </label>
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
      <textarea id="aclaraciones" rows="7" name="aclaraciones" tabindex="{{ ++$tabindex }}" placeholder="Aclaraciones únicamente sobre este formato" class="form-control">@if(old('aclaraciones')){{ old('aclaraciones') }}@else{{ $datos->aclaraciones }}@endif</textarea>
    </div>
  </div>
</div>
<!--// aclaraciones -->

@endsection
