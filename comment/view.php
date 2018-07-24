<?php 
	$list = $db->query("SELECT * FROM `comment` WHERE idx='{$_POST['idx']}'")->fetch();
	echo "<p>{$list['idx']} / {$list['content']} / {$list['date']}</p>"
 ?>
 <a href="./?type=start">목록</a>
 <a href="./?type=update&amp;idx=<?php echo $_GET['idx'] ?>">수정</a>
 <a href="./?type=delete&amp;idx=<?php echo $_GET['idx'] ?>">삭제</a>