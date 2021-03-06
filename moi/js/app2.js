function siteLoad(){
	$("#gallery li").addClass("animation animationBefore");
	$("head").append('\
		<style>\
			#header{z-index:50;}\
			#header>div{transition:1s;}\
			#header>div.active{margin-right:0;}\
			.animation{transition:1s;opacity:inherit;trasnform:inherit;}\
			.animation.animationBefore{transition:inherit;opacity:0;trasnform:translateY(100px);}\
			#gallery li{trasnform:scale(1.2) rotate(7deg);}\
			.layer{display:flex;position:fixed;top:0;bottom:0;left:0;right:0;justify-content:center;align-items:center;z-index:100;background:rgba(0,0,0,.4)}\
			.layer .btn{width:130px;height:40px;line-height:40px;text-align:center;background:#09f;color:#fff;}\
			.layer .layer_close{position:absolute;right:50px}\
			.layer .layer_close.top{top:50px}\
			.layer .layer_close.bottom{bottom:50px}\
			.layer .arrow{position:absolute;top:calc(50% + 20px);}\
			.layer .arrow.left{left:50px}\
			.layer .arrow.right{right:50px}\
			.layer .desc{position:absolute;color:#fff;bottom:20px}\
			.layer .img{max-width:80%;max-height:80%;}\
			.layer img{max-width:100%;max-height:100%;}\
		</style>\
		');
	$(".gnb").append('\
			<div>\
				<a href="#"><i class="fab fa-facebook-square"></i>Facebook</a>\
				<a href="#"><i class="fab fa-facebook-square"></i>Facebook</a>\
				<a href="#"><i class="fab fa-facebook-square"></i>Facebook</a>\
				<a href="#"><i class="fab fa-facebook-square"></i>Facebook</a>\
			</div>\
		')
}

function menuOpen(){
	$("#header>div").addClass("active");
}
function menuClose(){
	$("header>div").removeClass("active");
}
function loadAnimation(){
	var st = $(window).scrollTop();
	var sb = st + $(window).height();
	$("#gallery li").each(function(index){
		var obj = $(this);
		var ot = obj.offset().top;
		var ob = ot + obj.outerHeight();
		if (st < ot && ob < sb) {
			$(this).removeClass("animationBefore");
		} else {
			$(this).addClass("animationBefore");
		}
	})
	$("#header>div").removeClass("active");
}
var imgidx = 0;
function layerOpen(){
	$(".layer").remove();
	var imgidx = $(this).index();
	var idx = imgidx+1;
	var layerTemplate = '\
		<div class="layer">\
			<a href="#" class="btn layer_close top">닫기</a>\
			<a href="#" class="btn layer_close bottom">닫기</a>\
			<a href="#" class="btn arrow left">이전</a>\
			<a href="#" class="btn arrow right">다음</a>\
			<div class="img">\
				<img src="./img/'+idx+'.jpg">\
			</div>\
			<div class="desc">\
				<p>현재 사진 번호 : '+idx+' / 전체 사진 수  :  16</p>\
			</div>\
		</div>\
	';
	$("body").append(layerTemplate);
	$(".layer").fadeIn(300);
}
function layerClose(){
	$(".layer").fadeOut(function(){
		$("layer_close").remove;
	})
}
function imgChange(){
	var imgLength = $("#gallery li").length;
	if($(this).hasClass("left")){
		imgidx = imgidx-1;
		if(imgidx < 0) imgidx = imgLength-1;
	} else {
		imgidx = imgidx+1;
		if(imgidx > 16) imgidx = 0;
	}
	$("#gallery li").eq(imgidx).click();
}

$(siteLoad)
.on("click","#header .menu",menuOpen)
.on("click","#header .close, .content_wrap",menuClose)
.on("click","#gallery li",layerOpen)
.on("click",".layer_close",layerClose)
.on("click",".arrow.left, .arrow.right",imgChange)

$(window).on("scroll",loadAnimation)