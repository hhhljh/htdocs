<?php 
	session_start();
	$db = new PDO("mysql:host=127.0.0.1;dbname=page;charset=utf8;","root","");
	$is_member = isset($_SESSION['member']);
	$memberInfo = $is_member ? $_SESSION['member'] : NULL;
	$type = isset($_GET['type']) ? $_GET['type'] : 'board';
	$page = isset($_GET['page']) ? $_GET['page'] : 'list';
	$idx = isset($_GET['idx']) ? $_GET['idx'] : NULL;
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>MAIN PAGE</title>
 </head>
 <body>
 	<a href="./?type=board&amp;page=list">게시판</a>
 	<?php if ($is_member): ?>
 		<a href="./?type=member&amp;page=myPage">마이 페이지</a>
 		<a href="./?type=member&amp;page=logOut">로그아웃</a>
 		<p>
 			<?php echo $memberInfo['name'] ?>(<?php echo $memberInfo['id'] ?>)님 환영합니다.
 		</p>
 	<?php else: ?>
 		<a href="./?type=member&amp;page=login">로그인</a>
 		<a href="./?type=member&amp;page=signUp">회원가입</a>
 	<?php endif ?>

 	<?php
 		if(isset($_POST['action'])){
 			include_once("./{$type}/action.php");
 			exit;
 		}
 		include_once("./{$type}/{$page}.php");
 	?>
 	<p>
 		copyright (C) 2018 강지형 all right reserved.
 	</p>
 </body> 
 </html>