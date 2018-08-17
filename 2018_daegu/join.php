<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>회원가입</title>
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
		<form class="form-wrap" method="post" action="">
			<input type="hidden" name="action" value="signup">
			<div class="form-title">회원가입</div>
			<div class="form-group">
				<input type="email" class='form-control' placeholder="이메일" id="email">
			</div>
			<div class="form-group">
				<input type="text" class='form-control' placeholder="이름" id="name">
			</div>
			<div class="form-group">
				<input type="password" class='form-control' placeholder="비밀번호(4~8자리)" id="pw">
			</div>
			<div class="form-group">
				<input type="password" class='form-control' placeholder="비밀번호 확인" id="pw">
			</div>
			<div class="form-group">
				<button type="submit" class="form-btn" id="signbtn">회원가입</button>
			</div>
		</form>
	</article>
	<!-- //content -->

</body>
</html>