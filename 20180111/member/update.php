<form action="" method="post">
<input type="hidden" name="action" value="update">
<ul>
	<li>
		<label>
			<span>ID</span> :
			<?php echo $_SESSION['member']['id']?>
		</label>
	</li>
	<li>
		<label>
			<span>Password</span> :
			<input type="password" name="pw" value="<?php echo $_SESSION['member']['pw']?>">
		</label>
	</li>
	<li>
		<label>
			<span>Name</span> :
			<input type="text" name="name" value="<?php echo $_SESSION['member']['name']?>">
		</label>
	</li>
	<li>
		<label>
			<span>Birth</span> :
			<input type="text" name="birth" value="<?php echo $_SESSION['member']['birth']?>">
		</label>
	</li>
	<li>
		<label>
			<span>E-mail</span> :
			<input type="text" name="email" value="<?php echo $_SESSION['member']['email']?>">
		</label>
	</li>
</ul>
<button type="submit">전송</button>
<a href="./?type=member&amp;page=mypage">취소</a>
	</fieldset>
</form>