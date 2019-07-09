@extends('layouts.menu')



@section('campos')

<div class="form-group{{ $errors->has('ninguno') ? ' has-error' : '' }}">
  <label for="ninguno" class="col-md-4">Ninguna Escolaridad:<code>*</code></label>
  <div class="col-md-8">
    <label>
      <input id="ninguno" type="checkbox" name="ninguno" value="1" tabindex="{{ ++$tabindex }}" @if($datos->ninguno == 1 or old('ninguno') == 1) checked  @endif>
      <code>Palomea en caso de que NO tengas estudios.</code>
    </label>
  </div>
  <div class="col-md-4">
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


<div id="div_tabla">
  <div class="pull-right">
    <a href="{{ url('/declaracion/'.$declaracion->id.'/'.$formato->slug.'/crear') }}" class="btn btn-default btn-sm" tabindex="{{ ++$tabindex }}">
      <span class="glyphicon glyphicon-plus"></span>
      Agregar Estudios
    </a>
  </div>
</div>

@endsection





@section('tabla')
<table id="tabla" class="table table-hover text-center">
  <caption>ESCOLARIDAD (MÍNIMO 1 NIVEL ACADÉMICO)</caption>
  <thead>
    <tr>
      <th scope="col">Nivel</th>
      <th scope="col">Institución</th>
      <th scope="col">Carrera / área</th>
      <th scope="col">Estatus</th>
      <th scope="col">Borrar</th>
    </tr>
  </thead>
  <tbody>
    @foreach($datos->filas($declaracion->id) as $fila)
    <tr>
      <td>{{ $fila->nivel_educativo }}</td>
      <td>{{ $fila->institucion }}</td>
      <td>{{ $fila->conocimiento }}</td>
      <td>
        {{ $fila->estatus }}
        <br>
        {{ $fila->no_periodos }} {{ $fila->periodo }}
      </td>
      <td>
        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_borrar_escolaridad{{ $fila->id }}">
          <i class="fa fa-times"></i>
          Borrar
        </button>

        <div id="modal_borrar_escolaridad{{ $fila->id }}" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" style="background-color:#f5f5f5;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Borrar</h4>
              </div>
              <div class="modal-body">
                <p><strong>¿Realmente deseas borrar esta escolaridad?</strong></p>
              </div>
              <div class="modal-footer" style="background-color:#f5f5f5;">
                <form id="form_borrar{{ $fila->id }}" action="{{ url('/'.$formato->slug.'/'.$fila->id) }}" method="POST">
                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="DELETE">
                </form>
                <button type="submit" class="btn btn-success btn-sm" form="form_borrar{{ $fila->id }}">&nbsp;SÍ&nbsp;</button>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">NO</button>
              </div>
            </div>
          </div>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection





@section('jquery')
<script>
$("#ninguno").ready(mostrar);
$("#ninguno").change(mostrar);

function mostrar()
{
  if($("#ninguno").is(':checked'))
  {
    $('#div_tabla').hide('slow');
    $('#tabla').hide('slow');
  }
  else
  {
    $('#div_tabla').show('slow');
    $('#tabla').show('slow');
  }
}
</script>
@endsection
