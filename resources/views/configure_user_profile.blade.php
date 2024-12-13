@extends('adminlte::page')

@section('content')

<div class="card" style="margin-top: 40px">
    <div class="card-header" style="background-color:#0dcaf0" >
      <h1 align="center" style="font-size: 40px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color:white">Mi perfil</h1>
    </div>
  <div class="card-body">
     <div class="row">
      <div class="container">

    <div class="row d-flex align-items-stretch">
<!--- Mensajes -->
@include('msjs')

      <div class="col-md-12" >
        <form action="{{route('changePassword')}}" method="POST" class="needs-validation" novalidate>
            @csrf

            <div class="row mb-3">
                <div class="col-12">
                    <label for="email">Nombre del usuario</label>
                    <input type="text" name="email" value="{{ Auth::user()->name }}" class="form-control" disabled>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <label for="email">Correo electrónico</label>
                    <input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control @error('email') is-invalid @enderror" required disabled>
                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
            </div>
            <div class="row mb-3">
              <div class="col-12">
                  <label for="password_actual">Contraseña actual</label>
                  <input type="password" name="password_actual"  class="form-control @error('password_actual') is-invalid @enderror" required placeholder="Ingresa tu contraseña actual">
                    @error('password_actual')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <label for="new_password ">Nueva contraseña</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required placeholder="Ingresa una contraseña nueva">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <label for="confirm_password">Confirmar nueva contraseña</label>
                    <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror"required placeholder="Ingresa otra vez la contraseña que escogiste">
                    @error('confirm_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row text-center mb-4 mt-5">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" id="formSubmit">Guardar Cambios</button>
                    <a href="{{route ('home')}}" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>


</div>
</div>
</div>

</div>
</div>

@endsection

@section('js')
<script>
    document.addEventListener('keydown', function(event) {
        if (event.key === 'F1') {
            event.preventDefault(); // Previene el manual del navegador
            window.open('/manual_usuario.pdf', '_blank'); // Abre tu manual
        }
    });
</script>

@stop

