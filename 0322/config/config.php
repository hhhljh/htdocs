<?php 
	 session_start();

	 define("ROOT_PATH",dirname(__DIR__));
	 define("VIEW_PATH",ROOT_PATH."/view");
	 define("DATA_PATH",ROOT_PATH."/data");

	 define("HOME_URL","/0322");

	 $param= null;
	 if(isset($_GET['param'])) $param = explode("/",$_GET['param']);
	 $type = isset($param[0]) && $param[0] != '' ? $param[0] : 'login';
	 $action = isset($param[1]) ? $param[1] :NULL;
	 $idx = isset($param[2]) ? $param[2] : NULL; // 이부분인데 이렇게 주소에서 잘라서 받아오는 부분인데
	 //$idx = isset($param[2]) ? $param[1] : NULL; <== 이렇게 되어 있었어 그래서 오류가 났던거고
	 $path = isset($_GET['path']) ? $_GET['path'] : 0;

	 $include_file = isset($action) ? $action : $type;
	 $is_member = isset($_SESSION['member']);0
	 $member = $is_member ? $_SESSION['member'] : NULL;


 ?>