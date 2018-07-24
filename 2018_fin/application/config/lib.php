<?php
	session_start();

	function alert($msg){
		echo "<script>alert('{$msg}')</script>";
	}

	function move($url = false){
		echo "<script>";
			echo $url ? "location.replace('{$url}')" : "history.back()"; 
		echo "</script>";
		exit;
	}

	function access($bool, $msg, $url = false){
		if(!$bool){
			alert($msg);
			move($url);
		}
	}

	function __autoload($classname){
		switch ($classname) {
			case 'Application':
			case 'Controller':
			case 'Model':
				$classpath = CORE_PATH."/{$classname}";
				break;
			default:
				$classpath = preg_replace("/(.*)(Controller|Model)/","$2",$classname);
				$classpath = strtolower($classpath);
				$classpath = APP_PATH."/{$classpath}/{$classname}";
				break;
		}
		include_once("{$classpath}.php");
	}

	function upload($file){
		if(is_uploaded_file($file['tmp_name'])){
			$ext = explode(".",$file['name']);
			$ext = array_pop($ext);
			$change_name = time()."_".rand(0,9999).".{$ext}";
			if(!move_uploaded_file($file['tmp_name'],DATA_PATH."/{$change_name}")){
				echo "<pre>";
				print_r($file);
				echo "</pre>";
				exit;
			} else {
				return $change_name;
			}
		} else {
			return null;
		}
	}

	function download($data){
		$path = DATA_PATH."/{$data->change_name}";
		header("Pragma:public");
		header("Expires:0");
		header("Content-Type:application/octet-stream");
		header("Content-Disposition:attachment;filename=\"{$data->name}\"");
		header("Content-Length:{$data->size}");
		header("Content-Transfer-Encoding:binary");
		ob_clean();
		flush();
		readfile($path);
	}

	function getMb($size){
		$size /= 1024*1024;
		if($size >= 1){
			$size = number_format($size);
		} else {
			$size = floor($size*1000)/1000;
		}
		return $size."MB";
	}
