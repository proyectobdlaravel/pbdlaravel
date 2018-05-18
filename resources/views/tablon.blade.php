@extends ("layouts.plantilla")

@section("contenido")

@php

use Illuminate\Support\Facades\Auth;
use App\Anuncio;
use App\User;

$anuncios = Anuncio::all();

@endphp

@if(session()->has('alert'))
    <div class="alert alert-success">
        {{ session()->get('alert') }}
    </div>
@endif

@if($anuncios->isEmpty())

<div class="alert alert-warning" role="alert" style="margin-top: 30px;margin-left: 30px;margin-right: 30px;">
  <p><img src="{{ asset('imgs/icono-warning.png')}}" width="20px" height="20px"> No hay anuncios para mostrar. Crea uno y ven de nuevo, ya estará por aquí.<p>
</div>

@else

<div class="album py-5 bg-dark" style="margin-top: 30px;margin-right: 30px;margin-left: 30px; border: 1px solid transparent; border-radius: 10px;">
  <div class="container">
    <div class="row">

        @foreach($anuncios as $anuncio)

          <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="{{ $anuncio->url_imagen }}" data-holder-rendered="true">
              <div class="card-body">
                <h5 class="card-title">{{ $anuncio->titulo }}</h5>
                <p class="card-text">{{ $anuncio->cuerpo }}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-dark" disabled="disabled">{{ $anuncio->precio }}€</button>&nbsp;

                    @if($anuncio->creator_id != Auth::user()->getId())

                    <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#contactar-emergente-{{ $anuncio->id_anuncio }}">Contactar</button>

                    @else

                    <button type="button" class="btn btn-sm btn-warning"><b>OP</b></button>

                    @endif

                  </div>
                  <small class="text-muted">{{ $anuncio->fecha }}</small>
                </div>
              </div>
            </div>
          </div>

          <!-- CONTACTAR EMERGENTE -->
          <div class="modal fade" id="contactar-emergente-{{ $anuncio->id_anuncio }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="Contacto">Contacto</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  @php

                  $usuario_venta = $anuncio->user;

                  @endphp

                  <p><b>Vendedor:</b> {{ $usuario_venta->name }}</p>
                  <p><b>E-mail del vendedor: </b>{{ $usuario_venta->email }}</p>

                  <hr>

                  <form action="/email_enviado/{{ $anuncio->titulo }}/{{ $usuario_venta->email}}" method="post" data-parsley-validate="">

                  {{ csrf_field() }}

                    <div class="form-group">
                      <label for="nombre_remitente">Tu nombre</label>
                      <input type="text" class="form-control" name="nombre_remitente" placeholder="Manuel" required="">
                    </div>

                    <div class="form-group">
                      <label for="numero_remitente">Tu número de teléfono</label>
                      <input type="number" class="form-control" name="numero_remitente" placeholder="666 777 888" required="">
                    </div>

                    <div class="form-group">
                      <label for="mensaje_remitente">Mensaje</label>
                      <textarea class="form-control" name="mensaje_remitente" rows="5" placeholder="Demuéstrale que estás interesado realmente en el anuncio" required=""></textarea>
                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

        @endforeach

    </div>
  </div>
</div>

@endif

@endsection