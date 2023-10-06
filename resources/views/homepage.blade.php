<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css"
    rel="stylesheet"
    />
    <link
    rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
    href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap"
    rel="stylesheet"
    />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="css/home.css" />
    <title>FastCarry</title>
  </head>
  <body>
    @csrf
    <header>
      <a href="#" class="logo"
      ><img src="../assets/img/logoDeSoftware.png" class="image"><span>FastCarry</span></a
      >
      <ul class="navbar">
        <li><a href="#" class="active">Inicio</a></li>
        <li><a href="#">Acerca de nosotros</a></li>
        <li><a href="#">Contacto</a></li>
        <div class="dropdown">
          <li><a href="#">Envíos</a></li>
          <div class="dropdown-content">
            <li><a href="#">Agregar</a></li>
            <li><a href="#">Rastrear</a></li>
            <li><a href="#">Historial</a></li>
          </div>
        </div>
      </ul>
      
      <div class="main">
        <a href="{{ route('login') }}">Iniciar Sesión</a>
        <a href="#">Registrarse</a>
        <div class="bx bx-menu" id="menu-icon"></div>
      </div>
    </header>
    
    <div class="container">
      <div class="botones">
        <button class="login-button">Iniciar Sesión</button>
        <button class="register-button">Ver lotes</button>
        <button><a href="{{ route('show')}}" class="generate-button">Ver nodos</a></button>
        <button class="track-button">Rastrear un envío</button>
      </div>
    </div>
    <footer class="footer">
      <div class="flex-footer-container">
        <div
        class="left-part"
        >
        <div class="icons">
          <i class="fa-regular fa-envelope"></i>
          <i class="fa-brands fa-instagram"></i>
        </div>
        <div class="contact">
          Quick Carry <br />
          Tel: 7373 <br />
          Dir: Av. Rivera 2462, Buceo, Montevideo <br />
          Email: infoqc@gmail.com <br />
          WhatsApp: +598 99 731 812
        </div>
      </div>
      <div class="right-part">
        <iframe
        src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d85069.02229532313!2d-56.154190445433436!3d-34.8466873836365!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2suy!4v1692114327569!5m2!1ses-419!2suy"
        width="400"
        height="300"
        style="border: 0"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
        <!-- <img class="max-w-8" src="assets/img/montevideo-map.jpeg" alt=""> -->
      </div>
    </div>
  </footer>
  {{-- <script src="script.js"></script> --}}
  <script>
    $(document).ready(function(){
      $(".container").hide().fadeIn(1000)
      $(".login-button").css({ transform: 'scale(0.9,0.9)' })
      .animate({opacity: .5, transform: 'scale(1,1)'})
      $(".register-button").css({ transform: 'scale(0.9,0.9)' })
      .animate({opacity: .5, transform: 'scale(1,1)'})
      $(".generate-button").css({ transform: 'scale(0.9,0.9)' })
      .animate({opacity: .5, transform: 'scale(1,1)'})
      $(".track-button").css({ transform: 'scale(0.9,0.9)' })
      .animate({opacity: .5, transform: 'scale(1,1)'})
      setTimeout(() => {
        $(".login-button").css('transform','scaleY(1)').animate({opacity: 1})
        $(".register-button").css('transform','scaleY(1)').animate({opacity: 1})
        $(".generate-button").css('transform','scaleY(1)').animate({opacity: 1})
        $(".track-button").css('transform','scaleY(1)').animate({opacity: 1})
      },650);
    })
    </script>
  </body>
  </html>
  