@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">{{ __('Panel de Control') }}</h5>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="text-center py-3">
                        <h2 class="display-6">¡Bienvenido, {{ Auth::user()->name }}!</h2>
                        <hr class="my-4">
                        
                        {{-- Contenido dinámico según el Rol --}}
                        @hasrole('Administrador')
                            <div class="alert alert-info border-0 shadow-sm">
                                <i class="bi bi-shield-check"></i> 
                                <strong>Modo Administrador:</strong> Tienes acceso total a la gestión de usuarios y configuración del sistema.
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('users.index') }}" class="btn btn-primary">
                                    Ir a Gestión de Usuarios
                                </a>
                            </div>
                        @else
                            <div class="alert alert-light border shadow-sm">
                                <i class="bi bi-person-check"></i> 
                                <strong>Sesión Iniciada:</strong> Has ingresado correctamente al sistema como usuario estándar.
                            </div>
                        @endhasrole
                    </div>

                    <p class="text-muted text-center mt-3">
                        {{ __('Has iniciado sesión correctamente.') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection