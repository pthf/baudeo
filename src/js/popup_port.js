//Funcion para hacer "Popup" en los portafolios y servicios.

$(document).on("ready",function(){

  //Al hacer click en "item-port" va aparecer la ventana y un background filter.
  $(document).on("click", ".item-port", function(){
      $(".popup_window").css({
        "opacity" : "1",
        "z-index" : "9",
      }),
      $(".background-filter").css({
        "opacity" : "1",
        "z-index" : "8"
      });
    // "return false;" hace que al dar scroll la venta mostrada siga al scroll.
    return false;
    });

    //Al hacer click en "close-info" (que es la "x" para cerrar), va cerrar la ventana en popup.
    $(".close-info, .background-filter").on("click", function(){
      $(".popup_window").css({
        "opacity" : "0",
        "z-index" : "-10",
        "transition" : "1s"
      }),
      $(".background-filter").css({
        "opacity" : "0",
        "z-index" : "-10",
        "transition" : "1s"
      });
    });
});
