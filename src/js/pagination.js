//Funcion de paginacion para la parte de portafolio.html

$(document).on("ready",function(){
  //Inicializar paginacion (tabs).
  $(function() {
    $( "#tabs" ).tabs();
  });

  var counter = 0;
  var nameCategory;
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

  $(document).on("click", '.opt-list', function(){
    $('.opt-list').removeClass('selected');
    $(this).addClass('selected');
    $("ul#Grid li").removeClass('noshow-item');
    $("ul#Grid li").addClass('show-item');
    nameCategory = $(this).attr('data-name');
    $("ul#Grid li").removeClass('show-item');
    $("ul#Grid li").addClass('noshow-item');
    $("ul#Grid li."+nameCategory).removeClass('noshow-item');
    $("ul#Grid li."+nameCategory).addClass('show-item');
  });

});
