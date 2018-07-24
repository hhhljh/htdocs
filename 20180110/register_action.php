<?php
	header("content-type:text/html;charset=utf8");
	$db = new PDO("mysql:host=127.0.0.1;dbname=0110;charset=utf8;","root","");
	$cnt = $db->query("SELECT * FROM member where id='{$_POST['id']}'")->rowCount();
	if($cnt != 0){
		echo "<p>중복된 아이디가 있습니다.</p>";
		echo '<a href="./register.php">다시 입력</a>';
		exit;
	}
	$sql = "
		insert into `member`
		(
			name,
			id,
			pw,
			email,
			tel
		)
		values
		(
			'{$_POST['name']}',
			'{$_POST['id']}',
			'{$_POST['pw']}',
			'{$_POST['email']}',
			'{$_POST['tel']}'
		);
	";
	if($db->query($sql)){
		echo "<p>회원가입이 완료되었습니다.</p>";
		echo "<a href='./login.php'>로그인</a>";
	} else {
		echo $sql;
		echo " : 오류!";
	}
?>