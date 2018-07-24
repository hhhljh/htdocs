<?php 
	$sql = "DELETE FROM comment WHERE idx='{$idx}'";
	if ($db->query($sql)) {
		alert("댓글이 삭제되었습니다.");
		move(""); 
	} else{
		echo $sql;
		echo "<p>	: 오류! </p>"
	}
 ?>