@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a class="btn btn-sm btn-secondary float-right" href="{{route('admin.roles.create')}}">Nuevo Rol</a>
    <p>Bienvenido al panel del Administrador</p>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Rol</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td width="10px"><a href="{{route('admin.roles.edit',$role)}}" class="btn btn-sm btn-primary">Editar</a></td>
                            <td width="10px">
                                <form class="form-delete" action="{{route('admin.roles.destroy',$role)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
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