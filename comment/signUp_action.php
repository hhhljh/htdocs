<?php 
	header("content-type:text/html;charset=utf8");
	$db = new PDO("mysql:host=127.0.0.1;dbname=page;charset=utf8;","root","");

	$cnt = $db->query("SELECT * FROM `member` WHERE id='{$_POST['id']}'")->rowCount();
	if ($cnt != 0) {
		echo "<p>중복된 아이디가 있습니다.</p>";
		echo '<a href="./signUp.php">재입력</a>';
		exit;
	}
	$sql = "INSERT INTO `member`
		(	
			id,
			pw,
			name,
			birth,
			email
			)
		values
		(
			'{$_POST['id']}',
			'{$_POST['pw']}',
			'{$_POST['name']}',
			'{$_POST['birth']}',
			'{$_POST['email']}'
		);
	";
	if ($db->query($sql)) {
		echo "<p>회원가입이 완료되었습니다.</p>";
		echo "<a href='./login.php'>로그인</a>";
	} else {
		echo $sql;
		echo " : 오류!";
	}
 ?>