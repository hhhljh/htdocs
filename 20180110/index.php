<?php
	session_start();
	$db = new PDO("mysql:host=127.0.0.1;dbname=0110;charset=utf8;","root","");
	$is_member = isset($_SESSION['member']);
	$memberInfo = $is_member ? $_SESSION['member'] : NULL;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>메인페이지</title>
</head>
<body>
<?php if ($is_member): ?>
<a href="./logout.php">로그아웃</a>
<a href="./mypage.php">마이페이지</a>
<p>
	<?php echo $memberInfo['name']?>(<?php echo $memberInfo['id']?>)님 환영합니다.
</p>
<?php else: ?>
<a href="./login.php">로그인</a>
<a href="./register.php">회원가입</a>
<?php endif ?>
</body>
</html>