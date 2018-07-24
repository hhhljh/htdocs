<!DOCTYPE html>
<html lang="en">
<head>
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<title>제주 좋은 날</title>
	<link rel="stylesheet" href="./common/css/jquery-ui.min.css">
	<link rel="stylesheet" href="./common/css/css.css">
	<script src="./common/js/jquery-1.12.3.min.js"></script>
	<script src="./common/js/jquery-ui.min.js"></script>
	<script src="./common/js/script.js"></script>
</head>
<body>
<!-- header -->
<header>

	<div id="searchbox">
		<div id="logo"><a href="./"><img src="./img/logo.png" alt="logo" title="logo"></a></div>
		
		<!-- login / join -->
		<div id="loginbox">
			<ul>
				<?php if(!$is_member){ ?>
					<li><a href="./?type=member&amp;page=login">로그인</a></li>
					<li><a href="#">회원가입</a></li>
				<?php } else {?>
					<?php if($member_info['id']=='admin'){ ?>
					<li><a href="./?type=admin&amp;page=admin1">주문처리</a></li>
					<li><a href="./?type=admin&amp;page=admin2">판매현황보기</a></li>
					<li><a href="./?type=member&amp;page=logout">로그아웃</a></li>
					<?php } else{ ?>
					<li><a href="#">장바구니</a></li>
					<li><a href="#">마이페이지</a></li>
					<li><a href="./?type=member&amp;page=logout">로그아웃</a></li>
					<?php } ?>
				<?php } ?>
			</ul>
		</div>
	</div>
	
	<!-- nav -->
	<nav>
		<ul>
			<li><a href="./?type=menu&amp;page=menu&amp;category=<?php echo urlencode('식품/건강')?>">식품/건강</a></li>
			<li><a href="./?type=menu&amp;page=menu&amp;category=<?php echo urlencode('제과/차류')?>">제과/차류</a></li>
			<li><a href="./?type=menu&amp;page=menu&amp;category=<?php echo urlencode('뷰티/천연')?>">뷰티/천연</a></li>
			<li><a href="./?type=menu&amp;page=menu&amp;category=<?php echo urlencode('친환경')?>">친환경</a></li>
		</ul>
	</nav>
	
</header>
<div id="contents">