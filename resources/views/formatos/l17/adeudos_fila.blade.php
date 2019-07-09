@extends('layouts.menu')



@section('campos')

            <div class="form-group{{ $errors->has('operacion') ? ' has-error' : '' }}">
              <label for="MEXICO" class="col-md-4 control-label">Tipo de operación:<code>*</code></label>
              <div class="col-md-6">
                <label>
                  <input id="MEXICO" type="radio" name="operacion" value="INCORPORACIÓN" tabindex="{{ ++$tabindex }}" @if($datos->ubicacion == "MEXICO" or old('ubicacion') == "EXTRANJERO") checked  @endif required>
                  INCORPORACIÓN
                </label>
                <br>
                <label>
                  <input type="radio" name="operacion" value="SALDO" tabindex="{{ ++$tabindex }}" @if($datos->ubicacion == "MEXICO" or old('ubicacion') == "EXTRANJERO") checked  @endif required>
                  SALDO
                </label>
                <br>
                <label>
                  <input type="radio" name="operacion" value="FINIQUITO" tabindex="{{ ++$tabindex }}" @if($datos->ubicacion == "MEXICO" or old('ubicacion') == "EXTRANJERO") checked  @endif required>
                  FINIQUITO
                </label>
              </div>
            </div>


            <div id="div_estado" class="form-group{{ $errors->has('tipo_inversion') ? ' has-error' : '' }}">
              <label for="tipo_inversion" class="col-md-4 control-label">Especifíca el tipo:<code>*</code></label>
              <div class="col-md-6">
                <select id="tipo_inversion" name="tipo_inversion" tabindex="{{ ++$tabindex }}" class="form-control" required autofocus>
                  <option></option>
                  <option>COMPRA DE VEHICULO</option>
                  <option>COMPRAS A CREDITO</option>
                  <option>CREDITOS HIPOTECARIOS</option>
                  <option>PRESTAMOS PERSONALES</option>
                  <option>COMPRA DE VEHICULO</option>
                  <option>TARJETAS DE CREDITO</option>
                </select>
                @if($errors->has('tipo_inversion'))
                <span class="help-block">
                  <strong>{{ $errors->first('tipo_inversion') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div id="div_estado" class="form-group{{ $errors->has('numero_cuenta') ? ' has-error' : '' }}">
              <label for="numero_cuenta" class="col-md-4 control-label">Número de cuenta o contrato:<code>*</code></label>
              <div class="col-md-6">
              <input id="numero_cuenta" type="text" class="form-control" name="numero_cuenta" tabindex="{{ ++$tabindex }}" value="@if(old('numero_cuenta')){{ old('numero_cuenta') }}@else{{ $datos->numero_cuenta }}@endif" maxlength="35" required>
                @if($errors->has('numero_cuenta'))
                <span class="help-block">
                  <strong>{{ $errors->first('numero_cuenta') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('institucion_social') ? ' has-error' : '' }}">
              <label for="institucion_social" class="col-md-4 control-label">Institución, razón social o acreedor: <code>*</code></label>
              <div class="col-md-6">
                <input id="institucion_social" type="text" class="form-control" name="institucion_social" tabindex="{{ ++$tabindex }}" value="@if(old('institucion_social')){{ old('institucion_social') }}@else{{ $datos->institucion_social }}@endif" maxlength="35" required>
                @if ($errors->has('institucion_social'))
                <span class="help-block">
                  <strong>{{ $errors->first('institucion_social') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('fecha_otorgamiento') ? ' has-error' : '' }}">
              <label for="fecha_otorgamiento" class="col-md-4 control-label">Fecha de otorgamiento: <code>*</code></label>
              <div class="col-md-4">
                <input id="fecha_otorgamiento" type="date" class="form-control" name="fecha_otorgamiento" tabindex="{{ ++$tabindex }}" value="@if(old('fecha_otorgamiento')){{ old('fecha_otorgamiento') }}@else{{ $datos->fecha_otorgamiento }}@endif" required>
                @if ($errors->has('fecha_otorgamiento'))
                <span class="help-block">
                  <strong>{{ $errors->first('fecha_otorgamiento') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('monto') ? ' has-error' : '' }} {{ $errors->has('moneda_monto') ? ' has-error' : '' }}">
              <label for="monto" class="col-md-4 control-label">Monto original de adeudo: <code>*</code></label>
              <div class="col-md-3">
                <input id="monto" type="text" class="form-control" name="monto" value="@if(old('monto')){{ old('monto') }}@else{{ $datos->monto }}@endif" tabindex="{{ ++$tabindex }}"  required>
                @if ($errors->has('rfc'))
                <span class="help-block">
                  <strong>{{ $errors->first('rfc') }}</strong>
                </span>
                @endif
              </div>
              <div class="col-md-3">
                <input id="moneda_monto" type="text" class="form-control" name="moneda_monto" value="MXN" tabindex="{{ ++$tabindex }}" placeholder="TIPO MONEDA" required>
                @if ($errors->has('moneda_monto'))
                <span class="help-block">
                  <strong>{{ $errors->first('moneda_monto') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('plazo') ? ' has-error' : '' }}">
              <label for="plazo" class="col-md-4 control-label">Plazo del adeudo en meses (creditos) o años (hipoteas): <code>*</code></label>
              <div class="col-md-6">
                <input id="plazo" type="text" class="form-control" name="plazo" tabindex="{{ ++$tabindex }}" value="@if(old('plazo')){{ old('plazo') }}@else{{ $datos->plazo }}@endif" maxlength="35" required>
                @if ($errors->has('plazo'))
                <span class="help-block">
                  <strong>{{ $errors->first('plazo') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('monto_pagos') ? ' has-error' : '' }}">
              <label for="monto_pagos" class="col-md-4 control-label">Monto de los pagos realizados en el año anterior (Capital e intereses): <code>*</code></label>
              <div class="col-md-6">
                <input id="monto_pagos" type="text" class="form-control" name="monto_pagos" tabindex="{{ ++$tabindex }}" value="@if(old('monto_pagos')){{ old('monto_pagos') }}@else{{ $datos->monto_pagos }}@endif" maxlength="35" required>
                @if ($errors->has('monto_pagos'))
                <span class="help-block">
                  <strong>{{ $errors->first('monto_pagos') }}</strong>
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


            <div id="div_estado" class="form-group{{ $errors->has('titular') ? ' has-error' : '' }}">
              <label for="titular" class="col-md-4 control-label">Titular:<code>*</code></label>
              <div class="col-md-6">
                <select id="titular" name="titular" tabindex="{{ ++$tabindex }}" class="form-control" required>
                  <option></option>
                  <option>CONCUBINA O CONCUBINARIO</option>
                  <option>CONYUGE</option>
                  <option>CONYUGE EN COPROPIEDAD</option>
                  <option>DECLARANTE</option>
                  <option>DECLARANTE EN COPROPIEDAD</option>
                  <option>DECLARANTE  Y CONYUGE</option>
                  <option>DEPENDIENTES</option>
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

@endsection
