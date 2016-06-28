//Efecto de animacion en la pagina filosofia.html

$(document).ready(function() {

  $(window).scroll(function(){

  //filosofia.html top
    var position_element = $('section.middle').position().top;
    //position_element - 400 es la posicion del elemento seleccionado menos 400px.
    var scrolled_animate = position_element-400;

    //Al pasar sobre la posicion del elemento en -400px, se va iniciar la siguiente secuencia.
    if($(this).scrollTop()>=scrolled_animate){
      $("section.middle").css({
        "opacity" : "1",
      });

      $(".fil-top").addClass('animated');
      $(".fil-top").addClass('fadeIn');

      $(".first-text").addClass('animated');
      $(".first-text").addClass('fadeInRight');

      $(".first-img").addClass('animated');
      $(".first-img").addClass('fadeInLeft');

    }

  //filosofia.html bottom-mid
  var position_element = $('.bottom-fil').position().top;
  var scrolled_animate = position_element-400;

  if($(this).scrollTop()>=scrolled_animate){
    $(".bottom-fil").css({
      "opacity" : "1",
    });

    $(".second-text").addClass('animated');
    $(".second-text").addClass('fadeInLeft');

    $(".second-img").addClass('animated');
    $(".second-img").addClass('fadeInRight');
  }

  //filosofia.html bottom
    var position_element = $('section.filosofia-bottom').position().top;
    var scrolled_animate = position_element-450;

    if($(this).scrollTop()>=scrolled_animate){

      $(".filosofia-bottom").addClass('animated');
      $(".filosofia-bottom").addClass('fadeInUp');
    }


  });
});
