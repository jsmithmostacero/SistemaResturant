@extends('adminlte::page')

@section('title','Usuario')


@section('content')

<div class="row">
  <div class="col-md-6 mx-auto">
              <div class="card" style="margin-top: 30px">
                  <div class="card-header bg-primary text-white" style="font-size: 40px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif" align="center"> 
                      Editar Usuario
                  </div>
            <div class="card-body">
              <label for="" class="col-form-label" style="font-size: 20px">Nombre del usuario:</label>
              <input type="text"  class="form-control text-lg" name="" id="" value={{$user->name}} disabled>

              <label for="" class="col-form-label" style="font-size: 20px; margin-top: 13px">Otros usuarios:</label>


            {!! Form::model($user, ['route'=> ['users.update', $user], 'method' => 'put']) !!}
             @foreach ($roles as $role)
            <div style="margin-top: 10px">
              <label style="font-size: 18px" class="form-label">
                  {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                  {{$role->name}}
              </label>
            </div>
        @endforeach

         {!! Form::submit('Actualizar usuario', ['class' => 'btn btn-success mt-2']) !!}

    {!! Form::close() !!}      

  </div>
</div>
</div>
</div> 

@endsection
