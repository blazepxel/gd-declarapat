@if(count($errors) > 0)
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif


@if(Session::has('success'))
<div class="alert alert-success">{{ Session::get('success') }}</div>
@endif


@if(Session::get('danger'))
<div class="alert alert-danger">{{ Session::get('danger') }}</div>
@endif


@if(Session::get('warning'))
<div class="alert alert-warning">{{ Session::get('warning') }}</div>
@endif


@if(Session::get('info'))
<div class="alert alert-info">{{ Session::get('info') }}</div>
@endif
