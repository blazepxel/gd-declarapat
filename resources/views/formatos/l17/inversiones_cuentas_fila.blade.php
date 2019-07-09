@extends('layouts.menu')



@section('campos')

            <div class="form-group{{ $errors->has('operacion') ? ' has-error' : '' }}">
              <label for="MEXICO" class="col-md-4 control-label">Tipo de operación:<code>*</code></label>
              <div class="col-md-6">
                <label>
                  <input id="MEXICO" type="radio" name="operacion" value="INCORPORACIÓN" tabindex="{{ ++$tabindex }}" @if($datos->ubicacion == "MEXICO" or old('ubicacion') == "EXTRANJERO") checked  @endif required>
                  INCORPORACIÓN
                </label>
                <label>
                  <input id="MEXICO" type="radio" name="operacion" value="SALDO" tabindex="{{ ++$tabindex }}" @if($datos->ubicacion == "MEXICO" or old('ubicacion') == "EXTRANJERO") checked  @endif required>
                  SALDO
                </label>
                <label>
                  <input id="MEXICO" type="radio" name="operacion" value="VENTA" tabindex="{{ ++$tabindex }}" @if($datos->ubicacion == "MEXICO" or old('ubicacion') == "EXTRANJERO") checked  @endif required>
                  VENTA
                </label>
              </div>
            </div>


            <div id="div_tipo_inversion" class="form-group{{ $errors->has('tipo_inversion') ? ' has-error' : '' }}">
              <label for="tipo_inversion" class="col-md-4 control-label">Tipo de inversión:<code>*</code></label>
              <div class="col-md-6">
                <select id="tipo_inversion" name="tipo_inversion" tabindex="{{ ++$tabindex }}" class="form-control" required autofocus>
                  <option></option>
                  @foreach($catalogos->inversiones() as $inversion)
                  <option value="{{ $inversion->id }}"
                    @if($inversion->inversion == old('tipo_inversion'))
                    selected
                    @elseif($inversion->inversion == $datos->inversion and old('tipo_inversion') == null)
                    selected
                    @endif
                  >{{ $inversion->inversion }}</option>
                  @endforeach
                </select>
                @if($errors->has('tipo_inversion'))
                <span class="help-block">
                  <strong>{{ $errors->first('tipo_inversion') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('especifica_tipo') ? ' has-error' : '' }}">
              <label for="especifica_tipo" class="col-md-4 control-label">Especifíca el tipo:<code>*</code></label>
              <div class="col-md-6">
                <select id="especifica_tipo" name="especifica_tipo" tabindex="{{ ++$tabindex }}" class="form-control" required >

                </select>
                @if($errors->has('especifica_tipo'))
                <span class="help-block">
                  <strong>{{ $errors->first('especifica_tipo') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('numero_cuenta') ? ' has-error' : '' }}">
              <label for="numero_cuenta" class="col-md-4 control-label">No. de cuenta o contrato: <code>*</code></label>
              <div class="col-md-6">
                <input id="numero_cuenta" type="text" class="form-control" name="numero_cuenta" tabindex="{{ ++$tabindex }}" value="@if(old('numero_cuenta')){{ old('numero_cuenta') }}@else{{ $datos->numero_cuenta }}@endif" maxlength="35" required>
                @if ($errors->has('numero_cuenta'))
                <span class="help-block">
                  <strong>{{ $errors->first('numero_cuenta') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('ubicacion') ? ' has-error' : '' }}">
              <label for="MEXICO" class="col-md-4 control-label">¿Dónde se localiza la inversión?:<code>*</code></label>
              <div class="col-md-6">
                <label>
                  <input id="MEXICO" type="radio" name="ubicacion" value="MEXICO"     tabindex="{{ ++$tabindex }}" @if(old('ubicacion') == "MEXICO")     checked @elseif($datos->ubicacion == "MEXICO"     and old('ubicacion') == null) checked @endif required>
                  MEXICO
                </label>
                &nbsp;&nbsp;&nbsp;
                <label>
                  <input             type="radio" name="ubicacion" value="EXTRANJERO" tabindex="{{ ++$tabindex }}" @if(old('ubicacion') == "EXTRANJERO") checked @elseif($datos->ubicacion == "EXTRANJERO" and old('ubicacion') == null) checked @endif>
                  EXTRANJERO
                </label>
              </div>
            </div>

            <div class="form-group{{ $errors->has('institucion') ? ' has-error' : '' }}">
              <label for="institucion" class="col-md-4 control-label">Institución o razón social: <code>*</code></label>
              <div class="col-md-6">
                <input id="institucion" type="text" class="form-control" name="institucion" tabindex="{{ ++$tabindex }}" value="@if(old('institucion')){{ old('institucion') }}@else{{ $datos->institucion }}@endif" maxlength="35" required placeholder="EJEMPLO: BANAMEX">
                @if ($errors->has('institucion'))
                <span class="help-block">
                  <strong>{{ $errors->first('institucion') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div id="div_pais" class="form-group{{ $errors->has('pais') ? ' has-error' : '' }}">
              <label for="pais" class="col-md-4 control-label">País donde se ubica la institución:<code>*</code></label>
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


            <div class="form-group{{ $errors->has('saldo') ? ' has-error' : '' }} {{ $errors->has('moneda_saldo') ? ' has-error' : '' }}">
              <label for="saldo" class="col-md-4 control-label">Saldo al 31 de diciembre del año inmediato anterior: <code>*</code></label>
              <div class="col-md-3">
                <input id="saldo" type="text" class="form-control" name="saldo" value="@if(old('saldo')){{ old('saldo') }}@else{{ $datos->saldo }}@endif" tabindex="{{ ++$tabindex }}" required>
                @if ($errors->has('saldo'))
                <span class="help-block">
                  <strong>{{ $errors->first('saldo') }}</strong>
                </span>
                @endif
              </div>
              <div class="col-md-3">
                <input id="moneda_saldo" type="text" class="form-control" name="moneda_saldo" value="MXN" tabindex="{{ ++$tabindex }}" placeholder="TIPO MONEDA" required>
                @if ($errors->has('moneda_saldo'))
                <span class="help-block">
                  <strong>{{ $errors->first('moneda_saldo') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('titular') ? ' has-error' : '' }}">
              <label for="titular" class="col-md-4 control-label">Titular:<code>*</code></label>
              <div class="col-md-6">
                <select id="titular" name="titular" tabindex="{{ ++$tabindex }}" class="form-control" required>
                  <option></option>
                  @foreach($catalogos->titulares() as $titular)
                  <option
                    @if($titular->titular == $datos->titular or $titular->titular == old('titular'))
                    selected
                    @endif
                  >{{ $titular->titular }}</option>
                  @endforeach
                </select>
                @if($errors->has('titular'))
                <span class="help-block">
                  <strong>{{ $errors->first('titular') }}</strong>
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
  }
  else
  {
    $('#div_pais').hide('slow');
  }
}


$("#tipo_inversion").change(event => {
  $.get(`/catalogo/especifica_tipo/${event.target.value}`, function(res){

		$("#especifica_tipo").empty();

		res.forEach(element => {
			$("#especifica_tipo").append(`<option> ${element} </option>`);
		});
	});
});
</script>
@endsection
