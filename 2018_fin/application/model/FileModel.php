<?php
	class FileModel extends Model {

		function getFileList($parent){
			return $this->fetchAll("SELECT * FROM file where parent = '{$parent}'");
		}

		function getUpParent($parent){
			$data = $this->fetch("SELECT * FROM file where idx = '{$parent}'");
			return $data->parent;
		}

		function getFile($idx){
			return $this->fetch("SELECT * FROM file where idx = '{$idx}'");
		}

		function deleteFolder($idx){
			$idxs = $parent = [];
			$list = $this->fetchAll("SELECT idx FROM file where parent = '{$idx}'");
			foreach ($list as $data) {
				$parent = $data->idx;
			}
			$idxs = $parent;
			while (isset($parent[0])) {
				$parent = implode(",", $parent);
				$child_list = $this->fetchAll("SELECT idx FROM file where parent in ($parent)");
				$parent = [];
				foreach ($child_list as $data) {
					$parent = $data->idx;
				}
				$idxs = $parent;
			}
			$idxs[] = $idx;
			$idxs = implode(",",$idxs);
			$file_list = $this->fetchAll("SELECT idx,change_name FROM file where idx in ($idxs) and type = 'file'");
			foreach ($file_list as $data) {
				@unlink(DATA_PATH."/{$data->change_name}");
				$this->query("DELETE FROM in_list where fidx in ($data->idx)");
				$this->query("DELETE FROM out_list where fidx in ($data->idx)");
			}
			$this->query("DELETE FROM file where idx in ($idxs)");
			alert("삭제되었습니다.");
			move("/file?parent=".$_GET['parent']);
		}

		function deleteFile($idx){
			$data = $this->fetch("SELECT * FROM file where idx = '{$idx}'");
			@unlink(DATA_PATH."/{$data->change_name}");
			$this->query("DELETE FROM file where idx = '{$idx}'");
			$this->query("DELETE FROM in_list where fidx = '{$idx}'");
			$this->query("DELETE FROM out_list where fidx = '{$idx}'");
			alert("삭제되었습니다");
			move("/file?parent=".$_GET['parent']);
		}

		function action(){
			$midx = $this->cr->memberInfo->idx;
			$idx = $this->cr->param->idx;
			extract($_POST);
			switch ($action) {
				case 'dirInsert':
					$cnt = $this->cnt("SELECT * FROM file where type = 'folder' and name = '{$name}'");
					access($cnt == 0, "같은 이름의 디렉토리가 있습니다.");
					$this->query("INSERT INTO file SET name = '{$name}', type = 'folder', mdate = now(), cdate = now(), parent = '{$_GET['parent']}', midx = '{$midx}'");
					alert("생성되었습니다.");
					move("/file?parent=".$_GET['parent']);
					break;

				case 'upload':
					$file = $_FILES['file'];
					access(is_uploaded_file($file['tmp_name']),"업로드된 파일이 없습니다.");
					$cnt = $this->cnt("SELECT * FROM file where type = 'file' and name = '{$file['name']}'");
					access($cnt == 0, "같은 이름의 파일이 있습니다.");
					$change_name = upload($file);
					$this->query("INSERT INTO file SET name = '{$file['name']}', type = 'file', mdate = now(), cdate = now(), parent = '{$_GET['parent']}', change_name = '{$change_name}', size = '{$file['size']}', midx = '{$midx}'");
					alert("업로드되었습니다.");
					move("/file?parent=".$_GET['parent']);
					break;

				case 'update':
					$cnt = $this->cnt("SELECT * FROM file where type = 'folder' and name = '{$name}' and idx != '{$idx}'");
					access($cnt == 0, "같은 이름의 디렉토리가 있습니다.");
					$this->query("UPDATE file SET name = '{$name}', cdate = now() where idx = '{$idx}'");
					alert("수정되었습니다.");
					move("/file?parent=".$_GET['parent']);
					break;
			}
		}
	}