<?php 
	session_destroy();
	alert("로그아웃되었습니다.");
	move('./?type=board&page=list&cidx=1');
 ?>