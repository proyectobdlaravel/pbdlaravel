@extends ("layouts.plantilla")

@section("contenido")

@php

use App\User;

$usuarios = User::where('id', '=', Auth::user()->getId())->get();

@endphp

<div class="alert alert-dark" role="alert" style="margin-top: 30px;margin-left: 30px;margin-right: 30px;">
  <h2>Tu información personal</h2>
</div>

<div class="alert alert-dark" role="alert" style="margin-top: 30px;margin-left: 30px;margin-right: 30px;">

<form action="" method="post" data-parsley-validate="">

@foreach($usuarios as $usuario)

<div class="form-group">
    <p><label>ID único</label>
    <input type="text" class="form-control" disabled="disabled" value="{{ $usuario->id }}"></p>
</div>

<div class="form-group">
    <p><label>Correo electrónico </label>
    <input type="text" class="form-control" disabled="disabled" value="{{ $usuario->email }}"></p>
</div>

<label for="titulo">Nombre de usuario </label>
<div class="input-group">
  <div class="input-group-prepend">
    <div class="input-group-text" id="btnGroupAddon">@</div>
  </div>
    <input type="text" class="form-control" disabled="disabled" value="{{ $usuario->name }}" aria-describedby="btnGroupAddon">
</div>

<div class="form-group">
  <br>
    <label>Miembro desde</label>
    <input type="text" class="form-control" disabled="disabled" value="{{ $usuario->created_at }}">
</div>

@endforeach

</form>

</div>

@endsection