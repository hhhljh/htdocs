<?php 
 $data = $db->query("SELECT * FROM `board` where idx='{$_GET['idx']}'")->fetch();
 ?>
<form action="" method="post">
<input type="hidden" name="action" value="rewrite">
<ul>
	<li>
		<label>
			제목 : 
			<input type="text" name="subject" value="<?php echo $data['subject'] ?>">
		</label>
	</li>
	<li>
		<label>
			내용 : 
			<input type="text" name="content" value="<?php echo $data['content'] ?>">
		</label>
	</li>
	<li>
		<label>
			작성자 : 
			<input type="text" name="name" value="<?php echo $data['name'] ?>">
		</label>
	</li>
</ul>
	<button>전송</button>
	<a href="./">취소</a>

</form>