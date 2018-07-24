	<div id="c1">
		<div class="box">
			<h2>판매현황보기</h2>
			
			<div id="chart">
				<div id="first">
					<h3 style="text-align:center;margin:10px;font-weight:lighter;">연령별 최다 구매 상품 차트</h3>
					<img src="./chart.php?rand=<?php echo time()?>" alt="chart">
				</div>
				<div id="second"></div>
			</div>
			
			<div class="teenager">
				<h2>지역별 10대가 가장 많이 구매한 상품</h2>
				<table cellspacing="0" cellpadding="0">
					<tr>
						<th>상품명</th>
						<th>상품이미지</th>
						<th>상품금액</th>
						<th>조회수</th>
						<th>지역</th>
					</tr>
					<?php
						$add_sql = " order by q_sum desc";
						$sql = "SELECT * FROM data_age_group
								WHERE age2 = '10'
								{$add_sql}";
						$list = $db->query($sql)->fetchAll();
						foreach($list as $data){
					 ?>
					<tr>
						<td><?php echo $data['product'] ?></td>
						<td><img src="./img/<?php echo $data['img'] ?>.jpg" alt="<?php echo $data['product'] ?>" title="<?php echo $data['product'] ?>"></td>
						<td><span id="proname"><?php echo number_format($data['price']) ?>원</span></td>
						<td><?php echo $data['hit'] ?></td> 
						<td>충청남도</td> 
					</tr>
					<?php } ?>
				</table>
			
		</div>
	</div>
		</div>