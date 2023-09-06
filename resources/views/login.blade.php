@extends('layouts.main')

@section('linkCss')
<link rel="stylesheet" href="css/login.css"/>
@endsection

@section('form')
<div class="form">
  <div class="form-content">
    <div class="form-header">
      <img src="../assets/img/logoDeSoftware.png">
      <h1 id="title">Registro</h1>
    </div>
    <form>
      <div class="input-group">
        <div class="input-field" id="name-Input">
          <i class="fa-solid fa-user"></i>
          <input type="text" placeholder="Nombre" />
        </div>

        <div class="input-field">
          <i class="fa-solid fa-envelope"></i>
          <input type="email" placeholder="Correo" />
        </div>

        <div class="input-field">
          <i class="fa-solid fa-lock"></i>
          <input type="password" placeholder="Contraseña" />
        </div>
        <p>Olvidaste tu contraseña <a href="#">Click aqui</a></p>
      </div>
      <div class="btn-field">
        <button id="signUp" type="button">Registrarse</button>
        <button id="signIn" type="button" class="disable">
          Iniciar Sesión
        </button>
      </div>
    </form>
  </div>
</div>
@endsection