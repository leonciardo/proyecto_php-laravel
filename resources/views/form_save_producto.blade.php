@extends('layouts.app')

@section('content')

<br>
    <div class="container">
  <form method="POST" action="{{ route('guardar.producto') }}">
      @method('POST')
      @csrf

      <div class="form-group">
          <label for="producto">Nuevo Producto</label>
          <input type="text" class="form-control" id="producto" name="producto" placeholder="Ingrese producto" required>
      </div>
      @error('producto')
      <div class="alert alert-danger" role="alert">
         Por favor verifique que el campo este completo 1!
       </div>
       @enderror

      <div class="form-group">
          <label for="cantidad">cantidad</label>
          <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Ingrese cantidad" required>
      </div>

      @error('cantidad')
      <div class="alert alert-danger" role="alert">
         Por favor verifique que el campo este completo 2!
       </div>
       @enderror

      <div class="form-group">
          <label for="precio">Cantidad</label>
          <input type="text" class="form-control" id="precio" name="precio" placeholder="Ingrese precio" required>
      </div>
      <br>
      <br>
      <button type="submit" class="btn btn-primary">Guardar</button>
      <br>
      <br>
  </form>
</div>
@endsection
