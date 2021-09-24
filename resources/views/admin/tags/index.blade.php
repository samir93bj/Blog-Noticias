@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Listado de etiquetas</h1>
    <p>Bienvenido al panel del administrador</p>
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
        
     {{-- Card con formulario incluido para la edicion de la categoria--}}
        <div class="card">

            @can('admin.tags.create')
                <div class="card-header">
                    <a class="btn btn-primary" href="{{route('admin.tags.create')}}">Agregar Etiqueta</a>
                </div>
            @endcan


            <div class="card-body table-responsive">
                <table class="table">
                    <head class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>COLOR</th>
                            <th>DESCRIPCION</th>
                            <th colspan="2"></th>
                        </tr>
                    </head>
                    <body>
                        @foreach ($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
                            <td style="color:{{$tag->color}}" class="text-uppercase">Color {{$tag->color}}</td>
                            <td style="color: {{$tag->color}}" class="items-center"><i class="fas fa-palette"></i></td>
                            @can('admin.tags.edit')
                                <td width="10px"><a class="btn btn-primary btn-sm" href="{{route('admin.tags.edit',$tag)}}">Editar</a></td>
                            @endcan
                           
                            <td width="10px">
                                @can('admin.tags.destroy')
                                    <form class="form-delete" action="{{route('admin.tags.destroy', $tag)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                            
                        @endforeach
                    </body>
                </table>
            </div>
        </div>

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
                    'El Tag fue eliminado con exito!.',
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