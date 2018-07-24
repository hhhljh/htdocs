<?php
	$sql = "DELETE from board where idx='{$idx}'"; 
	if ($db->query($sql)) {
		echo "<script>alert('삭제되었습니다.'); replace.location();</script>";
	} else {
		echo $sql;
		echo "<p> : 오류!</p>";
	}
	move('./?type=board&amp;page=list');