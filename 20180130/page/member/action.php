<?php 
	extract($_POST);
	switch($action){
		case 'login':
		$member = $db->query("SELECT* FROM  member WHERE 
			id='{$_POST['id']}' and pw='{$_POST['pw']}'")->fetch();
		access($member,"아이디 또는 비밀번호가 일치하지 않습니다.");
		$_SESSION['member'] = $member;
		alert("로그인 되었습니다.");
		move("./");
		break;
		case 'logout':
			session_destroy();
		alert("로그아웃 되었습니다.");
		move("./");
		break;
	}
?>