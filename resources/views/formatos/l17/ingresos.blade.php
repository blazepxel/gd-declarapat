@extends('layouts.menu')





@section('campos')


            <div class="form-group{{ $errors->has('remuneracion_anual') ? ' has-error' : '' }}">
              <label for="remuneracion_anual" class="col-md-8 control-label">
                I. Remuneración 
                @if($declaracion->tipo == "Modificación")
                <code>anual</code>
                @endif
                neta del declarante por su cargo público. (Deduce impuestos). (Por concepto de sueldos honorarios, compensaciones, bonos, aguinaldos y otras prestaciones.)<code>*</code>
              </label>
              <div class="col-md-4">
                <input id="remuneracion_anual" type="number" class="form-control" name="remuneracion_anual" tabindex="{{ ++$tabindex }}" value="@if(old('remuneracion_anual')){{ old('remuneracion_anual') }}@else{{ $datos->remuneracion_anual }}@endif" maxlength="35" required autofocus placeholder="CANTIDAD EN NÚMEROS" required>
                @if ($errors->has('remuneracion_anual'))
                <span class="help-block">
                  <strong>{{ $errors->first('remuneracion_anual') }}</strong>
                </span>
                @endif
                <code>Sin decimales</code>
              </div>
            </div>

            <p>&nbsp;</p>
            <p>&nbsp;</p>

            <div class="form-group{{ $errors->has('otros_ingresos') ? ' has-error' : '' }}">
              <label for="otros_ingresos" class="col-md-8 control-label">
                II. Otros ingresos 
                @if($declaracion->tipo == "Modificación")
                <code>anuales</code>
                @endif
                netos del declarante. . <code>*</code></label>
              <div class="col-md-4">
                <input id="otros_ingresos" type="number" class="form-control" tabindex="{{ ++$tabindex }}" maxlength="35" required placeholder="(suma II.1 a II.4)" readonly>
                <code>No llenar</code>
              </div>
            </div>

            <p>&nbsp;</p>

            <div class="form-group{{ $errors->has('actividad_industrial') ? ' has-error' : '' }} {{ $errors->has('especifica_industrial') ? ' has-error' : '' }}">
              <label for="actividad_industrial" class="col-md-7 col-md-offset-1 control-label">II.1 Por actividad industrial y/o comercial (Deduce impuestos).</label>
              <div class="col-md-4">
                <input id="actividad_industrial"  type="number" class="form-control" name="actividad_industrial" value="@if(old('actividad_industrial')){{ old('actividad_industrial') }}@else{{ $datos->actividad_industrial }}@endif" tabindex="{{ ++$tabindex }}" maxlength="35" placeholder="CANTIDAD EN NÚMEROS" required>
                @if ($errors->has('actividad_industrial'))
                <span class="help-block">
                  <strong>{{ $errors->first('actividad_industrial') }}</strong>
                </span>
                @endif
                <code>Sin decimales</code>
              </div>
              <div class="col-md-7 col-md-offset-1">
                <input id="especifica_industrial" type="text" class="form-control" name="especifica_industrial" value="@if(old('especifica_industrial')){{ old('especifica_industrial') }}@else{{ $datos->especifica_industrial }}@endif" tabindex="{{ ++$tabindex }}" required>
                @if ($errors->has('especifica_industrial'))
                <span class="help-block">
                  <strong>{{ $errors->first('especifica_industrial') }}</strong>
                </span>
                @endif
                <code>Especifica nombre o razón social y tipo de negocio.</code>
              </div>
            </div>

            <p>&nbsp;</p>

            <div class="form-group{{ $errors->has('actividad_financiera') ? ' has-error' : '' }}">
              <label for="actividad_financiera" class="col-md-7 col-md-offset-1 control-label">II.2 Por actividad financiera (Rendimiento de contratos bancarios o de valores) (Deduce impuestos).</label>
              <div class="col-md-4">
                <input id="actividad_financiera" type="number" class="form-control" name="actividad_financiera" tabindex="{{ ++$tabindex }}" value="@if(old('actividad_financiera')){{ old('actividad_financiera') }}@else{{ $datos->actividad_financiera }}@endif" maxlength="35" placeholder="CANTIDAD EN NÚMEROS"  required>
                @if ($errors->has('actividad_financiera'))
                <span class="help-block">
                  <strong>{{ $errors->first('actividad_financiera') }}</strong>
                </span>
                @endif
                <code>Sin decimales</code>
              </div>
              <div class="col-md-7 col-md-offset-1">
                <input id="especifica_financiera" type="text" class="form-control" name="especifica_financiera" value="@if(old('especifica_financiera')){{ old('especifica_financiera') }}@else{{ $datos->especifica_financiera }}@endif" tabindex="{{ ++$tabindex }}" required>
                @if ($errors->has('especifica_industrial'))
                <span class="help-block">
                  <strong>{{ $errors->first('especifica_industrial') }}</strong>
                </span>
                @endif
                <code>Especifica tu actividad financiera.</code>
                
              </div>
            </div>

            <p>&nbsp;</p>

            <div class="form-group{{ $errors->has('servicios_profesionales') ? ' has-error' : '' }} {{ $errors->has('especifica_servicios') ? ' has-error' : '' }}">
              <label for="servicios_profesionales" class="col-md-7 col-md-offset-1 control-label">II.3 Por servicios profesionales, participación en consejos, consultorías o asesorías (Deduce impuestos)</label>
              <div class="col-md-4">
                <input id="servicios_profesionales" type="number" class="form-control" name="servicios_profesionales" value="@if(old('servicios_profesionales')){{ old('servicios_profesionales') }}@else{{ $datos->servicios_profesionales }}@endif" tabindex="{{ ++$tabindex }}" maxlength="35" placeholder="CANTIDAD EN NÚMEROS">
                @if($errors->has('servicios_profesionales'))
                <span class="help-block">
                  <strong>{{ $errors->first('servicios_profesionales') }}</strong>
                </span>
                @endif
                <code>Sin decimales</code>
              </div>
              <div class="col-md-7 col-md-offset-1">
                <input id="especifica_servicios" type="text" class="form-control" name="especifica_servicios" value="@if(old('especifica_servicios')){{ old('especifica_servicios') }}@else{{ $datos->especifica_servicios }}@endif" tabindex="{{ ++$tabindex }}" placeholder="ESPECIFICA" required>
                @if ($errors->has('especifica_valor'))
                <span class="help-block">
                  <strong>{{ $errors->first('especifica_valor') }}</strong>
                </span>
                @endif
                <code>Especifica el tipo de servicio y contratante</code>
              </div>
            </div>

            <p>&nbsp;</p>

            <div class="form-group{{ $errors->has('otros') ? ' has-error' : '' }} {{ $errors->has('especifica_otros') ? ' has-error' : '' }}">
              <label for="otros" class="col-md-7 col-md-offset-1 control-label">II.4 Otros (Deduce impuestos)</label>
              <div class="col-md-4">
                <input id="otros" type="number" class="form-control" name="otros" value="@if(old('otros')){{ old('otros') }}@else{{ $datos->otros }}@endif" tabindex="{{ ++$tabindex }}" maxlength="35" placeholder="CANTIDAD EN NÚMEROS" required>
                @if ($errors->has('otros'))
                <span class="help-block">
                  <strong>{{ $errors->first('otros') }}</strong>
                </span>
                @endif
                <code>Sin decimales</code>
              </div>
              <div class="col-md-7 col-md-offset-1">
                <input id="especifica_otros" type="text" class="form-control" name="especifica_otros" value="@if(old('especifica_otros')){{ old('especifica_otros') }}@else{{ $datos->especifica_otros }}@endif" tabindex="{{ ++$tabindex }}" placeholder="ESPECIFICA" required>
                @if ($errors->has('especifica_otros'))
                <span class="help-block">
                  <strong>{{ $errors->first('especifica_otros') }}</strong>
                </span>
                @endif
                <code>(Arrendamientos, regalías, sorteos, concursos, donaciones, etc.)</code>
              </div>
            </div>

            <p>&nbsp;</p>
            <p>&nbsp;</p>

            <div class="form-group{{ $errors->has('ingreso_anual_neto') ? ' has-error' : '' }}">
              <label for="ingreso_anual_neto" class="col-md-8 control-label">
                A. Ingreso 
                @if($declaracion->tipo == "Modificación")
                <code>anual</code>
                @endif
                neto del declarante  <code>*</code></label>
              <div class="col-md-4">
                <input id="ingreso_anual_neto" type="text" class="form-control" name="ingreso_anual_neto" tabindex="{{ ++$tabindex }}" maxlength="35" required autofocus placeholder="(suma del I y II)" readonly>
                @if ($errors->has('ingreso_anual_neto'))
                <span class="help-block">
                  <strong>{{ $errors->first('ingreso_anual_neto') }}</strong>
                </span>
                @endif
                <code>No llenar</code>
              </div>
            </div>


            <div class="form-group{{ $errors->has('ingreso_anual') ? ' has-error' : '' }} {{ $errors->has('especifica_anual') ? ' has-error' : '' }}">
              <label for="ingreso_anual" class="col-md-8 control-label">
                B. Ingreso 
                @if($declaracion->tipo == "Modificación")
                <code>anual</code>
                @endif
                neto del cónyuge, concubina o concubinario y/o dependientes económicos (Deduce impuestos). </label>
              <div class="col-md-4">
                <input id="ingreso_anual" type="number" class="form-control" name="ingreso_anual" value="@if(old('ingreso_anual')){{ old('ingreso_anual') }}@else{{ $datos->ingreso_anual }}@endif" tabindex="{{ ++$tabindex }}" maxlength="35" placeholder="CANTIDAD EN NÚMEROS" >
                @if ($errors->has('ingreso_anual'))
                <span class="help-block">
                  <strong>{{ $errors->first('ingreso_anual') }}</strong>
                </span>
                @endif
                <code>Sin decimales</code>
              </div>
              <div class="col-md-7 col-md-offset-1">
                <input id="especifica_anual" type="text" class="form-control" name="especifica_anual" value="@if(old('especifica_anual')){{ old('especifica_anual') }}@else{{ $datos->especifica_anual }}@endif" tabindex="{{ ++$tabindex }}" placeholder="ESPECIFICA" required>
                @if ($errors->has('especifica_anual'))
                <span class="help-block">
                  <strong>{{ $errors->first('especifica_anual') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('total_ingresos') ? ' has-error' : '' }}">
              <label for="total_ingresos" class="col-md-8 control-label">
                C. Total de ingresos 
                @if($declaracion->tipo == "Modificación")
                <code>anuales</code>
                @endif
                netos del declarante, cónyuge, concubina o concubinario y/o dependientes económicos. <code>*</code></label>
              <div class="col-md-4">
                <input id="total_ingresos" type="text" class="form-control" name="total_ingresos" tabindex="{{ ++$tabindex }}" value="@if(old('total_ingresos')){{ old('total_ingresos') }}@else{{ $datos->total_ingresos }}@endif" maxlength="35" placeholder="suma de A y B" readonly>
                @if ($errors->has('total_ingresos'))
                <span class="help-block">
                  <strong>{{ $errors->first('total_ingresos') }}</strong>
                </span>
                @endif
                <code>No llenar</code>
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
