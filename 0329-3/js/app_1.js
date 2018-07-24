$(document).on("ready",function(){
	$("#gallery li").addClass("animation animationBefore")
	$("head").append("\
		<style>\
			#header>div{transition:1s;}\
			#header>div.active{margin-right:0;}\
		</style>\
	");
})

$(document).on("click","#header .menu",function(){
	$("#header>div").addClass("active");
})

$(document).on("click","#header .close",function(){
	$("#header>div").removeClass("active");
})

$(document).on("click",".content_wrap",function(){
	$("#header>div").removeClass("active");
})

$(window).on("scroll",function(){
	$("#header>div").removeClass("active");
})