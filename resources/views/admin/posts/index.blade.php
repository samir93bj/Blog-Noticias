@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a class="btn btn-sm btn-secondary float-right" href="{{route('admin.posts.create')}}">Nuevo Post</a>
    <h1>Listado de Posts</h1>
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

    @livewire('admin.post-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    {{-- Mensaje para mostrar los textos de session--}}
        @if (session('eliminar') == 'ok')
            <script>
                Swal.fire(
                    'Borrado!',
                    'El Rol fue eliminado con exito!.',
                    'success'
                )
            </script> 
        @endif

    <script>
        $('.form-delete').submit(function(e){
            e.preventDefault();

            Swal.fire({
                title: 'Estas seguro?',
                text: "No podrás revertir esto!",
                icon: 'error',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, bórralo!'
            }).then((result) => {
                if (result.isConfirmed) {
                this.submit();
                }
            })

        });
    </script>
@stop 