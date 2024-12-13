@if ( session('updateClave') )
<div class="alert alert-success" role="alert" style="margin-top: 20px">
  <strong>¡Felicitaciones! </strong>
    {{ session('updateClave') }}
</div>

@endif


@if ( session('email') )
<div class="alert alert-success" role="alert" style="margin-top: 20px">
  <strong>¡Felicitaciones! </strong>
    {{ session('email') }}
</div>
@endif


@if ( session('claveIncorrecta') )
  <div class="alert alert-danger" role="alert" style="margin-top: 20px">
    <strong>¡Lo siento!</strong>  {{ session('claveIncorrecta') }}
  </div>
@endif


@if ( session('clavemenor') )
<div class="alert alert-warning" role="alert" style="margin-top: 20px">
  <strong>¡Lo siento !</strong>
    {{ session('clavemenor') }}
</div>
@endif