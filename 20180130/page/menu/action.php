<?php 
	extract($_POST);
	$url="";
	switch($action){
		case 'reserve_insert':
			$data = $db->query("SELECT * FROM data where product='{$product}'")->fetch();
			$price = $data['price']*$quantity;
			$sql = "
					INSERT INTO reserve SET
					 name='{$member_info['name']}'
					,product='{$product}'
					,address='{$address}'
					,quantity='{$quantity}'
					,state='불확정'
					,price='{$price}'
					,saleprice='{$saleprice}'
					,rdate=now();
					update data set quantity=quantity-{$quantity} where product='{$product}';
			 ";
			 $msg = "결제가 완료되었습니다.";
			 $url = "./";
		break;

		case 'review':
		if(!isset($gpa)) $gpa = 0;
		$sql ="INSERT INTO review SET
						 didx='{$idx}'
						,id='{$member_info['id']}'
						,title='{$title}'
						,gpa='{$gpa}'
						,txt='{$txt}'
						,date=now();";
			$msg = "리뷰가 등록되었습니다.";
			$url = "./?type=menu&page=view&idx={$idx}&product={$product}";
			break;
	}
	if($db->query($sql)){
		alert($msg);
		move($url);
	} else {
		echo $sql;
		echo "<pre>";
		print_r($db->errorInfo());
		echo "</pre>";
	}
 ?>