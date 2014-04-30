<?php
class RegisterAction extends Action {
	public function index() {
		$this -> display();
	}
	public function personalRegister() {
		$user_dao = M('User');

		$email = trim($_POST ['email']);
		$password = $_POST ['password'];

		$condition['email'] = $email;
		if ($user_dao -> where ( $condition )->select ()) {
			$this -> error ('亲，这个邮箱已被注册过！请登录吧～');
			return;
		}

		$user['email'] = $email;
		$user['password'] = $password;
		$user['user_type'] = 0;//0表示个人
		$user['name'] = $email;
		$user['wechat'] = $user['weibo'] = $user['introduction'] = "";
		$user['major'] = "";
		$user['gender'] = "M";
		$user['grade'] = 2013;
		$user['photo'] = 'defaultPersonal.png';
 		$id = $user_dao -> add($user);//存入数据库

 		$user['id'] = $id;
 		$_SESSION ['user'] = array(
 				"id"=>$user['id'],
 				"email"=>$user['email'],
 				"name"=>$user['name']
 		);
		$this->redirect("Index/index_personal");
	}
	public function societyRegister() {
		$user_dao = M('User');

		$name = trim($_POST['societyName']);
		$email = trim($_POST ['societyEmail']);
		$password = $_POST ['societyPassword'];

		$condition['email'] = $email;
		$condition2['name'] = $name;
		if ($user_dao -> where ( $condition )->select ()) {
			$this -> error ('亲，这个邮箱已被注册过！请登录吧～');
			return;
		}
 		if ($user_dao -> where($condition2) -> select()) {
 			$this -> error ('已经有同名社团注册过了，请登录~');
 			return;
 		}

		$user['name'] = $name;
		$user['email'] = $email;
		$user['user_type'] = 1;//1表示社团
		$user['password'] = $password;
		$user['password'] = $password;
		$user['wechat'] = $user['weibo'] = $user['introduction'] = "";
		$user['major'] = "";
		$user['gender'] = "";
		$user['grade'] = 0;
		$user['photo'] = 'defaultSociety.png';
		$id = $user_dao -> add($user);//存入数据库

		$user['id'] = $id;


		$_SESSION ['user'] = array(
 				"id"=>$user['id'],
 				"email"=>$user['email'],
 				"name"=>$user['name'],
				"user_type"=>$user['user_type']
 		);
		$this->redirect("Index/index_society");
	}
}

?>