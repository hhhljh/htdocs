<?php 
	$list = fetchAll("SELECT * FROM member order by idx asc");
 ?>
<h3>회원목록</h3>
<table width="100%" border="1">
	<colgroup>
		<col width="10%">
		<col width="18%">
		<col width="18%">
		<col width="18%">
		<col width="18%">
		<col width="18%">
	</colgroup>
	<thead>
		<tr>
			<th>순번</th>
			<th>아이디</th>
			<th>이름</th>
			<th>회원구분</th>
			<th>암호</th>
			<th>기능(수정, 삭제)</th>
		</tr>
	</thead>
	<tbody>
		<?php  foreach ($list as $key => $data) { ?>
		<tr>
			<td><?php echo $data->idx ?></td>
			<td><?php echo $data->id ?></td>
			<td><?php echo $data->name ?></td>
			<td><?php echo $data->level ==10 ? "관리자" : "일반회원" ?></td>
			<td><?php echo $data->pw ?></td>
			<td>
				<button type="button" onclick="location.href= '<?php echo HOME_URL ?>/member/update/<?php echo $data->idx ?>'; return false;">수정</button>
				<!-- 이렇게 ?idx= 으로 하면 $_GET['idx']로 받아오고
				/<?php echo $data->idx?>로 하면 $idx로 받아오게돼 
				그래서 -->
				<button type="button" onclick="location.href= '<?php echo HOME_URL ?>/member/update/<?php echo $data->idx ?>'; return false;">삭제</button>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<button type="button" onclick="location.href='<?php echo HOME_URL ?>/member/add'">회원추가</button>