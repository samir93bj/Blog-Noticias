@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear un Post</h1>
@stop

@section('content')
    <p>Bienvenido al panel del Administrador</p>
 
    {{--TABLA Y FORMULARIO PARA CREAR --}}
    <div class="card">
        <div class="card-body">

        {!! Form::open(['route'=>'admin.posts.store','autocomplete'=>'off', 'files' => true]) !!}  

            @include('admin.posts.partiers.form')

            {!! Form::submit('Crear Post', ['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div> 
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%
        }

        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}">  </script>

    {{-- SCRIPT PARA EL SLUG DEL POST --}}
    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
            });
        });

    /* SCRIPT PARA LA CABECERA DEL EXTRACTO */
        ClassicEditor
            .create( document.querySelector( '#extract' ) )
            .catch( error => {
                console.error( error );
            } );
    
    /* SCRIPT PARA LA CABECERA DEL EXTRACTO */
        ClassicEditor
        .create( document.querySelector( '#body') )
        .catch( error => {
            console.error( error );
        } );

    /*Codigo JavaScript para las imagenes*/
       
        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result); 
            };

            reader.readAsDataURL(file);
        }
    </script>   
@stop