<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>로그인</title>
	<link rel="stylesheet" type="text/css" href="app.css">
</head>
<body>

	<!-- header -->
	<header>
		<div id="logo">
			<a href="#">메일 시스템</a>
		</div>
		<nav>
			<ul>
				<li><a href="#">회원가입</a></li>
				<li><a href="#">로그인</a></li>
			</ul>
		</nav>
	</header>
	<!-- //header -->

	<!-- content -->
	<article id="content">
		<form class="form-wrap" action="" method="post">
			<input type="hidden" name="action" value="login">
			<div class="form-title">로그인</div>
			<div class="form-group">
				<input type="email" class='form-control' placeholder="이메일" id="email">
			</div>
			<div class="form-group">
				<input type="password" class='form-control' placeholder="비밀번호" id="pw">
			</div>
			<div class="form-group">
				<button type="submit" class="form-btn">로그인</button>
			</div>
		</form>
	</article>
	<!-- //content -->

</body>
</html>