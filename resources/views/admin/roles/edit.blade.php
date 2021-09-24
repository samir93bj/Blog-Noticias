@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right px-3 mr-3" href="{{route('admin.roles.index')}}">Volver</a>
    <h1>Editar Rol</h1>
@stop

@section('content')
    <p>Bienvenido al panel del Administrador</p>

      {{-- Mensaje para mostrar los textos de session--}}
      @if (session('info'))
      <div class="alert alert-success">
          <strong>
              {{session('info')}}
          </strong>
      </div>
      @endif
  
    <div class="card">
        <div class="card-body">
            
            {!! Form::model($role ,['route'=>['admin.roles.update',$role],'autocomplete'=>'off', 'files' => true , 'method'=> 'put']) !!}  

                @include('admin.roles.partials.form')

            {!! Form::submit('Actualizar Rol', ['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    
@stop