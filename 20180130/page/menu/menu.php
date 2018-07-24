		<!-- 각 카테고리별 메뉴 4개 -->
		<div id="menu1" class="item">
		<h2><?php echo $category?> BEST</h2>
		<ul>
			<li><a href="./?type=menu&amp;page=menu&amp;category=<?php echo urlencode($category)?>&order_by=1">인기순</a></li>
			<li><a href="./?type=menu&amp;page=menu&amp;category=<?php echo urlencode($category)?>&order_by=2">판매순</a></li>
			<li><a href="./?type=menu&amp;page=menu&amp;category=<?php echo urlencode($category)?>&order_by=3">가격순</a></li>
		</ul>
		<a href="#">더보기</a>
			<ul>
				<?php
					$add_sql = "";
					switch($order_by){
						case '1' :
							$add_sql = " order by hit desc";
						break;
						case '2' :
							$add_sql = " order by quantity_sum desc";
						break;
						case '3' :
							$add_sql = " order by price desc";
						break;
					}
					$sql = "
						SELECT 	* from data_detail
						where 	category = '{$category}'
						{$add_sql}
					";
					$list = $db->query($sql)->fetchAll();
					foreach($list as $data){
				?>
				<li>
					<img src="./img/<?php echo $data['img']?>.jpg" alt="<?php echo $data['product']?>" title="<?php echo $data['product']?>">
					<div>
						<a href="./?type=menu&amp;page=view&amp;idx=<?php echo $data['idx'] ?>&amp;product=<?php echo $data['product']
						 ?>">
						 <span><?php echo $data['product']?>
						 <?php if($data['quantity']==0){ ?>
						 <img src="./img/soldout.png" alt="soldout" width="23" height="23">
						 <?php } else {}?>	
						 </span></a>
						<div class="info"><?php echo $data['shortinfo']?></div>
						<h3><?php echo number_format($data['price'])?>원</h3>
					</div>
				</li>
				<?php } ?>
			</ul>
		</div>