<?php 
	session_start();
	$db = new PDO("mysql:host=127.0.0.1;dbname=first;charset=utf8;","root","");
	$is_member = isset($_SESSION['member']);
	$type = isset($_GET['type'])? $_GET['type'] : 'board';
	$page = isset($_GET['page'])? $_GET['page'] : 'list';
	$idx = isset($_GET['idx'])? $_GET['idx'] : NULL;
	$cidx = isset($_GET['cidx']) ? $_GET['cidx'] : 0;
	$category_info = $db->query("SELECT * FROM category where idx='{$cidx}'")->fetch();

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Main Page</title>
 </head>
 <body>
 	<br>
 	<?php
 		$category_list = $db->query("SELECT * FROM category")->fetchAll();
 		foreach($category_list as $category){
 	?>
 	<a href="./?type=board&amp;page=list&amp;cidx=<?php echo $category['idx']?>"><?php echo $category['name']?></a>

 	<?php
 		}
 	?>
 	<?php if($is_member): ?>
 		<a href="./?type=member&amp;page=logOut">로그아웃</a>

 	<?php else: ?>
 		<a href="./?type=member&amp;page=logIn">로그인</a>
 		<a href="./?type=member&amp;page=signUp">회원가입</a>
 	<?php endif ?>

 	<br>
 	<hr size="5" align="center" color="black" noshade>

 	<?php
 		if(isset($_POST['action'])){
 			include_once("./{$type}/action.php");
 			exit;
 		}
 		include_once("./{$type}/{$page}.php");
 	?>
 </body>
 </html>