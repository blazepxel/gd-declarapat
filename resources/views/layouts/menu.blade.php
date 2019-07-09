@extends('layouts.app')



@section('content')

    <div class="col-md-4">

      <div class="list-group">
        @foreach($declaracion->formatos as $menu)
        <a href="{{ url('/declaracion/'.$declaracion->id.'/'.$menu->formato->slug) }}" class="list-group-item @if($menu->formato->slug == $formato->slug) list-group-item-danger @endif">
          @if($menu->estatus == 1)
          <span class="badge alert-success">
            <span class="glyphicon glyphicon-ok alert-success" aria-hidden="true"></span>
          </span>
          @else
          <span class="badge alert-danger">
            <span class="glyphicon glyphicon-exclamation-sign alert-danger" aria-hidden="true"></span>
          </span>
          @endif

          <strong>{{ $menu->formato->lista }}.- {{ $menu->formato->formato }}</strong>
        </a>
        @endforeach
      </div>

    </div><!--col-md-3-->


    <div class="col-md-8">

      <div class="alert alert-warning">
        Los formatos completados tienen un 
        <span class="badge alert-success"><span class="glyphicon glyphicon-ok alert-success" aria-hidden="true"></span></span>. 
        Después de llenar los 20 formatos deberás firmar electrónicamente tu declaración patrimonial.
        Si necesitas ayuda/soporte escribe al whatsapp: <strong>722 427 7722. De 9am a 8pm</strong>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h4>
            <span class="glyphicon glyphicon-list-alt"></span>
            <span class="ml">{{ $formato->formato }}</span>
          </h4>
        </div>

        <div class="panel-body">
          <div class="col-md-7">
            <ul>
              <li>Los campos marcados con <code>*</code> son obligatorios.</li>
              @yield('nota')
            </ul>
          </div>
          <div class="col-md-5">
            <code>Llenando NUEVA declaración: {{ $declaracion->tipo }}</code>
            {!! $declaracion->estatus['view'] !!}
          </div>
        </div>

        <div class="panel-body">
          @if(basename(request()->path()) == "crear")
          <form id="form" class="form-horizontal" autocomplete="off" method="POST" action="{{ url('/declaracion/'.$declaracion->id.'/'.$formato->slug.'/crear') }}">
          @else
          <form id="form" class="form-horizontal" autocomplete="off" method="POST" action="{{ url('/declaracion/'.$declaracion->id.'/'.$formato->slug) }}">
          @endif
            <input type="hidden" value="{{ $declaracion->id }}" name="declaracion_id">
            {{ csrf_field() }}


            @yield('campos')

          </form>

          @yield('tabla')

        </div>
        <div class="panel-footer">
          <div class="pull-right">
            <button form="form" tabindex="{{ ++$tabindex }}" type="submit" class="btn btn-danger"><span class="fa fa-check"></span> Guardar</button>
            @if($declaracion->estatus['estatus'] != "success" and $declaracion->estatus['avance'] == 100)
            <a href="{{ url('firmar/'.$declaracion->id.'/condiciones_generales') }}" tabindex="{{ ++$tabindex }}" class="btn btn-warning"><span class="fa fa-check"></span> Firmar</a>
            @endif
          </div>
          <a href="{{ url('/') }}" class="btn btn-light text-danger">
            <i class="fa fa-arrow-left"></i>
            Regresar
          </a>
        </div>
      </div>
    </div>

    <div class="col-md-8">
      @yield('tablas')
    </div>

@endsection
