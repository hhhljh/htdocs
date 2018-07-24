<?php 
	extract($_POST);

	switch($action){
		case 'write':
			$sql = "INSERT INTO `board` SET"
					." cidx='{$cidx}'"
					.",subject='{$_POST['subject']}'"
					.",content='{$_POST['content']}'"
					.",date=now()";
			 if ($db->query($sql)) {
			 	alert('작성이 완료되었습니다.');
			 	move("./?type=board&page=list&cidx={$cidx}");
			 } else{
			 	echo $sql;
			 	echo "<p>  :  wrong! </p>";
			 }
			break;
			case 'comment_write':
				$sql = "INSERT INTO comment 
				(bidx,midx,content,date)
				values(	'$idx',
					'{$member_info['idx']}',
					'{$_POST['content']}',
					now()
				);
				";
			if($db->query($sql)){
				alert("완료되었습니다.");
				move("");
			} else{
				echo $sql;
				echo "<p>	: WRONG! </p>";
			}
			break;
			
			}
 ?>