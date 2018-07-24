function siteLoad(){
	$("#gallery li").addClass("animation animationBefore")
	$("head").append('\
		<style>\
		#header{z-index:50;}\
		#header>div.active{margin-right:0;}\
		#header>div{transition:1s}\
		.animation{transition:.5s;opacity:inherit;transform:inherit;}\
		.animation.animationBefore{transition:inherit;opacity:0;transform:translateY(100px);}\
		#gallery li{transition:.7s}\
		#gallery li:hover{transform:scale(1.2) rotate(5deg);z-index:10}\
		.gnb>div{position:absolute;bottom:70px;}\
		.gnb i{font-size:35px;margin-right:4px}\
		.layer{display:flex;top:0;bottom:0;right:0;left:0;background:rgba(0,0,0,.4);z-index:100;justify-content:center;align-items:center;position:fixed;}\
		.layer .btn{width:100px;height:40px;text-align:center;text-decoration:none;line-height:40px;background:#09f;color:#fff}\
		.layer .layer_close{position:absolute;z-index:20;right:50px;}\
		.layer .layer_close.top{top:50px;}\
		.layer .layer_close.bottom{bottom:50px;}\
		.layer .arrow{position:absolute;top:calc(50% - 20px)}\
		.layer .arrow.left{left:100px;}\
		.layer .arrow.right{right:100px;}\
		.layer .desc{position:absolute;bottom:40px;left:0;right:0;text-align:center;color:#fff;}\
		.layer .img{max-width:80%;max-height:80%;}\
		.layer img{max-width:100%;max-height:100%;}\
		</style>\
		');
	$(".gnb").append('\
		<div>\
		<a href="#"><i class="fab fa-facebook"></i></a>\
		<a href="#"><i class="fab fa-google-plus-square"></i></a>\
		<a href="#"><i class="fab fa-pinterest-square"></i></a>\
		<a href="#"><i class="fab fa-twitter-square"></i></a>\
		</div>\
		');
}

function menuOpen(){
	$("#header>div").addClass("active");
}
function menuClose(){
	$("#header>div").removeClass("active");
}
function loadAnimation(){
	var st = $(window).scrollTop();
	var sb = st + $(window).height();
	$("#gallery li").each(function(index){
		var obj = $(this);
		var ot = obj.offset().top;
		var ob = ot + obj.outerHeight();
		if(st < ot && ob < sb){
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
	imgidx = $(this).index();
	var idx = imgidx+1;
	var layerTemplate = '\
	<div class="layer" style="display:none;">\
		<a href="#" class="btn layer_close top">닫기</a>\
		<a href="#" class="btn layer_close bottom">닫기</a>\
		<a href="#" class="btn arrow left">이전</a>\
		<a href="#" class="btn arrow right">다음</a>\
		<div class="img">\
			<img src="./img/'+idx+'.jpg" alt="'+idx+'.jpg">\
		</div>\
		<div class="desc">\
			<p>현재 이미지는 '+idx+'.jpg 입니다.</p>\
			<p>현재 이미지 : '+idx+'.jpg / 총 페이지 : 16</p>\
		</div>\
	</div>';
	$('body').append(layerTemplate);
	$('.layer').fadeIn(300);
}

function layerClose(){
	$('.layer').fadeOut(300,function(){
		$(".layer").remove();
	})
}

function imgChange(){
	var imgLength = $("#gallery li").length;
	if($(this).hasClass("left")){
		imgidx = imgidx-1;
		if(imgidx < 0) imgidx = imgLength-1;
	} else{
		imgidx = imgidx+1;
		if(imgidx >= imgLength) imgidx = 0;
	}
	$("#gallery li").eq(imgidx).click();
}


$(siteLoad)
.on("click","#header .menu",menuOpen)
.on("click","#header .close, .content_wrap",menuClose)
.on("click","#gallery li",layerOpen)
.on("click",".layer_close",layerClose)
.on("click",".layer .arrow, .layer .img",imgChange)

$(window).on("scroll",loadAnimation)