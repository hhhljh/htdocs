<?php 
	session_start();
	$db = new PDO("mysql:host=127.0.0.1;dbname=page;charset=utf8;","root","");
	$is_member = isset($_SESSION['member']);
	$memberInfo = $is_member ? $_SESSION['member'] : NULL;
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>MAIN PAGE</title>
 </head>
 <body>
 	<?php if ($is_member): ?>
 		<a href="./myPage.php">마이 페이지</a>
 		<a href="./logOut.php">로그아웃</a>
 		<p>
 			<?php echo $memberInfo['name'] ?>(<?php echo $memberInfo['id'] ?>)님 환영합니다.
 		</p>
 	<?php else: ?>
 		<a href="./login.php">로그인</a>
 		<a href="./signUp.php">회원가입</a>
 	<?php endif ?>
 </body> 
 </html>