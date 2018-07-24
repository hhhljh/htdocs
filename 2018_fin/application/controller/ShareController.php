<?php
	class ShareController extends Controller {

		function inInsert(){
			$this->model->inInsert($this->param->idx, $this->memberInfo->idx);
		}

		function outInsert(){
			$this->model->outInsert($this->param->idx, $this->memberInfo->idx);
		}

		function in_list(){
			if(!$this->is_member){
				alert("회원만 접근가능합니다.");
				move();
			}
			$this->list = $this->model->getInList();
			$this->allShare = $this->model->getAllShare("in_list");
			$this->myShare = $this->model->getMyShare("in_list",$this->memberInfo->idx);
		}

		function out_list(){
			$this->list = $this->model->getOutList();
			$this->allShare = $this->model->getAllShare("out_list");
			$this->myShare = $this->is_member ? $this->model->getMyShare("out_list",$this->memberInfo->idx) : 0;
		}

		function inShare(){
			$this->model->query("UPDATE in_list SET down = down + 1 where idx = '{$this->param->idx}'");
			$data = $this->model->fetch("SELECT f.* FROM in_list i JOIN file f ON f.idx = i.fidx where i.idx = '{$this->param->idx}'");
			download($data);
		}

		static function outShare(){
			$model = new ShareModel([]);
			$model->query("UPDATE out_list SET down = down + 1 where ukey = '{$_GET['q']}'");
			$data = $model->fetch("SELECT f.* FROM out_list o JOIN file f ON f.idx = o.fidx where o.ukey = '{$_GET['q']}'");
			download($data);
		}
	}