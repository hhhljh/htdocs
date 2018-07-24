<?php 
	session_start();
	header("content_type:text/html;charset=utf8");
	$db = new PDO("mysql:host=127.0.0.1;dbname=page;charset=utf8","root","");
	$member = $db->query("SELECT * FROM `member` where id='{$_POST['id']}' and pw='{$_POST['pw']}'")->fetch();
	if ($member) {
		$_SESSION['member'] = $member;
		echo "<p>로그인이 완료되었습니다.</p>";
		echo '<a href="./index.php">메인페이지로</a>';
	} else {
		echo "<p>아이디 또는 비밀번호가 일치하지않습니다.</p>";
		echo '<a href="./login.php">재입력</a>';
	}
 ?>