@extends('layouts.app')

@section('content')
<div class="container">
    {{-- Mensaje de Alerta --}}
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center bg-white">
                    <h5 class="mb-0">Gestión de Usuarios</h5>
                    <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">Nuevo Usuario</a>
                </div>

                <div class="card-body">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Rol</th> {{-- Nueva Columna --}}
                                <th class="text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    {{-- Mostrar los roles del usuario como badges --}}
                                    @foreach($user->getRoleNames() as $rol)
                                        <span class="badge bg-info text-dark">{{ $rol }}</span>
                                    @endforeach
                                    
                                    @if($user->getRoleNames()->isEmpty())
                                        <span class="text-muted small">Sin rol</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm">Editar</a>
                                    
                                    <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este usuario?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <div class="d-flex justify-content-end">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection