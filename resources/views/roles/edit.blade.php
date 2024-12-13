@extends('adminlte::page')

@section('title','Roles')


@section('content')

<div align="center">
</div>

{{-- <div>
  <div class="card-body">
    <div class="form-group row">
      

      <div id="mensaje" style="margin-bottom: 20px">
        @if(Session::has('datos'))
            <div class="alert alert-success shadow-lg">
                {{ Session::get('datos') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif 
      </div>

          <div class="card-body" >
              {!! Form::model($role, ['route'=> ['roles.update', $role], 'method' => 'put']) !!}
              @include('roles.partials.form')
   
             {!! Form::submit('Actualizar rol', ['class' => 'btn btn-success']) !!}
             {!! Form::close() !!}       
          </div>
    </div>

@endsection --}}

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Prepend and Append Inputs</title>
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> --}}
</head>
<body>

<div  class="row">
    <div class="col-md-6 mx-auto">
        <div class="card" style="margin-top: 30px">
            <div class="card-header bg-primary text-white" style="font-size: 40px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif" align="center"> 
                Editar Roles
            </div>
            <div class="card-body">
              {!! Form::model($role, ['route'=> ['roles.update', $role], 'method' => 'put']) !!}
              @include('roles.partials.form')
   
             {!! Form::submit('Actualizar rol', ['class' => 'btn btn-success']) !!}
             {!! Form::close() !!}  
          </div>
        </div>
    </div>
  </div>

</body>
</html>
@endsection