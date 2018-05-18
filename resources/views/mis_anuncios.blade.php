@extends ("layouts.plantilla")

@section("contenido")

@php

use Illuminate\Support\Facades\Auth;
use App\Anuncio;

$anuncios = Anuncio::all();

@endphp

@if($anuncios->isEmpty())

<div class="alert alert-warning" role="alert" style="margin-top: 30px;margin-left: 30px;margin-right: 30px;">
  <p><img src="{{ asset('imgs/icono-warning.png')}}" width="20px" height="20px"> No tienes ningún anuncio subido. Crea uno y ven de nuevo, ya estará por aquí.<p>
</div>

@else

@if(session()->has('alert'))
    <div class="alert alert-danger">
        {{ session()->get('alert') }}
    </div>
@endif

<div style="margin-top: 30px;margin-left: 30px;margin-right: 30px;">
<table class="table table-striped" style "width: 900px" style="margin-top: 30px;margin-left: 30px;margin-right: 30px;">
	<tr style="border: solid 1px #d6d8d9;background-color: #343a40;">
		<th colspan="3" style="color: white;">TÍTULO DEL ANUNCIO</th>
	</tr>

	@foreach($anuncios as $anuncio)

		@if ($anuncio->creator_id == Auth::user()->getId())
		<tr style="border: solid 1px #d6d8d9;background-color: #343a40;">
			<td bgcolor="white" width="90%" style="vertical-align: middle;">
				{{ $anuncio->titulo }}
			</td>
			<td bgcolor="white">
				<a href='/modificar_anuncio/{{ $anuncio->id_anuncio }}'><button type="button" class="btn btn-info">Editar</button></a>
			</td>
			<td bgcolor="white">
				<form action ="/anuncio_borrado/{{ $anuncio->id_anuncio }}" method="POST">
					
					{{ csrf_field() }} 					
					{{ method_field('DELETE') }}

					<button type="submit" class="btn btn-danger">Borrar</button>
				</form>
			</td>
		</tr>
		@endif
	@endforeach
</table>
</div>

@endif

@endsection