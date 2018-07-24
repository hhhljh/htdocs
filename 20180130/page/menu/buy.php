<?php 
	$data_info= $db->query("SELECT * FROM data where product='{$product}'")->fetch();
	access($is_member,"로그인 후 이용해주세요.","./?type=member&page=login");
	access($data_info['quantity'] >= $quantity,"재고 수량이 부족합니다.");
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
<form action="" method="post">
	<input type="hidden" name="action" value="reserve_insert">
	<div class="cart">
			<h2>주문서 작성</h2>
			<table border="0" cellspacing="0">
				<tr>
					<th class="last"><input type="checkbox" id="itemcheck" name="itemcheck"></th>
					<th class="last">상품이미지</th>
					<th class="last">상품명</th>
					<th class="last">상품금액</th>
					<th class="last">수량</th>
				</tr>
				<tr>
					<td><input type="checkbox" id="itemcheck" name="itemcheck"></td>
					<td><img src="./img/<?php echo $data_info['img'] ?>.jpg" alt="<?php echo $data_info['product'] ?>" title="<?php echo $data_info['product'] ?>"></td>
					<td><span id="proname"><?php echo $data_info['product'] ?></span></td>
					<td><?php echo number_format($data_info['price']) ?>원</td> 
					<td><?php echo $quantity?>개</td>
				</tr>
			</table>
	</div>
	
	<div class="buy">		
		<h3>주문자 정보</h3>
		<table cellspacing="0" cellpadding="0" id="infos">
			<tr>
				<th class="first">주문자</th>
				<td><?php echo $member_info['name'] ?></td>
			</tr>
			<tr>
				<th>주소</th>
				<td><input type="text" id="address" name="address" placeholder="주소를 입력하여 주십시오"></td>
			</tr>
		</table>
	</div>
	
	<div class="buy">		
		<h3>결제 정보</h3>
		<table cellspacing="0" cellpadding="0">
			<tr>
				<th class="first">상품금액</th>
				<td><?php echo number_format($data_info['price']*$quantity) ?>원</td>
				<td rowspan="3" id="lasts">
					최종 결제 금액 : <span><?php echo number_format($data_info['price']*$quantity-$ratio)?>원</span>
					<button type="submit">결제하기</button>
				</td>
			</tr>
			<tr>
				<th>할인 금액</th>
				<td><?php echo number_format($quantity*$ratio) ?>원</td>
			</tr>
			<tr>
				<th class="first">쿠폰</th>
				<td class="first">
					보유 쿠폰 : 0장 <button type="button" id="cuponok">쿠폰적용</button>
				</td>
			</tr>
		</table>
	</div>
</form>
<?php
?>