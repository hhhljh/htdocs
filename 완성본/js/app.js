function loadFunction(){
	$(".gallery .content li").addClass("animation animationBefore");
	$("head").append('\
		<style>\
			.animation{opacity:inherit;transition:0.3s;transform:inherit;}\
			.animation.animationBefore{opacity:0;transform:translateY(100px);transition:inherit}\
			.gallery .content li:hover{transform:scale(1.2,1.2) rotate(5deg);transition:.3s;z-index:10;}\
			.layer{position:fixed;left:0;right:0;bottom:0;top:0;background:rgba(0,0,0,.5);z-index:100;text-align:center;display:none;}\
			.layer>span{display:inline-block;width:0;height:100%;vertical-align:middle;}\
			.layer .box{display:inline-block;vertical-align:middle;background:#fff;position:relative;text-align:left;max-width:80%;max-height:80%;}\
			.layer .layerContent{text-align:center;max-width:100%;max-height:100%;}\
			.layer .layerContent img{max-width:100%;max-height:100%;}\
			.layer .box .btn{width:100px;font-size:13px;background:#09f;color:#fff;border-radius:3px;border-bottom:1px solid #004c7e;text-decoration:none;height:40px;line-height:40px;display:inline-block;text-align:center;}\
			.layer .box .arrow{position:absolute;top:calc(50% - 20px)}\
			.layer .box .arrow.left{left:-150px;}\
			.layer .box .arrow.right{right:-150px;}\
			.layer .box .close{position:absolute;left:calc(100% - 100px);}\
			.layer .box .close.top{top:-60px;}\
			.layer .box .close.bottom{top:calc(100% + 20px);}\
			.header-content{transition:.3s;}\
			#header .menu_bg{position:fixed;left:0;right:0;top:0;bottom:0;z-index:100;background:rgba(0,0,0,.5);cursor:pointer;}\
		</style>\
	')
	$(".gnb ul").append('\
		<li><a href="#"><i class="fab fa-facebook"></i> Facebook</a></li>\
		<li><a href="#"><i class="fab fa-instagram"></i> Instargram</a></li>\
		<li><a href="#"><i class="fab fa-google-plus-g"></i> Google+</a></li>\
	')
	scrollAnimation()
}

function scrollAnimation(){
	var st = $(window).scrollTop();
	var sh = $(window).height();
	var sb = st+sh;
	$(".gallery .content li").each(function(index){
		var ot = $(this).offset().top;
		var h = $(this).outerHeight();
		var ob = ot+h;
		if(st <= ot && sb >= ob){
			// scrollTop, 즉 스크롤의 상단보다 오브젝트의 상단이 커야한다.
			// scrollTop+scrollHeight, 즉 화면 하단의 위치보다 오브젝트 하단의 위치가 작아야한다.
			// 즉 화면에 오브젝트가 들어와야 한다.
			$(this).removeClass("animationBefore")
		} else {
			$(this).addClass("animationBefore")
		}
	})
	hideMenu();
}

var layerIndex = 0;
function layerOpen(){
	layerIndex = $(this).index();
	var index = layerIndex+1;
	var src = "img/"+index+".jpg";
	var total = $(".gallery .content li").length;
	var layerTag ='\
			<div class="layer">\
				<span></span><div class="box">\
					<a href="#" class="arrow btn left">뒤로 가기</a>\
					<a href="#" class="arrow btn right">앞으로 가기</a>\
					<a href="#" class="close btn top">닫기</a>\
					<a href="#" class="close btn bottom">닫기</a>\
					<div class="layerContent">\
						<img src="'+src+'" alt="'+index+'" />\
						<p>'+index+'번째 사진입니다.</p>\
						<p>현재 사진 번호 : '+index+' / 전체 사진 수 : '+total+'</p>\
					</div>\
				</div>\
			</div>';
	$('body').append(layerTag);
	$(".layer").fadeIn(300)
	setTimeout(layerImageSet,100);
}

function layerClose(){
	$(".layer").fadeOut(300,function(){
		$(this).remove();
	})
}

function changeLayer(){
	var total = $(".gallery .content li").length;
	if($(this).hasClass("left")){
		if(--layerIndex < 0) layerIndex = total-1;
	} else {
		if(++layerIndex >= total) layerIndex = 0;
	}
	var index = layerIndex + 1;
	var src = 'img/'+index+'.jpg';
	var template = '\
		<img src="'+src+'" alt="'+index+'" />\
		<p>'+index+'번째 사진입니다.</p>\
		<p>현재 사진 번호 : '+index+' / 전체 사진 수 : '+total+'</p>\
	';
	$(".layerContent").html(template);
	layerImageSet();
}

function layerImageSet(){
	var layerH = $(".layer").height();
	var imgH = $(".layer img").height();
	if(layerH*0.8 < imgH){
		$(".layer img").height(((layerH*0.8)-50)+"px");
	}
}

function showMenu(){
	if(!$("#header .menu_bg").length) $("#header").append('<div class="menu_bg"></div>')
	$(".menu_bg").stop().fadeIn(500)
	$(".header-content").css({marginRight:0,zIndex:110,position:'relative'})
	$("#header").css({zIndex:110})
}

function hideMenu(){
	$(".menu_bg").remove();
	$(".header-content").css({marginRight:"-190px",zIndex:"",position:""})
	$("#header").css({zIndex:'inherit'})
}

$(loadFunction)
.on("click",".gallery .content li",layerOpen)
.on("click",".layer .close",layerClose)
.on("click",".layer .arrow",changeLayer)
.on("click",".menu",showMenu)
.on("click","#header .close, #header .menu_bg",hideMenu)
.on("click",".layer img",changeLayer)

$(window)
.on("scroll",scrollAnimation)
.on("resize",layerImageSet)