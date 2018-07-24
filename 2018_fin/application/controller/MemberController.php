<?php
	class MemberController extends Controller {
		
		function member(){
			if(!$this->is_member || $this->memberInfo->level != 10){
				alert("관리자만 접근가능합니다.");
				move();
			}
			$this->list = $this->model->getMemberList();
		}

		function update(){
			$this->data = $this->model->getMember($this->param->idx);
		}

		function delete(){
			$this->model->memberDelete($this->param->idx);
		}
	}