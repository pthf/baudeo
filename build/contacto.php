<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Baudeo</title>
  <!-- CSS -->
  <link rel="stylesheet" href="./css/main.css">
</head>
<body>

  <!-- Desktop Menu  -->
  <header class="bar">
    <a href="index.html" class="Bar_Menu hvr-float"><img class="Logo_Menu" src="img/LogoMenu.svg"/></a>
      <ul class="bar-list">
        <a href="filosofia.html" ><li class="bar-list-item">FILOSOFÍA</li></a>
        <a href="servicios.html" ><li class="bar-list-item">SERVICIOS</li></a>
        <a href="portafolio.html" ><li class="bar-list-item">PORTAFOLIO</li></a>
        <a href="contacto.html"><li class="bar-list-item selected-item">CONTACTO</li></a>
      </ul>
  </header>

  <span class="nav-icon">&#9776;</span>
    <ul class="mobile-nav animated">
      <a href="index.html"><li>INICIO</li></a>
      <a href="filosofia.html"><li class="">FILOSOFÍA</li></a>
      <a href="servicios.html"><li class="">SERVICIOS</li></a>
      <a href="portafolio.html"><li class="">PORTAFOLIO</li></a>
      <a href="contacto.html"><li class="selected">CONTACTO</li></a>
    </ul>

  <!-- Logo  -->
  <section class="top">

    <div class="Logo_Slider animated fadeIn">
        <img src="img/contacto.svg"/>
    </div>

    <div id="slideshow">
       <div>
          <img src="img/Slider5.png"/>
       </div>

    </div>

  </section>

  <!-- Formulario de contacto -->
  <section class="content_contact">
    <form class="form animated" method="post" id="formContact">
      <input type="text" name="firstname" placeholder="Nombre:" required="">
      <br>
      <input type="text" name="email" placeholder="Email:" required="">
      <br>
      <input type="tel" name="phone" pattern="[0-9]*" inputmode="numeric" placeholder="Teléfono:" onkeypress="validate(event)" required="">
	  	<p class="message_form">MENSAJE: <textarea name="name" rows="8" cols="40" placeholder="Mensaje:"></textarea> </p>
      <input type="submit" value="ENVIAR" class="hvr-grow">
      <span id="successMail" style="display: none; color: white; margin-top: 1vw;2">Gracias!, Pronto nos pondremos en contacto. </span>
    </form>

    <div class="info_contact animated">
      <p class="info_text">
      Comercio #161 Col.Centro <br>
      Guadalajara, Jalisco, México <br>
      C.P. 44100 <br><br>

      (33) 3613-2214 <br>
      (33) 3100-7077 <br><br>

      contacto@baudeoarquitectura.com
      </p>
      <a href="" class="hvr-bounce-in"><img class="social_icon" src="img/twitter.svg"/></a>
      <a href="" class="hvr-bounce-in"><img class="social_icon" src="img/instagram.svg"/></a>
      <a href="" class="hvr-bounce-in"><img class="social_icon" src="img/facebook.svg"/></a>
    </div>
  </section>

  <section class="map">
    	<div class="map" id="googleMap" >	</div>
  </section>

  <!-- Footer -->
  <section class="footer">
    <div class="footer-top">
      <div class="footer-top-right">
        <img class="Logo_Footer" src="img/LogoMenu.svg"/>  <br><br>

        <a href=""><img class="social_icon" src="img/twitter.svg"/></a>
        <a href=""><img class="social_icon" src="img/instagram.svg"/></a>
        <a href=""><img class="social_icon" src="img/facebook.svg"/></a>
        <br><br>

        <span>Dirección 1971 int. 6</span> <br>
        <span>Fracc. Andares</span> <br>
        <span>Guadalajara, Jal, México</span> <br>
        <span class="phoneNumber"><a tel="33333 333 333">33333 333 333</a></span> <br>
        <span>arquitecto@contacto.com</span> <br>
      </div>

      <div class="footer-top-left">
          <ul>

            <a href="index.html"><li>HOME</li></a>
            <a href="filosofia.html"><li>FILOSOFÍA</li></a>
            <a href="servicios.html"><li>SERVICIOS</li></a>
            <a href="portafolio.html"><li>PORTAFOLIO</li></a>
            <a href="contacto.html"><li>CONTACTO</li></a>
          </ul>
      </div>

    </div>

    <div class="footer-bottom">
        <span class="footer-text">©1996-2015 Baudeo Arquitectos</span>
    </div>


  </section>

  <!-- JQuery -->
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <!-- Animaciones en el menu de moviles -->
  <script type="text/javascript">

      var icon = document.querySelector('.nav-icon');
      var show = false;

      icon.onclick = function() {

      if (show) {
        $('.mobile-nav').removeClass('slideInDown');
        $('.mobile-nav').addClass('slideOutUp');
      }else{
        $('.mobile-nav').addClass('is-show');
        $('.mobile-nav').addClass('slideInDown');
        $('.mobile-nav').removeClass('slideOutUp');
      }
      show=!show;
    }
  </script>
  <!-- Animaciones -->
  <script type="text/javascript" src="js/animate_cont.js"></script>
  <!-- Google Maps -->
  <script src="http://maps.googleapis.com/maps/api/js"></script>
	<script type="text/javascript" src="/js/google_api.js"></script>
  <!-- Validar solo numeros en el formulario telefono -->
  <script type="text/javascript">
    function validate(evt) {
      var theEvent = evt || window.event;
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode( key );
      var regex = /[0-9]|\./;
      if( !regex.test(key) ) {
        theEvent.returnValue = false;
        if(theEvent.preventDefault) theEvent.preventDefault();
      }
    }
  </script>

  <script type="text/javascript">
  $(document).on( "click", "input[type=submit]", function() {
      $('#formContact').submit(function(e){
        var data = $(this).serialize();
        $.ajax({
          type: 'POST',
          url: 'php/sendEmail.php',
          data: data,
          success : function(result){
            $('#successMail').css('display', 'block');
            setTimeout(function(){
              $('#formContact')[0].reset();
                $('#successMail').css('display', 'none');
            }, 3000);
          },
          error: function(){
            alert('error');
          },
          timeout: 10000
        });
        e.preventDefault();
      });
  });
  </script>

  <script type="text/javascript">
    var touch = ( 'ontouchstart' in document.documentElement || navigator.msMaxTouchPoints > 0 ) ? true : false;
    if( touch ) {
      $('.desc-item,span.button-item').css('opacity','1');
      $('.item-info,.middle,.middle-text,.middle-top-title,.item-port,.logo-mid.bottom-top,.middle img.logo-mid,.servicios,.servicios-top,.filosofia-bottom,.form,.info_contact, .content_contact').css('opacity','1');
      $('.middle-text,.middle-top-title,.item-port,.logo-mid,.bottom-top,.middle img.logo-mid,.servicios,.servicios-top,.filosofia-bottom,.form,.info_contact').removeClass('animated');
      $('#Grid').css('text-align','center');
    }
  </script>

</body>
</html>
