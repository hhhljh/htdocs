	<!-- visual -->
	<div id="visual">
		
		<div id="visualbox">
			<img src="./img/visual.png" alt="visual" title="visual">
		</div>
	</div>
	
	<!-- contents -->
	<div id="contents">
		<div id="best">
			<!-- 카테고리 베스트 -->
			<h2>추천 상품</h2>
			<ul class="icons">
				<li><img src="./img/icon1.png" alt="icon" title="icon"></li>
				<li><img src="./img/icon2.png" alt="icon" title="icon"></li>
				<li><img src="./img/icon3.png" alt="icon" title="icon"></li>
				<li><img src="./img/icon4.png" alt="icon" title="icon"></li>
			</ul>
			<ul>
				<?php
					if($is_member){
						$age_group = floor($member_info['age']/10)*10;
						$add_sql = " where age2='{$age_group}'";
						$sql = "
							SELECT 	* from data_age_group {$add_sql} order by q_sum desc limit 4
						";
					} else {
						$sql = "
							SELECT 	* from data_detail order by quantity_sum desc limit 4
						";
					}
					$list = $db->query($sql)->fetchAll();
					foreach($list as $data){
				?>
				<li>
					<img src="./img/<?php echo $data['img']?>.jpg" alt="<?php echo $data['product']?>" title="<?php echo $data['product']?>">
					<div>
						<a href="./?type=menu&amp;page=view&amp;product=<?php echo $data['product']
						 ?>"><span><?php echo $data['product']?> <?php if($data['quantity']==0){ ?>
						 <img src="./img/soldout.png" alt="soldout" width="23" height="23">
						 <?php } else {}?>	</span></a>
						<div class="info"><?php echo $data['shortinfo']?></div>
						<h3><?php echo number_format($data['price'])?>원</h3>
					</div>
				</li>
				<?php } ?>
			</ul>
		</div>
		<?php
			foreach($category_list as $category_data){
		?>
		<div class="item">
			<h2><?php echo $category_data['category']?> BEST</h2>
			<a href="./?type=menu&amp;page=menu&amp;category=<?php echo urlencode($category_data['category'])?>">더보기</a>
			<ul>
				<?php	
					$sql = "
						SELECT 	* from data_detail where category='{$category_data['category']}' order by quantity_sum desc limit 4
					";
					$list = $db->query($sql)->fetchAll();
					foreach($list as $data){
				?>
				<li>
					<img src="./img/<?php echo $data['img']?>.jpg" alt="<?php echo $data['product']?>" title="<?php echo $data['product']?>">
					<div>
						<a href="./?type=menu&amp;page=view&amp;product=<?php echo $data['product']
						 ?>"><span><?php echo $data['product']?> <?php if($data['quantity']==0){ ?>
						 <img src="./img/soldout.png" alt="soldout" width="23" height="23">
						 <?php } else {}?>	</span></a>
						<div class="info"><?php echo $data['shortinfo']?></div>
						<h3><?php echo number_format($data['price'])?>원</h3>
					</div>
				</li>
				<?php
					}
				?>
			</ul>
		</div>
		<?php
			}
		?>

	</div>