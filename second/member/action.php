<?php 
	extract($_POST);
	switch($action) {
		case 'signUp':
			$sql = "INSERT INTO `member`
			(	id,
				pw,
				name,
				lv) 
			values(
				'{$_POST['id']}',
				'{$_POST['pw']}',
				'{$_POST['name']}',
				'1'
				);";
			if($db->query($sql)){
				alert("가입이 완료되었습니다.");
				move('./?type=member&page=logIn');
			} else{
				echo $sql;
				echo " : 오류! ";
			}
			break;
		case 'logIn':
			print_r($_POST);
			$member = $db->query("SELECT * FROM member WHERE 
				id='{$_POST['id']}' and 
				pw='{$_POST['pw']}'")->fetch();
			access($member,"아이디 또는 비밀번호가 일치하지 않습니다.");
			$_SESSION['member'] = $member;
			alert("로그인 되었습니다.");
			move('./?type=board&page=list&cidx=1');
			break;
	}
 ?>