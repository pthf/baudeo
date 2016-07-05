//Efecto de animacion en la pagina servicios.html

$(document).ready(function() {

  $(window).scroll(function(){


  //servicios.html top
    var position_element = $('section.servicios').position().top;
    //position_element - 400 es la posicion del elemento seleccionado menos 400px.
    var scrolled_animate = position_element-450;

    //Al pasar sobre la posicion del elemento en -450px, se va iniciar la siguiente secuencia.
    if($(this).scrollTop()>=scrolled_animate){
      $(".servicios").css({
        "opacity" : "1"
      });

      $(".servicios-top").addClass('fadeInUp');
    }

  //servicios.html grid
    var position_element = $('#Grid').position().top;
    var scrolled_animate = position_element-750;

    if($(this).scrollTop()>=scrolled_animate){
      $("a.test-opacity").css({
        "opacity" : "1"
      }),
      $("#Grid").css({
        "opacity" : "1"
      });

      $(".first-item").addClass('fadeInLeft');

      $(".second-item").addClass('fadeInUp');

      $(".third-item").addClass('fadeInRight');
     }


  //servicios.html bottom
    var position_element = $('section.filosofia-bottom').position().top;
    var scrolled_animate = position_element-800;

    if($(this).scrollTop()>=scrolled_animate){

      $(".filosofia-bottom").addClass('fadeInUp');
    }


  });
});
