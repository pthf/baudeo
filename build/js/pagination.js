//Funcion de paginacion para la parte de portafolio.html

$(document).on("ready",function(){

  var counter = 0;

  $(document).on("click", ".go-right", function(){

    var lengthSelected =  $('.wrapper div.content-tab').length-1;
    if(counter==lengthSelected)
      counter = 0;
    else
      counter++;

    $(".content-tab").removeClass("show-page");
    $(".content-tab").addClass("noshow-page");
    $("div.content-tab[name="+counter+"]").removeClass("noshow-page");
    $("div.content-tab[name="+counter+"]").addClass("show-page");

    $("a.number").removeClass("selected");
    $("a.number[name="+counter+"]").addClass("selected");

    return false;
  });

  $(document).on("click", ".go-left", function(){

    var lengthSelected =  $('.wrapper div.content-tab').length-1;
    if(counter==0)
      counter = lengthSelected;
    else
      counter--;

    $(".content-tab").removeClass("show-page");
    $(".content-tab").addClass("noshow-page");
    $("div.content-tab[name="+counter+"]").removeClass("noshow-page");
    $("div.content-tab[name="+counter+"]").addClass("show-page");

    $("a.number").removeClass("selected");
    $("a.number[name="+counter+"]").addClass("selected");

    return false;
  });
  $(document).on("click", "a.number", function(){

    counter = $(this).attr("name");

    $(".content-tab").removeClass("show-page");
    $(".content-tab").addClass("noshow-page");
    $("div.content-tab[name="+counter+"]").removeClass("noshow-page");
    $("div.content-tab[name="+counter+"]").addClass("show-page");

    $("a.number").removeClass("selected");
    $("a.number[name="+counter+"]").addClass("selected");

    return false;
  });

  $(document).ready(function() {
  //Inicializar paginacion (tabs).
      $(function() {
        $( "#tabs" ).tabs();
      });
  //Opcion del menu selecionada
  $(document).on("click", '.opt-list', function(){
      $('.opt-list').removeClass('selected');
      $(this).addClass('selected');
    });
  //Filtrar a todos
  $(document).on("click", ".opt-todos", function(){
    $("li[name=interiorismo],li[name=habitacional],li[name=comercial],li[name=design]").removeClass('noshow-item');
    $("li[name=interiorismo],li[name=habitacional],li[name=comercial],li[name=design]").addClass('show-item');
    });
  //Filtrar solo diseño
  $(document).on("click", ".opt-design", function(){
    $("li[name=interiorismo],li[name=habitacional],li[name=comercial],li[name=design]").removeClass('show-item');
    $("li[name=interiorismo],li[name=habitacional],li[name=comercial],li[name=design]").addClass('noshow-item');
    setTimeout(function(){
      $("li[name=design]").removeClass('noshow-item');
    }, 10)
    $("li[name=design]").addClass('show-item');
  });
  //Filtrar solo interiorismo
  $(document).on("click", ".opt-int", function(){
      $("li[name=design],li[name=habitacional],li[name=comercial],li[name=interiorismo]").removeClass('show-item');
      $("li[name=design],li[name=habitacional],li[name=comercial],li[name=interiorismo]").addClass('noshow-item');
      $("li[name=interiorismo]").removeClass('noshow-item');
      $("li[name=interiorismo]").addClass('show-item');
    });
  //Filtrar solo habitacional
  $(document).on("click", ".opt-hab", function(){
      $("li[name=design],li[name=interiorismo],li[name=comercial]").removeClass('show-item');
      $("li[name=design],li[name=interiorismo],li[name=comercial]").addClass('noshow-item');
      $("li[name=habitacional]").removeClass('noshow-item');
      $("li[name=habitacional]").addClass('show-item');
    });
  //Filtrar solo comercial
  $(document).on("click", ".opt-com", function(){
      $("li[name=design],li[name=interiorismo],li[name=habitacional]").removeClass('show-item');
      $("li[name=design],li[name=interiorismo],li[name=habitacional]").addClass('noshow-item');
      $("li[name=comercial]").removeClass('noshow-item');
      $("li[name=comercial]").addClass('show-item');
    });
  });


});
