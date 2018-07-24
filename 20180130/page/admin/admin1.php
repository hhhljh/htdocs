<?php 
	 $reserve_check = $db->query("SELECT * FROM reserve order by idx desc")->fetchAll();
	 if(isset($idx)){
	 	$state = $_GET['state'] == 1 ? "구매확정" : "불확정";
	 	$sql = "UPDATE reserve SET state = '{$state}' where idx='{$idx}'";
	 	if($db->query($sql)){
	 		alert("완료되었습니다.");
	 		move("./?type=admin&page=admin1");
	 	} else {
	 		echo $sql;
	 		echo "<pre>";
	 		print_r($db->errorInfo());
	 		echo "</pre>";
	 	}
	 	exit;
	 }
 ?>
<form action="" method="post" name="adminFrm">
	<input type="hidden" name="action" value="check">
	<input type="hidden" name="idx" value="">
	<input type="hidden" name="state" value="">
</form>
<div id="c1">
	<div class="box">
		<h2>주문처리</h2>
		<div class="reserved">
			<table cellspacing="0" cellpadding="0">
				<tr>
					<th>주문자</th>
					<th>주문자 주소</th>
					<th>상품명</th>
					<th>상품수량</th>
					<th>상품가격</th>
					<th>할인 후 금액</th>
					<th>구매상태</th>
					<th>구매확정</th>
				</tr>
				<?php foreach ($reserve_check as $key => $data):
						$state = 1;
						if($data['state'] == '구매확정') $state = 2;
				?>
					
				<tr>
					<td><?php echo $data['name'] ?></td>
					<td><?php echo $data['address'] ?></td>
					<td><?php echo $data['product'] ?></td>
					<td><?php echo $data['quantity'] ?>개</td>
					<td><?php echo number_format($data['price']) ?>원</td>
					<td><?php echo number_format($data['saleprice']) ?>원</td>
					<td><?php echo $data['state'] ?></td>
					<td>
					<button
						type="button"
						onclick="adminFrm.idx.value = '<?php echo $data['idx']?>'; adminFrm.submit();">
						<?php echo $data['state'] == '구매확정' ? '불확정처리' : '확정처리';?>	
						</button>
					</td>
				</tr>
				<?php endforeach ?>
			</table>
		</div>
		
	</div>
</div>