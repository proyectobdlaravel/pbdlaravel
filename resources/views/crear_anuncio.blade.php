@extends ("layouts.plantilla")

@section("contenido")

@if(session()->has('alert'))
    <div class="alert alert-success">
        {{ session()->get('alert') }}
    </div>
@endif

<div class="alert alert-dark" role="alert" style="margin-top: 30px;margin-left: 30px;margin-right: 30px;">

<form action="/anuncio_creado" method="post" data-parsley-validate="">

{{ csrf_field() }}

  <div class="form-group">
    <label for="titulo">Título del anuncio</label>
    <input type="text" class="form-control" name="titulo" placeholder="Silla azul" required="">
  </div>
  <div class="form-group">
    <label for="cuerpo">¿Qué vendes?</label>
    <textarea class="form-control" name="cuerpo" rows="4" placeholder="Describe un poco el artículo que vas a vender..." required=""></textarea>
  </div>
  <div class="form-group">
    <label for="cuerpo">Precio</label>
    <input type="number" class="form-control" name="precio" placeholder="69" required="">
  </div>
  <div class="form-group">
    <label for="titulo">URL de la imagen</label>
    <input type="url" class="form-control" name="url_imagen" placeholder="http://www.url_imagen.es/imagen.png" required="">
  </div>
  <button type="submit" class="btn btn-primary float-right">Crear anuncio</button>
</form>

</div>

@endsection