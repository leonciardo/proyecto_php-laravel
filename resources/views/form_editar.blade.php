@extends('layouts.app')

@section('content')

  <body>
       <div class="container">
        <form method="POST" action="{{ route('update.producto', $user->id) }}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="producto">Nuevo producto</label>
                <input type="text" class="form-control" id="producto" name="producto" required value="{{ $user->producto }}">
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="text" class="form-control" id="cantidad" name="cantidad" required value="{{ $user->cantidad }}">
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="text" class="form-control" id="precio" name="precio" required value="{{ $user->precio }}">
            </div>

            <br>
            <button type="submit" class="btn btn-primary">GUARDAR</button>
        </form>
    </div>
  </body>
@endsection
