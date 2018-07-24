<?php 
	session_start();
	header("content_type:text/html;charset:utf8");
	$db = new PDO("mysql:host=127.0.0.1;dbname=page;charset=utf8","root","");
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
		echo "<script>회원 정보 수정이 완료되었습니다.</script>";
		echo "<a href='./mypage.php'>마이페이지</a>";
	} else {
		echo $sql;
		echo "  : 오류!";
	}
 ?>