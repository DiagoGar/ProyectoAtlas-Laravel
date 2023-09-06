<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @yield('linkCss')
  <title>Document</title>
</head>
<body>
  <body>
    <header>
      <a href="#" class="logo"
        ><img src="../assets/img/logoDeSoftware.png" class="image"><span>FastCarry</span></a
      >
      <div class="main">
        <a href="{{ route('login') }}">Iniciar Sesión</a>
        <a href="#">Registrarse</a>
        <div class="bx bx-menu" id="menu-icon"></div>
      </div>
    </header>
    <div class="comtainer">
      @yield('form')
    </div>
</body>
</html>