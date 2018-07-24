<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Document</title>
</head>
<body>
<form action="./memberUpdate_action.php" method="post">
	<ul>
		<li>
			<label>
				<span>아이디</span> :
				<?php echo $_SESSION['member']['id']?>
			</label>
		</li>
		<li>
			<label>
				<span>비밀번호</span> :
				<input type="password" name="pw" value="<?php echo $_SESSION['member']['pw']?>">
			</label>
		</li>
		<li>
			<label>
				<span>이름</span> :
				<input type="text" name="name" value="<?php echo $_SESSION['member']['name']?>">
			</label>
		</li>
		<li>
			<label>
				<span>이메일</span> :
				<input type="text" name="email" value="<?php echo $_SESSION['member']['email']?>">
			</label>
		</li>
		<li>
			<label>
				<span>연락처</span> :
				<input type="text" name="tel" value="<?php echo $_SESSION['member']['tel']?>">
			</label>
		</li>
	</ul>
	<button type="submit">전송</button>
	<a href="./mypage.php">취소</a>
</form>
</body>
</html>