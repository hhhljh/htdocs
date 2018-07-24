<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Document</title>
</head>
<body>
<ul>
	<li>
		<label>
			<span>아이디</span> : <?php echo $_SESSION['member']['id']?>
		</label>
	</li>
	<li>
		<label>
			<span>비밀번호</span> : <?php echo $_SESSION['member']['pw']?>
		</label>
	</li>
	<li>
		<label>
			<span>이름</span> : <?php echo $_SESSION['member']['name']?>
		</label>
	</li>
	<li>
		<label>
			<span>이메일</span> : <?php echo $_SESSION['member']['email']?>
		</label>
	</li>
	<li>
		<label>
			<span>연락처</span> : <?php echo $_SESSION['member']['tel']?>
		</label>
	</li>
</ul>
<a href="./memberUpdate.php">수정</a>
<a href="./">취소</a>
</body>
</html>