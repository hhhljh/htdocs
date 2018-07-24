<?php
	define("ROOT_PATH",__DIR__);
	include_once("./config/setting.php")
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Main</title>
</head>
<body>
	<?php 
		$category_list = $db->query("SELECT *FROM category")->fetchAll();
		foreach ($category_list as $category) {
	 ?>
	 <a href="./?type=board&amp;page=list&amp;cidx=<?php echo $category['idx'] ?>"><?php echo $category['name']?></a>
	 <?php 
		}
	  ?>
	  <?php if($is_member): ?>
	  	<a href="./?type=member&amp;page=logOut">로그아웃</a>
	  <?php else: ?>
	  	<a href="./?type=member&amp;page=logIn">로그인</a>
	  	<a href="./?type=member&amp;page=signUp">회원가입</a>
	  <?php endif ?>
	
	<hr size="5" color="gray" noshade>

	<?php 
	if (isset($_POST['action'])) {
		include_once("./{$type}/action.php");
		exit; 
	}
	include_once("./{$type}/{$page}.php");
	 ?>
	
	<hr size="5" color="gray" noshade>
	<p>Copyright (C) 2018 강지형 all rigth reserved.</p>
</body>
</html>