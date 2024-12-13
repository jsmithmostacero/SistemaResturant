{{-- @extends('adminlte::auth.login') --}}



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href={{ asset("/bootstrap.min.css") }} rel="stylesheet">
    <link href={{ asset("/font-awesome.min.css") }} rel="stylesheet">
    <link href={{ asset("/style.css") }} rel="stylesheet">
	<link href={{ asset("/logincito.css") }} rel="stylesheet">

    <title>INICIO DE SESIÓN</title>
  </head>
  <body style="background-image: url(/bg-001.jpg); background-repeat:no-repeat;background-size:cover">
    <section class="form-08">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="_form-08-main">
              <div class="_form-08-head">
                <h2>¡Bienvenido al restaurante!</h2>
              </div>
			  <form method="POST" action="{{ route('login') }}">
				@csrf
              <div class="form-group">
               <label>Correo electrónico</label>
                <input type="email" name="email" class="form-control" type="text" placeholder="Ingresa el correo electrónico" required="" aria-required="true" :value="old('email')"> 
                
              </div>

              <div class="form-group">
                <label>Contraseña</label>
                <input type="password" name="password" class="form-control" type="text" placeholder="Ingresa la contraseña" required="" aria-required="true">
              </div>

              <div class="form-group">
                <button class="_btn_04" type="submit" class="btn btn-primary btn-block" style="color: white">
					{{ __('Ingresar') }}
				</button>
              </div>
			</form>

              <div class="sub-01">
                <img src="{{ asset("/shap-02.png") }}">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>