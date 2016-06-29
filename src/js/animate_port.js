//Efecto de animacion en la pagina portafolio.html

$(document).ready(function() {

  $(window).scroll(function(){
  //portafolio.html menu
    var position_element = $('.menu_portafolio').position().top;
    //Al pasar sobre la posicion del elemento en -550px, se va iniciar la siguiente secuencia.
    var scrolled_animate = position_element-750;

    //Al pasar sobre la posicion del elemento en -400px, se va iniciar la siguiente secuencia.
    if($(this).scrollTop()>=scrolled_animate){
      $(".menu_portafolio").css({
        "opacity" : "1"
      });

      $(".menu_portafolio").addClass('animated');
      $(".menu_portafolio").addClass('fadeInDown');
    }


  //portafolio.html grid
      var position_element = $('.first-row').position().top;
      var scrolled_animate = position_element-550;

      if($(this).scrollTop()>=scrolled_animate){
        $(".Grid").css({
          "opacity" : "1"
        }),
        $(".first-row").css({
          "opacity" : "1"
        });

        $(".first-row-item").addClass('animated');
        $(".first-row-item").addClass('fadeInLeft');
    }

      var position_element = $('.second-row').position().top;
      var scrolled_animate = position_element-550;

      if($(this).scrollTop()>=scrolled_animate){
        $(".second-row").css({
          "opacity" : "1"
        });

        $(".second-row-item").addClass('animated');
        $(".second-row-item").addClass('fadeInRight');
    }

      var position_element = $('.third-row').position().top;
      var scrolled_animate = position_element-550;

      if($(this).scrollTop()>=scrolled_animate){
        $(".third-row").css({
          "opacity" : "1"
        });

        $(".third-row-item").addClass('animated');
        $(".third-row-item").addClass('fadeInLeft');
    }

  //portafolio.html bottom
    var position_element = $('section.filosofia-bottom').position().top;
    var scrolled_animate = position_element-1500;

    if($(this).scrollTop()>=scrolled_animate){

      $(".filosofia-bottom").addClass('animated');
      $(".filosofia-bottom").addClass('fadeInUp');
    }


  });
});
