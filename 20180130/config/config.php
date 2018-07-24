<?php
	session_start();
	$db = new PDO("mysql:host=127.0.0.1;dbname=20180130;charset=utf8","root","");

	

	$tables = $db->query("SHOW TABLES")->fetchAll();
	$tables_arr = [];
	foreach($tables as $table){
		$tables_arr[] = $table['Tables_in_20180130'];
	}
	if(!in_array("data",$tables_arr)){
		$data = file_get_contents("./config/data.json");
		$data = json_decode($data);
		$sql = "
			CREATE TABLE `data` (
			  `idx` int(11) NOT NULL AUTO_INCREMENT,
			  `product` varchar(255) NOT NULL,
			  `price` int(11) NOT NULL,
			  `img` varchar(255) NOT NULL,
			  `longinfo` text NOT NULL,
			  `shortinfo` varchar(255) NOT NULL,
			  `quantity` int(11) NOT NULL,
			  `category` varchar(255) NOT NULL,
			  `hit` int(11) NOT NULL,
			  primary key(idx)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;\n
		";
		foreach($data[0]->data as $list){
			$sql .= "INSERT INTO data SET
				product = '{$list->product}',
				price = '{$list->price}',
				img = '{$list->img}',
				longinfo = '{$list->longinfo}',
				shortinfo = '{$list->shortinfo}',
				quantity = '{$list->quantity}',
				category = '{$list->category}',
				hit = '{$list->hit}';\n
			";
		}
		if($db->query($sql)){
			echo "data table이 생성되었습니다.";
		}
	}
	if(!in_array("member",$tables_arr)){
		$member = file_get_contents("./config/member.json");
		$member = json_decode($member);
		$sql = "
			CREATE TABLE `member` (
			  `idx` int(11) NOT NULL AUTO_INCREMENT,
			  `name` varchar(255) NOT NULL,
			  `id` varchar(255) NOT NULL,
			  `pw` varchar(255) NOT NULL,
			  `age` int(11) NOT NULL,
			  `area` varchar(255) NOT NULL,
			  `level` varchar(255) NOT NULL,
			  primary key (idx)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		";
		foreach($member[0]->data as $list){
			$sql .= "INSERT INTO member SET
				name = '{$list->name}',
				id = '{$list->id}',
				pw = '{$list->pw}',
				age = '{$list->age}',
				area = '{$list->area}',
				level = '{$list->level}';\n
			";
		}
		if($db->query($sql)){
			echo "member table이 생성되었습니다.";
		}		
	}
	if(!in_array("reserve",$tables_arr)){
		$reserve = file_get_contents("./config/reserve.json");
		$reserve = json_decode($reserve);
		$sql = "
			CREATE TABLE `reserve` (
			  `idx` int(11) NOT NULL AUTO_INCREMENT,
			  `name` varchar(255) NOT NULL,
			  `product` varchar(255) NOT NULL,
			  `state` varchar(255) NOT NULL,
			  `rdate` date NOT NULL,
			  `quantity` int(11) NOT NULL,
			  `address` varchar(255) NOT NULL,
			  `price` int(11) NOT NULL,
			  `saleprice` int(11) NOT NULL,
			  `okdate` date NOT NULL,
			  primary key (idx)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		";
		foreach($reserve[0]->data as $list){
			$sql .= "INSERT INTO reserve SET
				name = '{$list->name}',
				product = '{$list->product}',
				state = '{$list->state}',
				rdate = '{$list->rdate}',
				quantity = '{$list->quantity}',
				address = '{$list->address}',
				price = '{$list->price}',
				saleprice = '{$list->saleprice}',
				okdate = '{$list->okdate}';\n
			";
		}
		if($db->query($sql)){
			echo "reserve table이 생성되었습니다.";
		}
	}


	$type = isset($_GET['type']) ? $_GET['type'] : NULL;
	$page = isset($_GET['page']) ? $_GET['page'] : NULL;
	$idx = isset($_GET['idx']) ? $_GET['idx'] : NULL;
	$member = isset($_GET['member']) ? $_GET['member'] : NULL;
	$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : NULL;
	$category = isset($_GET['category']) ? urldecode($_GET['category']) : NULL;
	$product = isset($_GET['product']) ? urldecode($_GET['product']) : NULL;
	$order_by = isset($_GET['order_by']) ? ($_GET['order_by']) : NULL;
	$is_member = isset($_SESSION['member']);
	$member_info = $is_member ? $_SESSION['member'] : NULL;
	$latest = isset($_SESSION['latest']) ? $_SESSION['latest'] : NULL;
	$category_list = $db->query("SELECT category FROM data group by category")->fetchAll();
	$category_info = $db->query("SELECT * FROM category WHERE type='{$category}'")->fetch();
	$data = isset($_GET['data']) ? $_GET['data'] : NULL;
	$reserve = isset($_GET['reserve']) ?  $_GET['reserve'] : NULL;
	$reserve_info = $db->query("SELECT * FROM reserve")->fetch();
	$reserve_list = $db->query("SELECT * FROM reserve group by name")->fetchAll();
	$review = isset($_GET['review']) ? $_GET['review'] : NULL;
	
	function alert($msg){
		echo "<script>alert('{$msg}')</script>";
	}

	function move($url = false){
		echo "<script>";
			echo $url ? "document.location.replace('{$url}')" : "history.back();";
		echo "</script>";
		exit;
	}

	function access($bool, $msg, $url = false){
		if(!$bool){
			alert($msg);
			move($url);
		}
	}