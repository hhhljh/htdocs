<?php 
	extract($_POST);
	$msg = "완료되었습니다.";
	$url = HOME_URL."/member/list";
	switch($action){
		case 'update' :
		access(rowCount("SELECT * FROM member WHERE id = '{$id}'") <= 1,
				"중복된 아이디가 있습니다.");
		$pw = hash("sha256",$pw.$id);
		$sql = "UPDATE  member SET
				id = '{$id}',
				pw = '{$pw}',
				name = '{$name}'
				WHERE idx = '{$idx}'
		";
		break;
		case 'insert' :
			access(rowCount("SELECT idx FROM member WHERE id  = '{$id}'") <=1 ,"중복된 아이디가 있습니다.");
			$pw = hash("sha256",$pw.$id);
			$sql = "INSERT INTO member SET
					id = '{$id}',
					pw = '{$pw}',
					name = '{$name}',
					level = '1';
			";
		break;
	}
	query($sql);
	alert($msg);
	move($url);	
 ?>