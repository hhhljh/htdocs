<?php
	extract($_POST);
	switch($action){
		case 'update' :
			$sql = "
				UPDATE `member` SET 
				name = '{$_POST['name']}',
				pw = '{$_POST['pw']}',
				birth = '{$_POST['birth']}',
				email = '{$_POST['email']}'
				WHERE idx='{$_SESSION['member']['idx']}'
				";
			if ($db->query($sql)) {
				$_SESSION['member']['name'] = $_POST['name'];
				$_SESSION['member']['pw'] = $_POST['pw'];
				$_SESSION['member']['birth'] = $_POST['birth'];
				$_SESSION['member']['email'] = $_POST['email'];
				echo "<script>alert('회원 정보 수정이 완료되었습니다.');</script>";
				echo "<a href='./?type=member&amp;page=mypage'>마이페이지</a>";
			} else {
				echo $sql;
				echo "  : 오류!";
			}
		break;
		case 'signup' :
			$cnt = $db->query("SELECT * FROM `member` WHERE id='{$_POST['id']}'")->rowCount();
			if ($cnt != 0) {
				echo "<p>중복된 아이디가 있습니다.</p>";
				echo '<a href="./?type=member&amp;page=signUp">재입력</a>';
				exit;
			}
			$sql = "INSERT INTO `member`
				(	
					id,
					pw,
					name,
					birth,
					email
					)
				values
				(
					'{$_POST['id']}',
					'{$_POST['pw']}',
					'{$_POST['name']}',
					'{$_POST['birth']}',
					'{$_POST['email']}'
				);
			";
			if ($db->query($sql)) {
				echo "<p>회원가입이 완료되었습니다.</p>";
				echo "<a href='./?type=member&amp;page=login'>로그인</a>";
			} else {
				echo $sql;
				echo " : 오류!";
			}
		break;
		case 'login' :
				$member = $db->query("SELECT * FROM `member` where id='{$_POST['id']}' and pw='{$_POST['pw']}'")->fetch();
				if ($member) {
					$_SESSION['member'] = $member;
					echo "<p>로그인이 완료되었습니다.</p>";
					echo '<a href="./">메인페이지로</a>';
				} else {
					echo "<p>아이디 또는 비밀번호가 일치하지않습니다.</p>";
					echo '<a href="./?type=member&amp;page=login">재입력</a>';
				}
		break;
	}