<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Document</title>
</head>
<body>
<form action="./login_action.php" method="post">
	<fieldset><legend>Login In</legend>
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
		</ul>
		<button type="submit">전송</button>
	</fieldset>
</form>
</body>
</html>