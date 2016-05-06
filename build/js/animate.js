//Efecto de animacion en la pagina index.html

$(document).ready(function() {

  $(window).scroll(function(){

  //index.html top
    var position_element = $('section.middle').position().top;
    var scrolled_animate = position_element-350;

    if($(this).scrollTop()>=scrolled_animate){
      $(".middle,.middle-text").css({
        "opacity" : "1"
      });

      $(".middle-top-title, .home-title").addClass('animated');
      $(".middle-top-title, .home-title").addClass('fadeIn');
      $(".middle-text").addClass('animated');
      $(".middle-text").addClass('fadeInUp');
      $(".logo-index").addClass('animated');
      $(".logo-index").addClass('fadeInRight');
    }

  //index.html grid
    var position_element = $('.bottom-top').position().top;
    var scrolled_animate = position_element-550;

    if($(this).scrollTop()>=scrolled_animate){
      $(".bottom").css({
        "opacity" : "1"
      });

      $(".bottom-top").addClass('animated');
      $(".bottom-top").addClass('fadeIn');
     }
  //index.html grid
    var position_element = $('#Grid').position().top;
    var scrolled_animate = position_element-350;

    if($(this).scrollTop()>=scrolled_animate){
      $("a.test-opacity").css({
        "opacity" : "1"
      }),
      $("#Grid").css({
        "opacity" : "1"
      });

      $(".first-item").addClass('animated');
      $(".first-item").addClass('fadeInLeft');

      $(".second-item").addClass('animated');
      $(".second-item").addClass('fadeInDown');

      $(".third-item").addClass('animated');
      $(".third-item").addClass('fadeInRight');
     }
  });
});
