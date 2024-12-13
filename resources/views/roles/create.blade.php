@extends('adminlte::page')

@section('title','Roles')


@section('content')

<div align="center">
    <h1>Administrar roles</h1>
</div>

<div>
            <div class="card-body" >
              {{-- <div class="form-group row">  --}}
                  {!! Form::open(['route' => 'roles.store']) !!}
               
                  @include('roles.partials.form')
  
                {!! Form::submit('Crear rol', ['class' => 'btn btn-info']) !!}                 
                {!! Form::close() !!}                                       
              {{-- </div> --}}

              
        </div>

</div>

@endsection