<?php
	access(!$is_member,"접근이 불가능합니다.");
?>
<div id="loginbox">
		<h2>LOGIN</h2>	
		<!-- LOGIN -->
		<div id="login">
			<ul>
				<li class="member" data-value="member">회원 로그인</li>
			</ul>
		
			<form action="" method="post">
			<input type="hidden" name="action" value="login">
				<div id="members">
					<input type="text" id="id" name="id" placeholder="아이디">
					<input type="password" id="pw" name="pw" placeholder="비밀번호">
				</div>

				<button type="submit" id="loginBtn">로그인</button>
			</form>
		</div>
	</div>
