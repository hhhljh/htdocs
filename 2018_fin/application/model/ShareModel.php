<?php
	class ShareModel extends Model {

		// 내부공유 리스트 추가
		function inInsert($fidx, $midx){
			$this->query("INSERT INTO in_list SET fidx = '{$fidx}', midx = '{$midx}', s_date = now()");
			alert("공유되었습니다.");
			move("/file?parent=".$_GET['parent']);
		}

		// 외부공유 리스트 추가
		function outInsert($fidx, $midx){
			$keycode = "123456789qazwesxcrtyuhnijmkolpAZWSXERTYUHNIJMOKPL";
			$len = strlen($keycode);
			while (1) {
				$ukey = "";
				for($i = 1; $i <= 4; $i++){
					$ukey .= $keycode[rand(0,$len -1)];
				}
				if(!preg_match("/[0-9]{1,2}[a-z]{1,2}[A-Z]{1,2}/",$ukey)) continue;
				$cnt = $this->cnt("SELECT * FROM out_list where ukey = '{$ukey}'");
				if($cnt == 0) break;
			}
			$this->query("INSERT INTO out_list SET fidx = '{$fidx}', midx = '{$midx}', s_date = now(), ukey = '{$ukey}'");
			alert("공유되었습니다.");
			move("/file?parent=".$_GET['parent']);
		}

		function getInList(){
			return $this->fetchAll("SELECT f.name as file_name, f.size as file_size, m.id as id, m.name as name, i.* FROM in_list i JOIN file f ON f.idx = i.fidx JOIN member m ON m.idx = i.midx ");
		}

		function getOutList(){
			return $this->fetchAll("SELECT f.name as file_name, f.size as file_size, m.id as id, m.name as name, o.* FROM out_list o JOIN file f ON f.idx = o.fidx JOIN member m ON m.idx = o.midx ");
		}

		function getAllShare($table){
			return $this->cnt("SELECT * FROM {$table}");
		}

		function getMyShare($table,$midx){
			return $this->cnt("SELECT * FROM {$table} where midx = '{$midx}'");
		}

		function action(){
			$idxs = implode(",",$_POST['idx']);
			extract($_POST);
			switch ($action) {
				case 'delete':
					$this->query("DELETE FROM {$table} where idx in ($idxs)");
					alert("삭제되었습니다.");
					move("/share/".$table);
					break;
			}
		}
	}