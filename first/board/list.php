<style>
ul, li{list-style:none;}
li{margin:0;}
h2{margin:0 30px;}

</style>
<?php
	$list = $db->query("SELECT * FROM board where cidx='{$cidx}' order by idx desc")->fetchAll();
?>
<h2><?php echo $category_info['name'] ?></h2>
<?php if($category_info['type'] == 'gallery'){ ?>
<br>
<ul>
	<?php
		foreach($list as $data){
			$image = "사진이 없습니다.";
			if($data['file'] != ''){
				$image = '<img src="./data/'.$data['file_name'].'" alt="'.$data['file'].'" width="350">';
			}
	?>
	<li>
		<a href="./?type=board&amp;page=view&amp;idx=<?php echo $data['idx']?>&amp;cidx=<?php echo $cidx?>">
			<div class="img_wrap"><?php echo $image?></div>
			<div class="subject"><?php echo $data['subject']?></div>
			<div class="date"><?php echo $data['date']?></div>
		</a>
	</li>
	<br>
	<?php
		}
	?>
</ul>
<?php } else { ?>
<table width="100%" border="2">
	<colgroup>
		<col width="10%">
		<col width="60%">
		<col width="15%">
	</colgroup>
	<thead>
		<tr>
			<th>번호</th>
			<th>제목</th>
			<th>작성일</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		foreach ($list as $data) {
		 ?>
		 <tr>
		 	<td><?php  echo $data['idx'];?></td>
		 	<td><a href="./?type=board&amp;page=view&amp;idx=<?php echo $data['idx']?>&amp;cidx=<?php echo $cidx?>"><?php  echo $data['subject'];?></td>
		 	<td><?php  echo $data['date'];?></td>
		 </tr>
		 <?php } ?>
	</tbody>
</table>
<?php } ?>
<?php if ($is_member && ($category_info['lv'] <= $member_info['lv'])){ ?>
	<a href="./?type=board&amp;page=write&amp;cidx=<?php echo $cidx?>">글 작성</a>
<?php } ?>
