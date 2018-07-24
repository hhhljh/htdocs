<?php
	$db->query("UPDATE data SET hit=hit+1 WHERE product='{$product}'");
	$data_info= $db->query("SELECT * FROM data where product='{$product}'")->fetch();
	if($is_member){
		if(!isset($_SESSION['latest']))
			$_SESSION['latest'] = [];
		$size = sizeof($_SESSION['latest']);
		if($size == 0 || $_SESSION['latest'][$size-1]['product'] != $data_info['product']){
			$_SESSION['latest'][$size] = $data_info;
		}
	}
	$review_list= $db->query("SELECT * FROM review WHERE didx='{$idx}' order by idx desc")->fetchAll();
	$review_count = $db->query("SELECT * FROM review WHERE didx='{$idx}'")->rowCount();
	$review_count_member = $db->query("SELECT * FROM review WHERE didx='{$idx}' and id='{$member_info['id']}'")->rowCount();
	$review_gpa = $db->query("SELECT avg(gpa) as gpa FROM review WHERE didx='{$idx}' and gpa != 0")->fetch()['gpa'];
	$buy_list = $db->query("SELECT idx FROM reserve where product='{$product}' and name='{$member_info['name']}'")->rowCount();
	$ratio = 0;
	if($is_member){
		if($member_info['level']=='브론즈'){
			$ratio = $data_info['price'] * 0.05;
		} else if($member_info['level']=='실버'){
			$ratio = $data_info['price'] * 0.1;
		} else if($member_info['level']=='골드'){
			$ratio = $data_info['price'] * 0.15;
		} else if($member_info['level']=='VIP'){
			$ratio = $data_info['price'] * 0.2;
		}
	}
?>
<form action="" method="get">
	<input type="hidden" name="type" value="menu">
	<input type="hidden" name="page" value="buy">
	<input type="hidden" name="product" value="<?php echo urlencode($product)?>">
	<div class="view">
			<img src="./img/<?php echo $data_info['img'] ?>.jpg" alt="<?php echo $data_info['product'] ?>" title="<?php echo $data_info['product'] ?>">
			<div class="proview">
				<h3><?php echo $data_info['product'] ?></h3>
				<div class="info">
					<?php echo $data_info['longinfo'] ?>
				</div>
				
				<h4>재고 : <span class="quantity"><?php echo $data_info['quantity'] ?></span>개</h4>
				<h4>판매가 : <span class="prices"><?php echo number_format($data_info['price']) ?></span>원</h4>
				<?php if($is_member){ ?>
				<h4>할인될 가격 : <span class="sale"><?php echo number_format($ratio)?></span>원</h4>
				<?php } ?>
				<div class="totalBox">
					<div class="title"><?php echo $data_info['product'] ?></div>
					<div class="quantity">
						<input type="text" value="1" id="quantity" name="quantity">
						<div>
							<button class="up" type="button">▲</button>
							<button class="down" type="button">▼</button>
						</div>
					</div>
				</div>
			</div>
			
			<div class="total">
				<span class="left">총 상품 금액(수량)</span>
				<span class="right" id="totalPrice"><?php echo number_format($data_info['price'] - $ratio) ?>원(1개)</span>
				
				<div id="carts">
					<button type="submit" id="buy">BUY NOW</button>
					<button type="button" id="gocart">CART</button>
				</div>
			</div>
	</div>
</form>
	
	<!-- 사용후기 -->
	<div id="review">
		<h3>REVIEW</h3>
			<?php if($is_member && $buy_list >= 1){ ?>
			<form action="" method="post">
				<input type="hidden" name="action" value="review">
				<div>
					<h4>제목</h4><input type="title" id="title" name="title">
							<?php if($review_count_member < 1){ ?>
							<h4>평점</h4>
							<select name="gpa" id="gpa">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select>
							<?php } ?>
				</div>
				<textarea name="txt" id="txt" placeholder="구매후기 : "></textarea>
				<button type="submit" id="applyBtn">리뷰 등록하기</button>
			</form>
			<?php } else{} ?>
		<h3>최신순 리뷰(<?php echo $review_count ?>개) / 상품 평점 - <?php echo round($review_gpa*100)/100?>점</h3>
		<ul>
			<?php foreach ($review_list as $key => $review_data): ?>
			<li>
				<h4><?php echo $review_data['title']?>
					<?php if ($review_data['gpa'] != 0): ?>
					<span class="star">- 평점 : <?php echo $review_data['gpa'] ?>점</span>
					<?php endif ?>
				</h4>
				<div class="texts"><?php echo $review_data['txt'] ?></div>
				<div id="reinfo">
					<div class="writer">
						<span class="retitle">작성자</span><br>
						<span><?php echo $review_data['id'] ?></span>
					</div>
					<div class="wdate">
						<span class="retitle">작성일</span><br>
						<span><?php echo $review_data['date'] ?></span>
					</div>
				</div>
			</li>
			<?php endforeach ?>
		</ul>
	</div>
