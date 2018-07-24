<?php
	class LoginController extends Controller {

		function login(){
			if($this->is_member){
				move("/file");
			}
		}

		function logout(){
			session_destroy();
			alert("로그아웃되었습니다.");
			move("/login");
		}
	}