@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Inicio</h1>
@stop

@section('content')
    <p>Bienvenido al panel del administrador</p>

    {{-- Mensaje para mostrar los textos de session--}}
        @if (session('info'))
            <div class="alert alert-success">
                <strong>
                    {{session('info')}}
                </strong>
            </div>
        @endif

     {{-- Card con  formulario incluido para la edicion de la Tags--}}
     <div class="card">
        <div class="card-body">
            {!! Form::model($tag, ['route' => ['admin.tags.update', $tag], 'method' => 'put']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null,['class' => 'form-control', 'placeholder'=>'Ingrese el nombre de la Etiqueta']) !!}

                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

 
                <div class="form-group">
                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', null,['class' => 'form-control', 'placeholder'=>'Ingrese el slug de la Etiqueta','readonly']) !!}

                    @error('slug')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>    

                <div class="form-group">
                    {!! Form::label('color', 'Color') !!}
                    {!! Form::select('color', $colors, $tag->color , ['class' => '<text-uppercase form-control']) !!}
                </div>

                {!! Form::submit('Actualizar Etiqueta', ['class'=>'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}">  </script>

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
            });
        });
    </script>   
@stop 