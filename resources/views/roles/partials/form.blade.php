
<div>
  <div>

    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del rol']) !!}

    @error('name')
        <small class="text-danger">
          {{$message}}
        </small>
    @enderror
  </div>

  <div class="px-4 py-3 mb-8 rounded-lg" style="margin-top:10px; margin-bottom:5px">
    <h3>Lista de permisos:</h3>
  @foreach ($permissions as $permission)
      <div>
        <label>
          {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
          {{$permission->name}}
        </label>
      </div>
  @endforeach       

    {{-- </div> --}}
  


  {{-- </div> --}}
</div>
</div>