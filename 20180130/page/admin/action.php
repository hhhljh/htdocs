<?php 
	extract($_POST);
	switch ($action) {
		case 'check':
			$data = $db->query("SELECT * FROM reserve where idx='{$idx}'")->fetch();
			$state = $data['state'] == '구매확정' ? '불확정' : '구매확정';
			$sql = "UPDATE reserve SET state='{$state}' WHERE idx={$idx}";
		break;
	}
	if(!$db->query($sql)){
		echo $sql;
		echo "<p>: 오류!</p>";
	} else{
		alert("구매가 확정되었습니다.");
		move("");
	}
 ?>