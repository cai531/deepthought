$(document).ready(function(){
	if($( window ).width()<1000) $('nav').addClass('mobile-nav');
	else $('nav').removeClass('mobile-nav');

});

$(window).resize(function(){
	if($( window ).width()<1000) $('nav').addClass('mobile-nav');
	else $('nav').removeClass('mobile-nav');
});	