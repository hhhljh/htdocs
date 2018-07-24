</div>
<footer>
	<div>
		<img src="./img/logo.png" alt="logo" title="logo">
		<span>COPYRIGHT ⓒ 2017 제주 좋은 날. ALL RIGHTS RESERVED.</span>
	</div>
</footer>

<!-- 오른쪽 고정메뉴 -->
<div id="rightMenu">
	<div id="intro">제주 좋은 날에 오신 것을 환영합니다.</div>
	
	<?php if($is_member){ ?>
	<div id="rightLogin">
		환영합니다! <span><?php echo $member_info['name'] ?> 님</span><br>
		오늘도 즐거운 쇼핑되세요!<br>
	<?php if($member_info['id'] == 'admin'){ ?>
		<button type="button" id="gomypage" onclick="location.href='./?type=admin&amp;page=admin1'">주문처리</button>
		<button type="button" id="gomypage" onclick="location.href='./?type=admin&amp;page=admin2'">판매현황보기</button>
		<button type="button" id="logout" onclick="location.href='./?type=member&amp;page=logout'">로그아웃</button>
	<?php } else{ ?>
		<button type="button" id="gomypage">마이페이지</button>
		<button type="button" id="logout" onclick="location.href='./?type=member&amp;page=logout'">로그아웃</button>
	<?php } ?>	
	</div>
	<?php } else { ?>
	
	<form action="./?type=member&amp;page=login" method="post">
		<input type="hidden" name="action" value="login">
			<input type="text" id="id" name="id" placeholder="아이디">
			<input type="password" id="pw" name="pw" placeholder="비밀번호">
		<button type="submit">로그인</button>
	</form>
	<h3>최근 본 상품</h3>
	<?php
		}
		if($is_member){
	?>
	<?php			
		if($latest){
			$latest_reverse = array_reverse($_SESSION['latest']);
			echo "<ul>";
			foreach ($latest_reverse as $key => $latest_data){
				if($key > 2) break;
	?>
	<li>
		<img src="./img/<?php echo $latest_data['img']?>.jpg" alt="img" title="img">
		<h4><a href="./?type=menu&amp;page=view&amp;product=<?php echo urlencode($latest_data['product']) ?>"><?php echo $latest_data['product']?></a></h4>
	</li>		
	<?php
			}
			echo "</ul>";
		} else {
			echo "최근 본 상품이 없습니다.";
		}
	}
	?>
</div>
</body>
</html>