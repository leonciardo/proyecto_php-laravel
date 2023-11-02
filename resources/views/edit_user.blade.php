@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Perfil</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') ?? auth()->user()->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for "email">Correo Electrónico</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') ?? auth()->user()->email }}" required>
                        </div>

                        <div class="form-group">
                            <label for="password"> Nueva Contraseña</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">Confirmar Nueva Contraseña</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

