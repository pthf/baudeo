//Efecto de animacion en la pagina contacto.html

$(document).ready(function() {

  $(window).scroll(function(){

  //filosofia.html top
    var position_element = $('section.content_contact').position().top;
    //position_element - 400 es la posicion del elemento seleccionado menos 400px.
    var scrolled_animate = position_element-400;

    //Al pasar sobre la posicion del elemento en -400px, se va iniciar la siguiente secuencia.
    if($(this).scrollTop()>=scrolled_animate){
      $(".content_contact").css({
        "opacity" : "1",
      });

      $(".form").addClass('fadeInLeft');

      $(".info_contact").addClass('fadeInRight');
    }

  });
});
