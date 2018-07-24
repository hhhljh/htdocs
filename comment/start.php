<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php 
	$db = new PDO("mysql:host=127.0.0.1;dbname=0108;","root","");
	if (isset($_POST['action'])) {
		switch($_POST['action']){
			case 'insert':
				$sql="INSERT INTO `comment` (`idx`,`content`,`date`) VALUES(NULL, '{$_POST['action']}',NOW());";
				break;
			case 'upadate':
				$sql="UPDATE `comment` set `content` = '{$_POST['action']}' WHERE `board` idx={$_POST['action']};";
				break;
			case 'delete':
				$sql = "DELETE FROM `comment` WHERE `comment` idx = {$_POST['action']}";
				break;
		}
		$db->query($sql);
		echo "<script>alert('완료되었습니다');location.replace('./')</script>";
	}

	$type = isset($_GET['type']) ? $_GET['type'] : 'list';
	include_once("./{$type}.php");
 ?>


</body>
</html>