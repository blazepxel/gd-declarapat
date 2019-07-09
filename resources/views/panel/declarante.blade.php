@extends('layouts.app')




@section('content')

      <div class="alert alert-info">
      <ul>
        <li>
          <strong>
            <span class="text-danger">INICIAL:</span><br>
            Se presenta dentro de los 40 días hábiles siguientes a la toma de posesión con motivo del:<br>
            - Ingreso al servicio público por primera vez<br>
            - Reingreso al servicio público después de 40 días naturales de la conclusión de su último encargo.
          </strong>
        </li>
        <li>
          <strong>
            <span class="text-danger">MODIFICACIÓN:</span><br>
            - Se presenta durante el mes de mayo de cada año.
          </strong>
        </li>
        <li>
          <strong>
            <span class="text-danger">CONCLUSIÓN:</span><br>
            Dentro de los 40 días hábiles siguientes a la conclusión del encargo.
          </strong>
        </li>
      </ul>
      <p>
      <br>
      En el caso de cambio de dependencia o entidad en el mismo orden de gobierno, únicamente se dará aviso de dicha situación y no será necesario presentar la declaración de conclusión.
      </p>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">
          @if(Auth::user()->esadmin == 0)
            <div class="pull-right">
              <a href="{{ url('/declarante/'.Auth::user()->id.'/edit') }}"><i class="glyphicon glyphicon-user"></i> Cambiar Contraseña</a>
            </div>
          @endif
            <strong>Declaraciones Patrimoniales</strong>
          </h3>
        </div>
        <div class="panel-body">

            <table class="table table-hover text-center">
              <thead>
                <tr>
                  <th scope="col">TIPO DECLARACIÓN</th>
                  <th scope="col">FECHA INICIO</th>
                  <th scope="col">FECHA LÍMITE</th>
                  <th scope="col">AVANCE</th>
                  <th scope="col">VER</th>
                </tr>
              </thead>
              <tbody>
                @if($activas == 0)
                  @if(Auth::user()->esadmin == 1)
                  <tr>
                    <td colspan="5"><strong class="text-danger">Sin Declaraciones</strong></td>
                  </tr>
                  @else
                  <tr>
                    <td>
                    <form id="create_Declaracion" action="{{ url('/declaracion') }}" method="post">
                      {{ csrf_field() }}

                      <select tabindex="{{ ++$tabindex }}" class="form-control" name="tipo">
                        <option disabled selected>-Selecciona una opción-</option>
                        <option>Inicial</option>
                        <option>Modificación</option>
                        <option>Conclusión</option>
                      </select>
                      </form>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                      <button type="submit" class="btn btn-danger btn-sm" form="create_Declaracion">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        Crear Declaración
                      </button>
                    </td>
                  </tr>
                  @endif
                @endif
                @foreach($declaraciones as $declaracion)
                <tr>
                  <td><strong class="text-danger">{{ $declaracion->tipo }}</strong></td>
                  <td><strong>@dMy($declaracion->created_at)</strong></td>
                  <td><strong>{{ $declaracion->limite }}</strong></td>
                  <td>{!! $declaracion->estatus['view'] !!}</td>
                  <td>
                    @if($declaracion->fecha_sello == 1)
                      <a class="btn btn-primary btn-sm" href="{{ url('imprimir/'.$declaracion->id.'/declaracion') }}" target="_blank">
                          <i class="fa fa-print" aria-hidden="true"></i>
                          Declaración
                        </a>

                        <a class="btn btn-primary btn-sm" href="{{ url('imprimir/'.$declaracion->id.'/acuse') }}" target="_blank">
                          <i class="fa fa-print" aria-hidden="true"></i>
                          Acuse
                        </a>
                      @else
                        <a href="{{ url('declaracion/'.$declaracion->id.'/edit') }}" class="btn btn-danger btn-sm">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                          Completar Declaración
                        </a>


                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_borrar_{{ $declaracion->id }}">
                          <i class="fa fa-times"></i>
                          Borrar
                        </button>


                        <div id="modal_borrar_{{ $declaracion->id }}" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header" style="background-color:#f5f5f5;">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Borrar DECLARACION</h4>
                              </div>
                              <div class="modal-body">
                                <p><strong>¿Realmente deseas borrar el avance de esta declaración?</strong></p>
                              </div>
                              <div class="modal-footer" style="background-color:#f5f5f5;">
                                <form id="form{{ $declaracion->id }}" action="{{ url('declaracion/'.$declaracion->id.'/borrar') }}" method="POST">
                                  {{ csrf_field() }}
                                  <input type="hidden" value="{{ $declaracion->id }}">
                                  <input type="hidden" name="_method" value="DELETE">
                                </form>
                                <button type="submit" class="btn btn-success btn-sm" form="form{{ $declaracion->id }}">&nbsp;SÍ&nbsp;</button>
                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">NO</button>
                              </div>
                            </div>
                          </div>
                        </div>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>

        </div><!--panel-body-->
        <div class="panel-footer">
          <a href="{{ url('/') }}" class="btn btn-light text-danger">
            <i class="fa fa-arrow-left"></i>
            Regresar
          </a>
        </div>
      </div><!--panel-->
    </div><!--md-10-->

@endsection
