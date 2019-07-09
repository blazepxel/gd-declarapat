@extends('layouts.app')

@section('content')

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Mis Declaraciones:</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-duplicate"></i> Ley de Archivo <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"><i class="glyphicon glyphicon-cloud-upload"></i> Importar Respaldo</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#"><i class="glyphicon glyphicon-cloud-download"></i> Descargar Respaldo</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-ok"></i> Transparencia <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"><i class="glyphicon glyphicon-refresh"></i> Sincronizar con PNT</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#"><i class="glyphicon glyphicon-download-alt"></i> Descargar Excel</a></li>
          </ul>
        </li>
      </ul>

      <form class="navbar-form navbar-right">
      Para buscar: CTRL + F
      </form>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ url('/declarante/'.Auth::user()->id.'/edit') }}"><i class="glyphicon glyphicon-user"></i> Mis Datos</a></li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="panel panel-default">
  <div class="panel-heading">
    <div class="pull-right">
      <a href="{{ url('declarante/create') }}" class="btn btn-success">
        <i class="fa fa-plus"></i>
          Agregar Declarante
      </a>
    </div>

    <h4><strong>Lista de Declarantes</strong></h4>
  </div>

  <div class="panel-body">
    <table class="table table-hover text-center">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">RFC</th>
          <th scope="col">NOMBRE</th>
          <th scope="col">ÚLTIMA DECLARACIÓN</th>
          <th scope="col">ESTATUS</th>
          <th scope="col">OPCIONES</th>
        </tr>
      </thead>
      <tbody>
        @foreach($declarantes as $declarante)
        <tr>
          <th scope="row">{{ $no++ }}</th>
          <td><strong>{{ $declarante->rfc }}-{{ $declarante->homoclave }}</strong></td>

          <td>{{ $declarante->apellido_paterno }} {{ $declarante->apellido_materno }} {{ $declarante->nombre }}</td>

          <td class="text-danger">
            @if(isset($declarante->ultima_declaracion))
            <strong>{{ $declarante->ultima_declaracion->tipo }}<br>@dMy($declarante->ultima_declaracion->updated_at)</strong>
            @endif
          </td>

          <td>
            @if(isset($declarante->ultima_declaracion))
            {!! $declarante->ultima_declaracion->estatus['view'] !!}
            @endif
          </td>

          <td>
            <a href="{{ url('/declarante/'.$declarante->rfc) }}" class="btn btn-success btn-sm">
              <i class="fa fa-eye"></i>
              Declaraciones
            </a>

            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_reset_{{ $declarante->id }}">
              <i class="fa fa-unlock"></i>
              Contraseña
            </button>

            <div id="modal_reset_{{ $declarante->id }}" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header" style="background-color:#f5f5f5;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Reiniciar contraseña</h4>
                  </div>
                  <div class="modal-body">
                    <p><strong>¿Realmente deseas reiniciar la contraseña de <code>{{ $declarante->rfc }}</code>?</strong></p>
                  </div>
                  <div class="modal-footer" style="background-color:#f5f5f5;">
                    <form id="form_{{ $declarante->id }}" action="{{ url('declarante/'.$declarante->rfc) }}" method="POST">
                      {{ csrf_field() }}
                      <input type="hidden" value="{{ $declarante->rfc }}">
                      <input type="hidden" name="_method" value="PATCH">
                    </form>
                    <button type="submit" class="btn btn-success btn-sm" form="form_{{ $declarante->id }}">&nbsp;SÍ&nbsp;</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">NO</button>
                  </div>
                </div>
              </div>
            </div>

            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_borrar_{{ $declarante->id }}">
              <i class="fa fa-times"></i>
              Borrar
            </button>

            <div id="modal_borrar_{{ $declarante->id }}" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header" style="background-color:#f5f5f5;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Borrar RFC</h4>
                  </div>
                  <div class="modal-body">
                    <p><strong>¿Realmente deseas borrar este RFC?</strong></p>
                    <p>Para evitar perdida de información solo se borrará el rfc <code>{{ $declarante->rfc }}</code> pero <code>NO</code> las declaraciones realizadas por este RFC</p>
                  </div>
                  <div class="modal-footer" style="background-color:#f5f5f5;">
                    <form id="form{{ $declarante->id }}" action="{{ url('declarante/'.$declarante->rfc) }}" method="POST">
                      {{ csrf_field() }}
                      <input type="hidden" value="{{ $declarante->rfc }}">
                      <input type="hidden" name="_method" value="DELETE">
                    </form>
                    <button type="submit" class="btn btn-success btn-sm" form="form{{ $declarante->id }}">&nbsp;SÍ&nbsp;</button>
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
  </div><!--panel-body-->
</div>

@endsection
