<?php
	class Controller {
		var $param;
		var $include_file;
		var $model;
		
		function __construct(){
			$this->setParam();
			$this->setModel();
			$this->action();
			$this->index();
		}

		function setParam(){
			$getParam = null;
			if(isset($_GET['param'])) $getParam = explode("/",$_GET['param']);
			$param['type'] = isset($getParam[0]) && $getParam[0] != '' ? $getParam[0] : "login";
			$param['action'] = isset($getParam[1]) && $getParam[1] != '' ? $getParam[1] : null;
			$param['idx'] = isset($getParam[2]) && $getParam[2] != '' ? $getParam[2] : null;
			$this->include_file = isset($param['action']) && $param['action'] != '' ? $param['action'] : $param['type'];
			$this->is_member = isset($_SESSION['member']);
			$this->memberInfo = $this->is_member ? $_SESSION['member'] : null;
			$this->param = (Object)$param;
		}

		function setModel(){
			$model = ucfirst($this->param->type)."Model";
			$this->model = new $model($this);
		}

		function action(){
			if(isset($_POST['action'])){
				$this->model->action();
			}
			if(method_exists($this,$this->include_file)){
				$method = $this->include_file;
				$this->$method();
			}
		}

		function index(){
			$this_arr = (Array)$this;
			extract($this_arr);
			include_once(VIEW_PATH."/template/header.php");
			if($param->type != 'login') include_once(VIEW_PATH."/template/nav.php");
			include_once(VIEW_PATH."/{$param->type}/{$include_file}.php");
			include_once(VIEW_PATH."/template/footer.php");
		}
	} 