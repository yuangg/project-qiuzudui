<?php
header('Content-Type: text/html; charset=utf-8');
class ProfileAction extends Action {
	public function index() {
		if ($_SESSION['user'] == NULL) {
			$this->error ('用户未登录！');
			$this->redirect("Index/index");
		} else {
			$user = $_SESSION['user'];
			if($user['user_type'] == 0) {
				$this->redirect ("Profile/profile_personal" );
			} else {
				$this->redirect("Profile/profile_society");
			}
		}
	}
	public function profile_personal() {
		$current_user = $_SESSION['user'];
		$user_dao = M('User');
		$user = $user_dao -> getById($current_user['id']);
		if(empty($user)) {
			$this->error ('用户未登录！');
			$this->redirect("Index/index");
		} else {
			$ability_dao = M("Ability");
			$ua_dao = M("UserAbility");
			$abilities = UserabilityModel::getByUser($user['id']);
			$abNameList = array();
			foreach ($abilities as $ab) {
				$abName = AbilityModel::getById($ab["ability_id"]);
				array_push($abNameList, $abName['name']);
			}
			$this -> assign("user", $user);
			$this -> assign("abilities", $abNameList);
			$this -> display();
		}

	}
	public function profile_society() {
		$current_user = $_SESSION['user'];
		$user_dao = M('User');
		$user = $user_dao -> getById($current_user['id']);
		$user['introduction'] = str_replace("</p>","\r\n", $user['introduction']);
		$user['introduction'] = strip_tags($user['introduction']);
		if (substr($user['introduction'], -2) == "\r\n") {
			$user['introduction'] = substr($user['introduction'], 0, -2);
		}
		if(empty($user)) {
			$this->error ('用户未登录！');
			$this->redirect("Index/index");
		} else {
			$this -> assign("user", $user);
			$this -> display();
		}
	}
	public function info() {
		if ($_SESSION['user'] == NULL) {
			$this->error ('用户未登录！');
			$this->redirect("Index/index");
		} else {
			$user = $_SESSION['user'];
			if($user['user_type'] == 0) {
				$this->redirect ("Profile/info_personal" );
			} else {
				$this->redirect("Profile/info_society");
			}
		}
	}
	public function info_personal() {
		$current_user = $_SESSION['user'];
		$user_dao = M('User');
		$user = $user_dao -> getById($current_user['id']);
		if ($user['gender'] == "M") {
			$user['gender'] = "男";
		} else {
			$user['gender'] = "女";
		}
		if(empty($user)) {
			$this->error ('用户未登录！');
			$this->redirect("Index/index");
		} else {
			$this -> assign("user", $user);
			$this -> display();
		}
	}
	public function info_society() {
		$current_user = $_SESSION['user'];
		$user_dao = M('User');
		$user = $user_dao -> getById($current_user['id']);
		if(empty($user)) {
			$this->error ('用户未登录！');
			$this->redirect("Index/index");
		} else {
			$this -> assign("user", $user);
			$this -> display();
		}
	}
	public function changePassword() {
		$user = $_SESSION['user'];
		$user_dao = M('User');
		$user_instance = $user_dao -> getById($user['id']);
		$oldPsw = $user_instance['password'];
		$getPsw = $_POST['orginalPassword'];

		if ($getPsw != $oldPsw) {
			$this->error('原密码错误！');
			return;
		} else {
			$newPsw = $_POST['newPassword'];
			if(empty($newPsw))
			{
				$this->error("新密码不能为空");
				return;
			}
			UserModel::changePassword($user['id'], $newPsw);
			
			$this -> success('密码修改成功！');
			return;
		}
	}
	public function changeProfile() {
		$user = $_SESSION['user'];
		$user_dao = M('User');
		$user_instance = $user_dao -> getById($user['id']);
		if(empty($user_instance)) {
			$this->error ('用户未登录！');
			$this->redirect("Index/index");
		} else {
 			if ($_FILES['photo']['error'] != UPLOAD_ERR_NO_FILE) {
				if($_FILES['photo']['error'] > 0) {
					$this -> error("上传失败");
					return;
				} else {
					$filename = basename($_FILES ['photo'] ['name'] );
					$file_ext = substr($filename, strrpos( $filename,'.')+1);
					$file_ext = strtolower($file_ext);//获取扩展名
					if (!in_array($file_ext, array ("jpg","jpeg","png","gif"))) {
						$this -> error( "错误：文件类型不匹配" );
						return;
					}
					$image_name = uniqid().".".$file_ext;
					$destination_file = "./Tpl/Public/images/icons/".$image_name;

					if (isset ($_FILES ['photo']['name'] )) {
						move_uploaded_file ( $_FILES["photo"]["tmp_name"],$destination_file );
					}

					UserModel::changePhoto($user_instance['id'], $image_name);

				}
 			}
			if ($user_instance['user_type'] == 0) {
				$newProfile = array();
				if (!empty($_POST['name'])) {
					$newProfile['name'] = $_POST['name'];
				}
				if (!empty($_POST['gender'])) {
					if ($_POST['gender'] == "male") {
						$newProfile['gender'] = "M";
					} else {
						$newProfile['gender'] = "F";
					}
				}
				if (!empty($_POST['major'])) {
					$newProfile['major'] = $_POST['major'];
				}
				if (!empty($_POST['grade'])) {
					$newProfile['grade'] = $_POST['grade'];
				}
				UserModel::changeProfile($user_instance['id'], $newProfile);
			} else {
				$newProfile = array();
				if (!empty($_POST['publicName'])) {
					$newProfile['name'] = $_POST['publicName'];
				}
				if (!empty($_POST['email'])) {
					$newProfile['email'] = $_POST['email'];
				}
				if (!empty($_POST['websiteORweibo'])) {
					$newProfile['weibo'] = $_POST['websiteORweibo'];
				}
				if (!empty($_POST['weixin'])) {
					$newProfile['wechat'] = $_POST['weixin'];
				}
				if (!empty($_POST['intro'])){
					$newProfile['introduction'] = $_POST['intro'];
					$arr = explode("\r\n",$newProfile['introduction']);
					$intro = "";
					foreach ($arr as &$passage) {
						$passage = "<p>".$passage."</p>";
						$intro = $intro.$passage;
					}
					$newProfile['introduction'] = $intro;
				}
				UserModel::changeProfile($user_instance['id'], $newProfile);
			}
			$skillstring = $_POST["skills"];
			$skillstring = substr($skillstring,0,-1);
			$skills = explode(",",$skillstring);
			UserabilityModel::deleteByUser($user['id']);
			foreach ($skills as $sk) {
				if (AbilityModel::getByName($sk) == NULL) {
					AbilityModel::addAbility($sk);
				}
				$ab = AbilityModel::getByName($sk);
				if (UserabilityModel::getById($user['id'], $ab['id']) == NULL) {
					UserabilityModel::addAbility($user['id'], $ab['id']);
				}
			}
			$this -> success('信息修改成功！');
			return;
		}
	}
}

?>