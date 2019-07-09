@extends('layouts.menu')




@section('campos')

            <div class="form-group{{ $errors->has('dependencia') ? ' has-error' : '' }}">
              <label for="dependencia" class="col-md-4 control-label">Dependencia o entidad:<code>*</code></label>
              <div class="col-md-6">
                <select id="dependencia" name="dependencia" tabindex="{{ ++$tabindex }}" class="form-control" required autofocus>
                  <option>{{ $config->institucion }}</option>
                  @foreach($catalogos->misdependencias() as $dependencia)
                  <option
                    @if($dependencia->dependencia == old('dependencia'))
                    selected
                    @elseif($dependencia->dependencia == $datos->dependencia and old('dependencia') == null)
                    selected
                    @endif
                  >{{ $dependencia->dependencia }}</option>
                  @endforeach
                </select>
                @if($errors->has('dependencia'))
                <span class="help-block">
                  <strong>{{ $errors->first('dependencia') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div id="div_estado" class="form-group{{ $errors->has('nombre_empleo') ? ' has-error' : '' }}">
              <label for="nombre_empleo" class="col-md-4 control-label">Nombre del empleo, cargo o comisión:<code>*</code></label>
              <div class="col-md-6">
                <input id="nombre_empleo" type="text" class="form-control" name="nombre_empleo" tabindex="{{ ++$tabindex }}" value="@if(old('nombre_empleo')){{ old('nombre_empleo') }}@else{{ $datos->nombre_empleo }}@endif" maxlength="35" required>
                @if($errors->has('nombre_empleo'))
                <span class="help-block">
                  <strong>{{ $errors->first('nombre_empleo') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('honorarios') ? ' has-error' : '' }}">
              <label for="no" class="col-md-4 control-label">¿Estás contratado(a) por honorarios?:<code>*</code></label>
              <br>
              <div class="col-md-6">
                <label>
                  <input type="radio" name="honorarios" value="1" tabindex="{{ ++$tabindex }}" @if($datos->honorarios == 1) checked @endif>
                  SÍ
                </label>
                &nbsp;&nbsp;&nbsp;
                <label>
                  <input id="no" type="radio" name="honorarios" value="0" tabindex="{{ ++$tabindex }}" @if($datos->honorarios == 0) checked @endif>
                  NO
                </label>
              </div>
            </div>


            <div id="div_nivel" class="form-group{{ $errors->has('nivel_cargo') ? ' has-error' : '' }}">
              <label for="nivel_cargo" class="col-md-4 control-label">Nivel del cargo: <code>*</code></label>
              <div class="col-md-6">
                <input id="nivel_cargo" type="text" class="form-control" name="nivel_cargo" tabindex="{{ ++$tabindex }}" value="@if(old('nivel_cargo')){{ old('nivel_cargo') }}@else{{ $datos->nivel_cargo }}@endif" maxlength="30" required>
                @if ($errors->has('nivel_cargo'))
                <span class="help-block">
                  <strong>{{ $errors->first('nivel_cargo') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('area_adscripcion') ? ' has-error' : '' }}">
              <label for="area_adscripcion" class="col-md-4 control-label">Área de adscripción: <code>*</code></label>
              <div class="col-md-6">
                <input id="area_adscripcion" type="text" class="form-control" name="area_adscripcion" tabindex="{{ ++$tabindex }}" value="@if(old('area_adscripcion')){{ old('area_adscripcion') }}@else{{ $datos->area_adscripcion }}@endif" maxlength="30" required>
                @if ($errors->has('area_adscripcion'))
                <span class="help-block">
                  <strong>{{ $errors->first('area_adscripcion') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('fecha') ? ' has-error' : '' }}">
              <label for="fecha" class="col-md-4 control-label">
                @if($declaracion->tipo == "Conclusión")
                Fecha en que concluyó
                @else
                Fecha en que inició
                @endif
                el encargo: <code>*</code></label>
              <div class="col-md-4">
                <input id="fecha" type="date" class="form-control" name="fecha" tabindex="{{ ++$tabindex }}" value="@if(old('fecha')){{ old('fecha') }}@else{{ $datos->fecha }}@endif" >
                @if ($errors->has('fecha'))
                <span class="help-block">
                  <strong>{{ $errors->first('fecha') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group">
              <label class="col-md-4 control-label">Funciones Principales <code>*</code></label>
              <div class="col-md-6">
                <label>
                  <input type="checkbox" name="a" tabindex="{{ ++$tabindex }}" value="1" @if(old('a') == 1) checked @elseif($datos->a == 1) checked @endif>
                  Administración de Bienes
                </label>
                <br>
                <br>
                <label>
                  <input type="checkbox" name="b" tabindex="{{ ++$tabindex }}"  value="1" @if(old('b') == 1) checked @elseif($datos->b == 1) checked @endif>
                  Atención directa al público
                </label>
                <br>
                <br>
                <label>
                  <input type="checkbox" name="c" tabindex="{{ ++$tabindex }}"  value="1" @if(old('c') == 1) checked @elseif($datos->c == 1) checked @endif>
                  Calificación o determinación para la expedición de licencias, permisos o concesiones
                </label>
                <br>
                <br>
                <label>
                  <input type="checkbox" name="d" tabindex="{{ ++$tabindex }}"  value="1" @if(old('d') == 1) checked @elseif($datos->d == 1) checked @endif>
                  Funciones de inspección
                </label>
                <br>
                <br>
                <label>
                  <input type="checkbox" name="e" tabindex="{{ ++$tabindex }}"  value="1" @if(old('e') == 1) checked @elseif($datos->e == 1) checked @endif>
                  Interventorias
                </label>
                <br>
                <br>
                <label>
                  <input type="checkbox" name="f" tabindex="{{ ++$tabindex }}"  value="1" @if(old('f') == 1) checked @elseif($datos->f == 1) checked @endif>
                  Labor de supervisión
                </label>
                <br>
                <br>
                <label>
                  <input type="checkbox" name="g" tabindex="{{ ++$tabindex }}"  value="1" @if(old('g') == 1) checked @elseif($datos->g == 1) checked @endif>
                  Manejo de recursos financieros
                </label>
                <br>
                <br>
                <label>
                  <input type="checkbox" name="h" tabindex="{{ ++$tabindex }}"  value="1" @if(old('h') == 1) checked @elseif($datos->h == 1) checked @endif>
                  Areas técnicas
                </label>
                <br>
                <br>
                <label>
                  <input type="checkbox" name="i" tabindex="{{ ++$tabindex }}"  value="1" @if(old('i') == 1) checked @elseif($datos->i == 1) checked @endif>
                  Auditorias
                </label>
                <br>
                <br>
                <label>
                  <input type="checkbox" name="j" tabindex="{{ ++$tabindex }}"  value="1" @if(old('j') == 1) checked @elseif($datos->j == 1) checked @endif>
                  Cuerpo de Seguridad
                </label>
                <br>
                <br>
                <label>
                  <input type="checkbox" name="k" tabindex="{{ ++$tabindex }}"  value="1" @if(old('k') == 1) checked @elseif($datos->k == 1) checked @endif>
                  Funciones de Vigilancia
                </label>
                <br>
                <br>
                <label>
                  <input type="checkbox" name="l" tabindex="{{ ++$tabindex }}"  value="1" @if(old('l') == 1) checked @elseif($datos->l == 1) checked @endif>
                  Investigación de delitos
                </label>
                <br>
                <br>
                <label>
                  <input type="checkbox" name="m" tabindex="{{ ++$tabindex }}" value="1" @if(old('m') == 1) checked @elseif($datos->m == 1) checked @endif>
                  Licitaciones y adjudicaciones de contratos de bienes y servicios
                </label>
                <br>
                <br>
                <label>
                  <input type="checkbox" name="n" tabindex="{{ ++$tabindex }}"  value="1" @if(old('n') == 1) checked @elseif($datos->n == 1) checked @endif>
                  Manejo de recursos humanos
                </label>
                <br>
                <br>
                <label>
                  <input type="checkbox" name="o" tabindex="{{ ++$tabindex }}"  value="1" @if(old('o') == 1) checked @elseif($datos->o == 1) checked @endif>
                  Otro 
                </label>
                <input type="text" class="form-control" name="otro" tabindex="{{ ++$tabindex }}" value="@if(old('otro')){{ old('otro') }}@else{{ $datos->otro }}@endif" maxlength="35">
              </div>
            </div>


            <!-- aclaraciones -->
            <div class="row">
              <div class="col-md-4  control-label">
                <div class="btn-group control-label">
                  <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#aclaracion">Agregar una aclaración:</button>
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="collapse" data-target="#aclaracion" aria-haspopup="true" aria-expanded="false" tabindex="{{ ++$tabindex }}">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                </div>
              </div>
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
$("input[name='honorarios']").ready(mostrar_nivel);
$("input[name='honorarios']").change(mostrar_nivel);


function mostrar_nivel()
{
  var radioValue = $("input[name='honorarios']:checked").val();

  if(radioValue != 1)
  {
    $('#div_nivel').show('slow');
    $("#nivel_cargo").attr("required", "required");
  }
  else
  {
    $('#div_nivel').hide('slow');
    $('#nivel_cargo').removeAttr("required", "required");
  }
}
</script>
@endsection
