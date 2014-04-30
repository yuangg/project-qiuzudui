<?php

class LoginAction extends Action {

	public function index() {
		$this -> display ();
	}
	public function login() {
		$user_dao = M ('User');
		$email = $_POST['email'];
		$password = $_POST['password'];
		$email = trim($email);
		if (empty($email)) {
			$this->error ( '用户名或密码错误' );
		}
		// 查找输入的用户名是否存在
		$condition ['email'] = $email;
		$condition ['password'] = $password;

		$user = $user_dao -> where ( $condition )->find ();
 		if ($user) {
 			$_SESSION ['user'] = array(
 					"id"=>$user['id'],
 					"email"=>$user['email'],
 					"name"=>$user['name'],
 					"user_type"=>$user['user_type']
 			);
 			if($user['user_type'] == 0)
 			{
 				$this->redirect ("Index/index_personal" );
 			}
 			else
 			{
 				$this->redirect("Index/index_society");
 			}
 		} else {
 			$this->error ( '用户名或密码错误' );
 		}
	}

 	public function logout() {
 		unset ( $_SESSION ['user'] );
 		$this->redirect ( "Index/index" );
 	}
}

?>