$(document).ready(function(){$(window).scroll(function(){var t=$("section.content_contact").position().top,n=t-400;$(this).scrollTop()>=n&&($(".content_contact").css({opacity:"1"}),$(".form").addClass("animated"),$(".form").addClass("fadeInLeft"),$(".info_contact").addClass("animated"),$(".info_contact").addClass("fadeInRight"))})});