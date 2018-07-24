$(document).on("ready",function(){
	$("#gallery li").addClass("animation animationBefore")
	$("head").append("\
		<style>\
			#header>div{transition:1s;}\
			#header>div.active{margin-right:0;}\
			.animation{transition:1s;opacity:inherit;transform:inherit}\
			.animation.animationBefore{transition:inherit;opacity:0;transform:translateY(100px)}\
			#gallery li{transition:.3s}\
			#gallery li:hover{transform:scale(1.2) rotate(10deg);z-index:10;}\
		</style>\
	");
	loadAnimation();
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

$(window).on("scroll",loadAnimation)

function loadAnimation(){
	var st = $(window).scrollTop();
	var sb = st + $(window).height();
	console.log("scroll Top : " + st);
	console.log("scroll Bottom : " + sb);
	$("#gallery li").each(function(index){
		var obj = $(this);
		var ot = obj.offset().top;
		var ob = ot + obj.outerHeight();
		console.log("ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ")
		console.log("이미지의 번호 : " + index);
		console.log("이미지의 상단 위치 : " + ot);
		console.log("이미지의 하단 위치 : " + ob);
		console.log("(st)"+st+" < (ot)"+ot+" && (ob)"+ob+" < (sb)"+sb);
		console.log("화면에 이미지가 들어 왔다. : "+(st < ot && ob < sb))
		console.log("ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ")
		if(st < ot && ob < sb){
			$(this).removeClass("animationBefore");
		} else {
			$(this).addClass("animationBefore");
		}
	})
	$("#header>div").removeClass("active");
}