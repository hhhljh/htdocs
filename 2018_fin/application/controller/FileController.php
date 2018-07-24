<?php
	class FileController extends Controller {

		function file(){
			$this->parent = isset($_GET['parent']) && $_GET['parent'] != 0 ? $_GET['parent'] : 0;
			if($this->parent != 0) $this->upParent = $this->model->getUpParent($this->parent);
			$this->list = $this->model->getFileList($this->parent);
		}

		function update(){
			$this->data = $this->model->getFile($this->param->idx);
			if(!$this->is_member || $this->memberInfo->idx != $this->data->midx){
				alert("생성자만 수정가능합니다.");
				move("/file?parent=".$_GET['parent']);
			}
		}

		function down(){
			$data = $this->model->getFile($this->param->idx);
			download($data);
		}

		function delete(){
			switch ($_GET['type']) {
				case 'folder':
					$this->model->deleteFolder($this->param->idx);
					break;
				case 'file':
					$this->model->deleteFile($this->param->idx);
					break;
			}
		}
	}