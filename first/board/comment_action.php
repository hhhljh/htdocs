<?php 
	$Coid = $_POST['Coid'];
		$Copw = $_POST['Copw'];
		$Cocomment = $_POST['Cocomment'];
	
		$sql = "INSERT INTO `comment` 
				(cidx, Coid, Copw, Cocomment, date)
				values(	'$cidx',
						'{$_POST['Coid']}',
						'{$_POST['Copw']}',
						'{$_POST['Cocomment']}',
						now()
					);";
		if ($db->query($sql)) {
			echo "<script>alert('작성이 완료되었습니다.')</script>";
			echo '<a href="./?type=board&amp;page=comment_list">댓글 보기</a>';
		} else {
			echo $sql;
			echo "<p> : 오류!</p>";
		}
 ?>