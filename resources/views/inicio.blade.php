@extends ("layouts.plantilla")

@section("contenido")

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{ asset('imgs/carousel_image1.jpg')}}" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <h1 style="color:white; text-shadow: 1px 1px #cecece;">¡Compra!</h1>
        <i><p style="color:white; text-shadow: 1px 1px #cecece;">No lo encontrarás por mejor precio</p></i>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('imgs/carousel_image2.jpg')}}" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <h1 style="color:black; text-shadow: 1px 1px #cecece;">¡Vende!</h1>
        <i><p style="color:black; text-shadow: 1px 1px #cecece">Si fuera tú no me lo pensaría... ¡súbelo!</p></i>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('imgs/carousel_image3.jpg')}}" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
        <h1 style="color:brown; text-shadow: 1px 1px #efc0a0;">¡Intercambia!</h1>
        <i><p style="color:brown; text-shadow: 1px 1px #efc0a0;">Es algo diferente</p></i>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Siguiente</span>
  </a>
</div>

@endsection