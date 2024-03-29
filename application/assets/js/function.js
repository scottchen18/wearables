



//**************************************************
//			ONREADY.JS
//*************************************************/



//**************************************************
//				ONCLICK.JS
//*************************************************/				

$('.play_video').click(function(){show_video($(this).attr('data-rel'));});
$('.featured_story').click(function(){location.href=baseUrl+'/feature';});
$('.main_nav li').click(scroll_navigation);
$('.page_nav li').click(page_nav);
$('.close_vid').click(close_video);

if($('#page').val() != ''){
	jump_page($('#page').val());
}
/**************************************************/

//**************************************************
//				FUNCTION.JS
//*************************************************/

jQuery.fn.center = function(parent) {
    if (parent) {
        parent = this.parent();
    } else {
        parent = window;
    }
    this.css({
        "position": "absolute",
        "top": ((($(parent).height() - this.outerHeight()) / 2) + $(parent).scrollTop() + "px"),
        "left": ((($(parent).width() - this.outerWidth()) / 2) + $(parent).scrollLeft() + "px")
    });
return this;
}
jQuery.fn.scenter = function(parent) {
    if (parent) {
        parent = this.parent();
    } else {
        parent = window;
    }
    this.css({
        "position": "absolute",
        "left": ((($(parent).width() - this.outerWidth()) / 2) + $(parent).scrollLeft() + "px")
    });
return this;
}


function show_video(url){

	if(!mobile){
	var width = $(window).width() * 0.7;
	$('body').css('max-height',$(window).height());
	$('body').css('overflow','hidden');
	$('.bgfade').fadeIn('slow');
	
	$('#video_pop').show();
	$('#y_video').css('width',width);
	$('#y_video').css('height',(width/1.7777));
	
	$('#video_pop').css('width',width);
	$('#video_pop').center(false);
	$('#video_pop').hide();
	$('#video_pop').fadeIn('slow',function(){
		$('#y_video').html('<iframe width="'+width+'" height="'+(width/1.7777)+'" src="//www.youtube.com/embed/jUO7Qnmc8vE" frameborder="0" allowfullscreen></iframe>');
	});
	
	$('.bgfade').css('height',$(document).height());
	$('.bgfade').css('width',$(document).width());
	
	
	$(document).keyup(function(e) {
		 if (e.keyCode == 27) {close_video();}
	});
	}
	else{
		location.href="//www.youtube.com/embed/jUO7Qnmc8vE";
	}
}
function close_video(){
	$('.bgfade').fadeOut('slow');
	$('#video_pop').fadeOut('slow',function(){$('#y_video').html('');});
	$('body').css('max-height','auto');
	$('body').css('overflow','auto');
	
}

function page_nav(){
	var page = $(this).attr('rel');
	location.href=baseUrl+'/page/'+page;
}

function scroll_navigation(){
	var page = $(this).attr('rel');
	$('html, body').animate({
	    scrollTop: $('#'+page).offset().top - 60
	}, 1200);
}

function jump_page(page){
	$('html, body').animate({
	    scrollTop: $('#'+page).offset().top - 60
	}, 1);
}
