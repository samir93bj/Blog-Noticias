<div>
   <div class="card">

        {{--BUSCADOR--}}
        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Ingrese el nombre o un correo de usuario">
        </div>

        @if($users->count())   
            {{--LISTA USUARIOS--}}
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td width="10px">
                                    <a href="{{route('admin.users.edit',$user)}}" class="btn btn-primary">Editar</a>
                                </td>
                            </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{--PAGINADOR--}}
            <div class="card-footer">
                {{$users->links()}}
            </div>
        @else 
            <div class="card-body">
                <strong>No existen registros</strong>
            </div>
        @endif
 
   </div>
</div>
 