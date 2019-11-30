@extends('dashboard.master')

@section('content')
    <a class="btn btn-success mt-3 mb-3" href="{{ route('user.create') }}">
        Crear
    </a>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre </th>
                <th>Apellido </th>
                <th>Email </th>
                <th>Rol </th>
                <th>Actualización </th>
                <th>Acciones </th>
            </tr>
        </thead>
        <tbody>
            @foreach( $users as $user )
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->surname }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->rol->key }}</td>
                <td>{{ $user->updated_at->format('d-M-Y') }} </td>
                <td> 
                    <a href="{{ route('user.show',$user->id ) }}" class="btn btn-primary">Ver</a>
                    <a href="{{ route('user.edit',$user->id ) }}" class="btn btn-primary">Actualizar</a>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $user->id }}" type="button">Eliminar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    {{ $users->links() }}

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Seguro que desea borrar el registro seleccionado?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <form id="formDelete" method="POST" action="{{ route('user.destroy', 0) }}" data-action="{{ route('user.destroy', 0) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>                    
                </div>
            </div>
        </div>
    </div>

    <script>
        window.onload = function(){
            $('#deleteModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var id = button.data('id') // Extract info from data-* attributes
                var action = $('#formDelete').attr('data-action').slice(0, -1);
                action = action + id;
                console.log(action);
                $('#formDelete').attr('action', action)
                var modal = $(this)
                modal.find('.modal-title').text('Vas a borrar el Categoria: ' + id)
            })
        }
    </script>
@endsection



