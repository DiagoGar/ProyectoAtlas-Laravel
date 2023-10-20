<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="css/home.css">
  @yield('linkCss')
  <title>@yield('title')</title>
</head>
<body>
  <body>
    <header>
      <a href="#" class="logo"
        ><img src="../assets/img/logoDeSoftware.png" class="image"><span>FastCarry</span></a
      >
      <div class="main">
        <a href="/">Inicio</a>
        <a href="#">log Out</a>
        <div class="bx bx-menu" id="menu-icon"></div>
      </div>
    </header>
    <div class="comtainer flex justify-center">
      @yield('form')
    </div>
</body>
</html>