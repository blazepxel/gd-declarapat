@extends('layouts.menu')



@section('campos')

<div class="form-group{{ $errors->has('publicar') ? ' has-error' : '' }}">
  <label for="no" class="col-md-12">¿Estás de acuerdo en hacer públicos tus datos patrimoniales?:<code>*</code></label>
  <br>
  <br>
  <div class="col-md-10">
    <label>
      <input type="radio" name="publicar" value="1" tabindex="{{ ++$tabindex }}" @if($datos->publicar == 1) checked  @endif>
      SÍ
    </label>
    &nbsp;&nbsp;&nbsp;
    <label>
      <input id="no" type="radio" name="publicar" value="0" tabindex="{{ ++$tabindex }}" @if($datos->publicar == 0) checked @endif>
      NO
    </label>
  </div>
</div>


  <div class="col-md-10" id="info">
    <p>
      Al elegir esta opción manifiesta de forma libre, específica e informada hacer pública la siguiente información:
    </p>
    <ul>
      <li>
        En ingresos netos, los correspondientes a los recibidos por actividad industrial, y/o comercial, financiera y otros, así como el monto total de los ingresos considerando a los antes citados.
      </li>
      <li>
        En bienes inmuebles, el valor de la contraprestación y moneda.
      </li>
      <li>
        En bienes muebles, el valor de la contraprestación y moneda.
      </li>
      <li>
        En vehículos, el valor de la contraprestación y moneda.
      </li>
      <li>
        En adeudos, el monto original, el saldo y el monto de los pagos realizados.
      </li>
      <li>
        En inversiones, cuentas bancarias y otro tipo de valores, el saldo.
      </li>
      <li>
        De aceptar hacer pública su declaración patrimonial, los datos de terceros estarán protegidos conforme a las disposiciones de la Ley General de Protección de Datos Personales en Posesión de Sujetos Obligados.
      </li>
    </ul>
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
  $("input[name$='publicar']").ready(mostrar);
  $("input[name$='publicar']").click(mostrar);

  function mostrar(){
    var radioValue = $("input[name='publicar']:checked").val();

    if(radioValue == 1)
    {
      $('#info').show('slow');
    }
    else
    {
      $('#info').hide('slow');
    }
  }
});
</script>
@endsection
