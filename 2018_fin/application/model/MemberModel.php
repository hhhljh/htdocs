<?php
	class MemberModel extends Model {

		 function getMemberList(){
		 	return $this->fetchAll("SELECT * FROM member");
		 }

		 function getMember($idx){
		 	return $this->fetch("SELECT * FROM member where idx = '{$idx}'");
		 }

		 function memberDelete($idx){
		 	$list = $this->fetchAll("SELECT * FROM file where midx = '{$idx}'");
		 	$this->query("DELETE FROM member where idx = '{$idx}'");
		 	$this->query("DELETE FROM file where midx = '{$idx}'");
		 	foreach ($list as $data) {
			 	$this->query("DELETE FROM in_list where midx = '{$idx}' or fidx = '{$data->idx}'");
			 	$this->query("DELETE FROM out_list where midx = '{$idx}' or fidx = '{$data->idx}'");
			 	@unlink(DATA_PATH."/{$data->change_name}");
		 	}
		 	alert("삭제되었습니다.");
		 	move("/member");
		 }

		 function action(){
		 	extract($_POST);
		 	switch ($action) {
		 		case 'insert':
		 			$cnt = $this->cnt("SELECT * FROM member where id = '{$id}'");
		 			access($cnt == 0, "아이디가 중복되었습니다.");
		 			access(preg_match("/^.*(?=^.{2,15}$)(?=.*\w)(?=.*[!@#$%^&+=]).*$/", $pw),"비밀번호 형식에 맞지 않습니다.");
		 			$pw = hash("sha256",$pw.$id);
		 			$level = $level == "관리자" ? 10 : 1;
		 			$this->query("INSERT INTO member SET name = '{$name}', id = '{$id}', pw = '{$pw}', level = '{$level}'");
		 			alert("추가되었습니다.");
		 			move("/member");
		 			break;

		 		case 'update':
		 			$cnt = $this->cnt("SELECT * FROM member where id = '{$id}' and idx != '{$this->cr->param->idx}'");
		 			access($cnt == 0, "아이디가 중복되었습니다.");
		 			$level = $level == "관리자" ? 10 : 1;
		 			if(empty($pw)) $this->query("UPDATE member SET name = '{$name}', id = '{$id}', level = '{$level}' where idx = '{$this->cr->param->idx}'");
		 			else {
		 				$pw = hash("sha256",$pw.$id);
		 				$this->query("INSERT INTO member SET name = '{$name}', id = '{$id}', pw = '{$pw}', level = '{$level}'");
		 			}
		 			alert("수정되었습니다.");
		 			move("/member");
		 			break;
		 	}
		 }
	}