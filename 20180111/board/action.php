<?php

	extract($_POST);
	switch($action){
		case 'insert':
			$sql = "INSERT INTO `board` 
				(
					subject,
					content,
					name,
					date
					)
				values
				(
					'{$_POST['subject']}',
					'{$_POST['content']}',
					'{$_POST['name']}',
					now()
				);
			";

			if ($db->query($sql)) {
				echo "<script>alert('작성이 완료되었습니다.');</script>";
				echo "<a href='./?type=board'></a>";
			} else {
				echo $sql;
				echo " : 오류!";
			}
			break;
		case 'rewrite':
			$sql = "UPDATE `board` SET 
			subject = '{$_POST['subject']}',
			content = '{$_POST['content']}',
			name = '{$_POST['name']}',
			date = now()
			WHERE idx='{$_GET['idx']}'
			";

			if ($db->query($sql)) {
		
				echo "<script>alert('게시물 수정이 완료되었습니다.')</script>";
				echo "<a href='./?type=board&amp;page=list'>게시판</a>";
			}

			break;

		case 'delete':

			$sql = "DELETE FROM `board` WHERE `idx` = {$_GET['idx']}";

				if ($db->query($sql)) {
					echo "<p>삭제가 완료되었습니다.</p>";
					echo '<a href="./?type=board&amp;page=list">목록</a>';
				} else {
					echo $sql;
					echo "<p>오류!</p>";
				}

		break;
	}
 ?>