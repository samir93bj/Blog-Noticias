@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Usuario</h1>
@stop

@section('content')

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
            <p class="h5">Nombre: </p>
            <p class="form-control">{{$user->name}}</p>
            <p class="h5">Email: </p>
            <p class="form-control">{{$user->email}}</p>

            <h2 class="h5">Listado de roles</h2>
            {!! Form::model($user, ['route'=>['admin.users.update',$user],'method'=>'PUT']) !!}
                
                @foreach ($roles as $role)
                    <div>
                        <label class="ml-2">
                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                            {{$role->name}}
                        </label>
                    </div>
                @endforeach
                {!! Form::submit('Asignar rol', ['class' => 'mt-2 btn btn-primary']) !!}
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