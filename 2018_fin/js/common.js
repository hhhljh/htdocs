$(document).on("click",".allChk",function(){
	var _this = this.checked;
	$(".chk").each(function() {
		this.checked = _this;
	});
})