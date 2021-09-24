@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Listado de categorias</h1>
@stop

@section('content')
    <p>bienvenido al panel del administrador</p>

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
        <div class="card-header">
            @can('admin.categories.create')
                <a class="btn btn-primary" href="{{route('admin.categories.create')}}">Agregar Categoria</a>
            @endcan
            
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr> 
                </thead>
                <tbody>
                   @foreach ($categories as $category)
                       <tr>
                           <td>{{$category->id}}</td>
                           <td>{{$category->name}}</td>
                           
                           @can('admin.categories.edit')
                            <td width="10px"><a class="btn btn-primary btn-sm" href="{{route('admin.categories.edit',$category)}}">Editar</a></td>
                           @endcan

                           @can('admin.categories.destroy')
                            <td width="10px">
                                    <form class="form-delete" action="{{route('admin.categories.destroy', $category)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                           @endcan
                           
                       </tr>
                   @endforeach 
                </tbody>
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