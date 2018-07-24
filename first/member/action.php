<?php 
	extract($_POST);
	switch ($action) {
		case 'signUp':
			$cnt = $db->query("SELECT * FROM `member` WHERE id='{$_POST['id']}'")->rowCount();
			access($cnt == 0,"중복된 아이디 입니다.");
			$sql = "INSERT INTO `member` 
			(	id,
				pw,
				name)
			values (
				'{$_POST['id']}',
				'{$_POST['pw']}',
				'{$_POST['name']}');
				";
			if ($db->query($sql)) {
				alert("가입이 완료되었습니다.");
				move("./?type=member&amp;page=logIn");
			} else{
				echo $sql;
				echo " : 오류!";
			}
			break;
		case 'logIn':
			$member= $db->query("SELECT * FROM `member` WHERE 
			id='{$_POST['id']}'
			and pw='{$_POST['pw']}'")->fetch();

			access($member,"아이디 또는 비밀번호가 일치하지 않습니다.");
			$_SESSION['member'] = $member;
			alert("로그인 되었습니다.");
			move("./");
			break;
	}
 ?>