@extends ("layouts.plantilla")

@section("contenido")

@php

use App\Anuncio;

$anuncios = Anuncio::where('id_anuncio', '=', $id_anuncio)->get();

@endphp

@if(session()->has('alert'))
    <div class="alert alert-info">
        {{ session()->get('alert') }}
    </div>
@endif

<div class="alert alert-dark" role="alert" style="margin-top: 30px;margin-left: 30px;margin-right: 30px;">

<form action="/anuncio_modificado/{{ $id_anuncio }}" method="post" data-parsley-validate="">

  @foreach($anuncios as $anuncio)

    {{ csrf_field() }}
    {{ method_field('PUT') }}

      <div class="form-group">
        <label for="titulo">Título del anuncio</label>
        <input type="text" class="form-control" name="titulo" placeholder="{{ $anuncio->titulo }}" required="" value="{{ $anuncio->titulo }}">
      </div>
      <div class="form-group">
        <label for="cuerpo">¿Qué vendes?</label>
        <textarea class="form-control" name="cuerpo" rows="4" placeholder="{{ $anuncio->cuerpo }}" required="">{{ $anuncio->cuerpo }}</textarea>
      </div>
      <div class="form-group">
        <label for="precio">Precio</label>
        <input type="number" class="form-control" name="precio" placeholder="{{ $anuncio->precio }}" required="" value="{{ $anuncio->precio }}">
      </div>
      <div class="form-group">
        <label for="url_imagen">URL de la imagen</label>
        <input type="url" class="form-control" name="url_imagen" placeholder="{{ $anuncio->url_imagen }}" value="{{ $anuncio->url_imagen }}" required="">
      </div>

  @endforeach

    <button type="submit" class="btn btn-primary float-right">Modificar anuncio</button>
</form>

</div>

@endsection