<?php
	$db = new PDO("mysql:host=127.0.0.1;dbname=0110;charset=utf8;","root","");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Document</title>
</head>
<body>
<form action="./register_action.php" method="post">
	<fieldset><legend>회원가입</legend>
		<ul>
			<li>
				<label>
					<span>아이디</span>
					<input type="text" name="id" size="40" maxlength="16">
				</label>
			</li>
			<li>
				<label>
					<span>비밀번호</span>
					<input type="password" name="pw" size="40" maxlength="16">
				</label>
			</li>
			<li>
				<label>
					<span>이름</span>
					<input type="text" name="name" size="40">
				</label>
			</li>
			<li>
				<label>
					<span>이메일</span>
					<input type="text" name="email" size="40">
				</label>
			</li>
			<li>
				<label>
					<span>연락처</span>
					<input type="text" name="tel" size="40">
				</label>
			</li>
		</ul>
		<button type="submit">전송</button>
	</fieldset>
</form>
</body>
</html>