<?php 
 $data = $db->query("SELECT * FROM `board` where idx='{$_GET['idx']}'")->fetch();
 ?>
<ul>
	<li>
		<label>제목</label>
		<?php echo $data['subject']; ?>
	</li>
	<li>
		<label>내용</label>
		<?php echo $data['content']; ?>
	</li>
	<li>
		<label>작성자</label>
		<?php echo $data['name']; ?>
	</li>
	<li>
		<label>작성일</label>
		<?php echo $data['date']; ?>
	</li>
</ul>
<a href="./">목록</a>
<?php if ($is_member): ?>
<form action="" method="post">
	<input type="hidden" name="action" value="delete">
	<input type="hidden" name="idx" value="<?php echo $idx?>">
<a href="./?type=board&amp;page=rewrite&amp;idx=<?php echo $idx?>">글수정</a>
<button type="submit">글삭제</button>
</form>
<?php endif ?>