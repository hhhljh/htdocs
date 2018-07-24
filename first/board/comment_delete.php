<?php
	$sql = "DELETE from comment where idx='{$idx}'"; 
	if ($db->query($sql)) {
		echo "<script>alert('삭제되었습니다.'); history.back();</script>";
	} else {
		echo $sql;
		echo "<p> : 오류!</p>";
	}
?>