<?php 
	extract($_POST);
	$add_sql = "";
	if(isset($_FILES['file'])) if(is_uploaded_file($_FILES['file']['tmp_name'])){
		$file = $_FILES['file']['name'];
		$ext = explode(".",$file);
		$ext = strtolower(array_pop($ext));
		$file_name = time() . "_" . rand(0,99999).".{$ext}";
		$save_path = ROOT_PATH."/data/{$file_name}";
		if(move_uploaded_file($_FILES['file']['tmp_name'], $save_path)){
			$add_sql = ", file='{$file}', file_name='{$file_name}'";
		}
	}
	switch($action){
		case 'write':
			$sql =  "INSERT INTO board SET "
					." cidx='{$cidx}'"
					.",subject='{$_POST['subject']}'"
					.",content='{$_POST['content']}'"
					.",date=now()".$add_sql;
			if ($db->query($sql)) {
				alert('작성이 완료되었습니다.');
				echo "<script>location.replace('./?type=board&page=list&cidx={$cidx}');</script>";
			} else {
				echo $sql;
				echo "<p> : 오류!</p>";
			}
		break;
		case 'comment_insert':
			$sql = "INSERT INTO `comment` 
					(bidx, midx, content, date)
					values(	'$idx',
							'{$member_info['idx']}',
							'{$_POST['content']}',
							now()
						);"; 
			if ($db->query($sql)) {
				alert("완료되었습니다.");
				move("");
			} else {
				echo $sql;
				echo "<p> : 오류!</p>";
			}
		break;
		case 'like':
			$sql = "
				INSERT INTO likes SET bidx='{$_POST['idx']}', midx='{$member_info[idx]}';
			";
			if ($db->query($sql)){
				alert("추천되었습니다.");
				move("");
			} else {
				echo $sql;
				echo " : 오류! ";
			} 
		break;
		case 'unlike':
			$sql = "
				DELETE FROM likes where bidx='{$_POST['idx']}' and midx='{$member_info[idx]}';
			";
			if ($db->query($sql)){
				alert("추천이 취소 되었습니다.");
				move("");
			} else {
				echo $sql;
				echo " : 오류! ";
			} 
		break;
	}
 ?>