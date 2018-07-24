function siteLoad(){
	$("#gallery li").addClass("animation animationBefore");
	$('head').append('\
		<style>\
			#header{z-index:50;}\
			#header>div{transition:1s;}\
			#header>div.active{margin-right:0px}\
			.gnb>div{font-size:30px;magin-right:3px;bottom:100px;position:absolute;}\
			.animation{transition:.7s;opacity:inherit;transform:inherit;}\
			.animation.animationBefore{transition:inherit;opacity:0;transform:translateY(100px);}\
		</style>\
	');
	$(".gnb").append('\
		<div>\
			<a href="#"><i class="fab fa-facebook"></i></a>\
			<a href="#"><i class="fab fa-google-plus-square"></i></a>\
			<a href="#"><i class="fab fa-pinterest-square"></i></a>\
			<a href="#"><i class="fab fa-twitter-square"></i></a>\
		</div>');
}

function menuOpen(){
	$("#header>div").addClass("active");
}
function menuClose(){
	$("#header>div").removeClass("active");
}
function layerAnimation(){
	var st = $(window).scrollTop();
	var sb = st + $(window).height();
	$("#gallery li").each(function(index){
		var obj = $(this);
		var ot = obj.offset().top;
		var ob = ot + obj.outerHeight();
		if(ot > st && ob < sb){
			$(this).removeClass("animationBefore");
		} else{
			$(this).addClass("aniamtionBefore");
		}
	})
	$("#header>div").removeClass("active");
}

$(siteLoad)
.on("click","#header .menu",menuOpen)
.on("click","#header .close, .content_wrap",menuClose)

$(window).on("scroll",layerAnimation)
