<style>ul, li{list-style:none;}</style>
<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="action" value="write">
	<ul>
		<li>
			<label> 제목 :
				<input type="text" name="subject">
			</label>
		</li>
		<li>
			<label> 내용 :
				<input type="text" name="content">
			</label>
		</li>
		<?php if($category_info['type'] == 'gallery'){ ?>
		<li>
			<label> 사진업로드 :
				<input type="file" name="file" accept="image/*">
			</label>
		</li>
		<?php } ?>
	</ul>
	<button type="submit">전송</button>
	<a href="./">취소</a>
</form>