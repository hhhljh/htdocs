function siteLoad(){
	$("#gallery li").addClass("animation animationBefore")
	$("head").append("\
		<style>\
			#header>div{transition:1s;}\
			#header>div.active{margin-right:0;}\
			.animation{transition:1s;opacity:inherit;transform:inherit}\
			.animation.animationBefore{transition:inherit;opacity:0;transform:translateY(100px)}\
			#gallery li{transition:.3s}\
			#gallery li:hover{transform:scale(1.2) rotate(10deg);z-index:10;}\
			.layer{display:flex;left:0;right:0;bottom:0;top:0;position:fixed;background:rgba(0,0,0,.5);justify-content:center;align-items:center;z-index:100;}\
			.layer .btn{width:100px;height:40px;background:#09f;color:#fff;line-height:40px;text-decoration:none;text-align:center;}\
			.layer .layer_close{position:absolute;right:50px;z-index:20;}\
			.layer .layer_close.top{top:50px;}\
			.layer .layer_close.bottom{bottom:50px;}\
			.layer .arrow{position:absolute;top:calc(50% - 20px)}\
			.layer .arrow.left{left:100px;}\
			.layer .arrow.right{right:100px;}\
			.layer .desc{position:absolute;bottom:40px;left:0;right:0;text-align:center;color:#fff;}\
			.layer .img{max-width:80%;max-height:80%}\
			.layer img{max-width:100%;max-height:100%}\
			.social{position:absolute;bottom:120px;}\
			.social a{display:block;line-height:200%;}\
		</style>\
	");
	$(".gnb").append('<div class="social">\
		<a href="#">Facebook</a>\
		<a href="#">google+</a>\
		<a href="#">naver</a>\
		</div>');
	loadAnimation();
}

function menuOpen(){
	$("#header>div").addClass("active");
}

function menuClose(){
	$("#header>div").removeClass("active");
}


var imgidx = 0;
function layerOpen(){
	$(".layer").remove();
	imgidx = $(this).index();
	var idx = imgidx+1;
	var layerTemplate =  '\
	<div class="layer" style="display:none;">\
		<a href="#" class="btn layer_close top">닫기</a>\
		<a href="#" class="btn layer_close bottom">닫기</a>\
		<a href="#" class="btn arrow left">이전</a>\
		<a href="#" class="btn arrow right">다음</a>\
		<div class="img">\
			<img src="./img/'+idx+'.jpg" alt="'+idx+'.jpg" />\
		</div>\
		<div class="desc">\
			<p>현재 이미지는 '+idx+'.jpg 입니다.</p>\<p>현재 페이지 : '+idx+' / 총 페이지 : 16</p>\
		</div>\
	</div>';
	$('body').append(layerTemplate);
	$('.layer').fadeIn(300)
}

function layerClose(){
	$('.layer').fadeOut(300,function(){
		$(".layer").remove();
	})
}

function imgChange(){
	var imgLength = $("#gallery li").length; // 16
	if($(this).hasClass("left")){
		imgidx = imgidx-1; // 만약에 imgidx가 0일 때, 0 => -1
		if(imgidx < 0) imgidx = imgLength-1;  // 15
	} else {
		imgidx = imgidx+1; // 만약에 imgidx가 15일 때, 15 => 16
		if(imgidx >= imgLength) imgidx = 0; // 0
	}
	$("#gallery li").eq(imgidx).click();
}

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

$(siteLoad)
.on("click","#header .menu",menuOpen)
.on("click","#header .close, .content_wrap",menuClose)
.on("click","#gallery li",layerOpen)
.on("click",".layer_close",layerClose)
.on("click",".layer .arrow, .layer .img",imgChange)

$(window).on("scroll",loadAnimation)