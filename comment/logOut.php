<?php 
	session_start();
	header("content_type:text/html;charset=utf8");
	session_destroy();
	echo "<p>로그아웃 되었습니다</p>";
	echo '<a href="./">메인페이지</a>';
 ?>