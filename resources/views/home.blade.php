@extends('layouts.app')

@section('content')

<div class="text-center mt-10">
        <a href="{{ route('save.producto') }}" class="btn btn-danger btn-lg">AGREGAR</a>
        @method('POST')
        @csrf
</div>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif




                    <div class="container">
                        <table class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Acciones</th> <!-- Columna para los botones -->
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($dashboard_productos as $producto)
                                <tr>
                                    <th scope="row">{{ $producto->id }}</th>
                                    <td>{{ $producto->producto }}</td>
                                    <td>{{ $producto->cantidad }}</td>
                                    <td>{{ $producto->precio }}</td>
                                    <td>

                                        <form method="GET" action="{{ route('edit.producto', $producto->id) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-primary btn-sm">Editar</button>
                                        </form>

                                        @if(Auth::check() && Auth::user()->role_id == 1)
                                        <form id="delete-{{ $producto->id }}" action="{{ route('delete.producto', $producto->id) }}" method="POST" style="display: inline;">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
