//Efecto hover en elementos

$(document).on("ready",function(){
  // portafolio.html
  $(".item-port").on({

  mouseenter: function(){
  //cuando el mouse entra en el selector...
  $(this).css({
    'z-index' : '5',
    }),
  $('.desc-item',this).css({
    'opacity' : '.9',
    'transition' : '.3s'
    }),
  $('.more-icon',this).css({
    'opacity' : '.9',
    'transition' : '.3s'
    }),
  $('.item-info',this).css({
    'opacity' : '1',
    'transition' : '.3s'
    })
  },

  mouseleave: function () {
  //cuando el mouse sale del selector...
  $(this).css({
    'z-index' : '1',
    }),
  $('.desc-item',this).css({
    'opacity':'0',
    'transition' : '.3s'
    }),
  $('.more-icon',this).css({
    'opacity':'0',
    'transition' : '.3s'
    }),
  $('.item-info',this).css({
    'opacity':'0',
    'transition' : '.3s'
    })
  }});


});
