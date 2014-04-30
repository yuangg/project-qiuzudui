<?php
header('Content-Type: text/html; charset=utf-8');
class ActivityAction extends Action {
	public function index() {
		if ($_SESSION['user'] == NULL) {
			$this -> error ('用户未登录！');
			$this -> redirect("Index/index");
		} else {
			$user = $_SESSION['user'];
			if($user['user_type'] == 0) {
				$this -> error ('用户权限错误！');
				$this -> redirect("Index/index");
			} else {
				$this->redirect("Activity/activity_society");
			}
		}
	}
	public function activity_society() {
		$current_user = $_SESSION['user'];
		$user_dao = M('User');
		$user = $user_dao -> getById($current_user['id']);
		if(empty($user) || $user['user_type'] == 0) {
			$this -> error ('用户未登录！');
			$this -> redirect("Index/index");
		} else {
			$acti_dao = M("Activity");
			$myActivity = ActivityModel::getByHost($user["id"]);

			$my_t=getdate(date("U"));
			$month = ($my_t["mon"] < 10) ? ("0".$my_t["mon"]):($my_t["mon"]);
			$day = ($my_t["mday"] < 10) ? ("0".$my_t["mday"]):($my_t["mday"]);
			$now = $my_t["year"]."-".$month."-".$day;
			
			foreach ($myActivity as &$actis) {
				if ($actis['deadline'] < $now) {
					$actis['accepting'] = false;
				} else {
					$actis['accepting'] = true;
				}
			}
			$this -> assign("user", $user);
			$this -> assign("myActivity", $myActivity);
			$this -> display();
		}
	}
	public function index_postActivity() {
		$current_user = $_SESSION['user'];
		$user_dao = M('User');
		$user = $user_dao -> getById($current_user['id']);
		if(empty($user) || $user['user_type'] == 0) {
			$this -> error ('用户未登录！');
			$this -> redirect("Index/index");
		} else {
			$this -> assign("user", $user);
			$this -> display();
		}
	}
	public function postActivity() {
		$current_user = $_SESSION['user'];
		$user_dao = M('User');
		$user = $user_dao -> getById($current_user['id']);
		if(empty($user) || $user['user_type'] == 0) {
			$this -> error ('用户未登录！');
			$this -> redirect("Index/index");
		} else {
			$newProfile = array();
			if (!empty($_POST['title'])) {
				$newProfile['name'] = $_POST['title'];
			}
			if (!empty($_POST['comStartTime'])) {
				$newProfile['start_date'] = $_POST['comStartTime'];
			}
			if (!empty($_POST['comEndTime'])) {
				$newProfile['end_date'] = $_POST['comEndTime'];
			}
			if (!empty($_POST['applyEndTime'])) {
				$newProfile['deadline'] = $_POST['applyEndTime'];
			}
			if (!empty($_POST['teamMinSize'])) {
				$newProfile['size_lowbound'] = $_POST['teamMinSize'];
			}
			if (!empty($_POST['teamMaxSize'])) {
				$newProfile['size_uppbound'] = $_POST['teamMaxSize'];
			}
			if (!empty($_POST['comDetail'])) {
				$newProfile['introduction'] = $_POST['comDetail'];
				$arr = explode("\r\n",$newProfile['introduction']);
				$intro = "";
				foreach ($arr as &$passage) {
					$passage = "<p>".$passage."</p>";
					$intro = $intro.$passage;
				}
				$newProfile['introduction'] = $intro;
			}
			$my_t=getdate(date("U"));
			$day = ($my_t["mday"] < 10) ? ("0".$my_t["mday"]):($my_t["mday"]);
			$hour = ($my_t["hours"] < 10) ? ("0".$my_t["hours"]):($my_t["hours"]);
			$min = ($my_t["minutes"] < 10) ? ("0".$my_t["minutes"]):($my_t["minutes"]);
			$newProfile['create_date'] = $day." ".$my_t["month"]." ".$my_t["year"]." - ".$hour.":".$min;

			$newProfile['edit_date'] = $newProfile['create_date'];
			$newProfile['host_id'] = $current_user['id'];
			if ($_FILES['applyForm']['error'] != UPLOAD_ERR_NO_FILE) {
				if($_FILES['applyForm']['error'] > 0) {
					$this -> error("上传报名表失败");
					return;
				} else {
					$filename = basename($_FILES['applyForm']['name']);
					$file_ext = substr ($filename, strrpos( $filename,'.')+1);
					$file_ext = strtolower($file_ext);//获取扩展名

					if (!in_array($file_ext, array ("doc","docx","xls"))) {
						$this -> error( "错误：文件类型需为word或excel" );
						return;
					}
					$file_name = $user['name']."_".$file_name;

					$destination_file = "./Files/".$file_name;
					if (isset ($_FILES ['applyForm']['name'] )) {
						move_uploaded_file ( $_FILES["applyForm"]["tmp_name"], iconv("UTF-8", "GB2312", $destination_file ));
						$newProfile['applyForm'] = $file_name;
					}
				}
			}
			if ($_FILES['poster']['error'] != UPLOAD_ERR_NO_FILE) {
				if($_FILES['poster']['error'] > 0) {
					$this -> error("上传海报失败");
					return;
				} else {
					$filename = basename ($_FILES ['poster'] ['name'] );
					$file_ext = substr ($filename, strrpos( $filename,'.')+1);
					$file_ext = strtolower($file_ext);//获取扩展名

					if (!in_array($file_ext, array ("jpg","jpeg","png","gif"))) {
						$this -> error( "错误：海报图片格式错误" );
						return;
					}
					$file_name = uniqid().".".$file_ext;
					$destination_file = "./Tpl/Public/images/posters/".$file_name;
					if (isset ($_FILES ['poster']['name'] )) {
						move_uploaded_file ( $_FILES["poster"]["tmp_name"], $destination_file );
						$newProfile['poster'] = $file_name;
					}
				}
			}

			$id = ActivityModel::createActivity($newProfile);
	  		$this -> success('创建活动成功！');
	  		$url = "/Activity/activity_info/?ac_id=".$id;
	  		$this -> redirect($url);
		}
	}
	public function activity_info() {
		if ($_SESSION['user'] == NULL) {
			$this -> error ('用户未登录！');
			$this -> redirect("Index/index");
		} else {
			$user = $_SESSION['user'];
			if($user['user_type'] == 0) {
				$this -> error ('用户权限错误！');
				$this -> redirect("Index/index");
			} else {
				if (!$_GET['ac_id']) {
					$this -> error ('URL错误！');
					return;
				}
				$current_user = $_SESSION['user'];
				$user_dao = M('User');
				$user = $user_dao -> getById($current_user['id']);
				$this -> assign("user", $user);
				$a_id = $_GET['ac_id'];
				if (ActivityModel::getHostId($a_id) != $user['id']) {
					$this -> error ('URL错误！');
					return;
				}
				$ac_dao = M('Activity');
				$activity = $ac_dao -> getById($a_id);
				if (!$activity) {
					$this -> error ('URL错误！');
					return;
				}
				$activity["hostname"] = UserModel::getName($user["id"]);
				$this -> assign("ac", $activity);
				$this -> display();
			}
		}
	}
	public function editActivity() {
		if ($_SESSION['user'] == NULL) {
			$this -> error ('用户未登录！');
			$this -> redirect("Index/index");
		} else {
			$user = $_SESSION['user'];
			if($user['user_type'] == 0) {
				$this -> error ('用户权限错误！');
				$this -> redirect("Index/index");
			} else {
				if (!$_GET['ac_id']) {
					$this -> error ('URL错误！');
					return;
				}
				$current_user = $_SESSION['user'];
				$user_dao = M('User');
				$user = $user_dao -> getById($current_user['id']);
				$this -> assign("user", $user);
				$a_id = $_GET['ac_id'];
				if (ActivityModel::getHostId($a_id) != $user['id']) {
					$this -> error ('URL错误！');
					return;
				}
				$ac_dao = M('Activity');
				$activity = $ac_dao -> getById($a_id);
				if (!$activity) {
					$this -> error ('URL错误！');
					return;
				}
				$activity["hostname"] = UserModel::getName($user["id"]);
				$activity['introduction'] = str_replace("</p>","\r\n", $activity['introduction']);
				$activity['introduction'] = strip_tags($activity['introduction']);
				if (substr($activity['introduction'], -2) == "\r\n") {
					$activity['introduction'] = substr($activity['introduction'], 0, -2);
				}
 				$this -> assign("ac", $activity);
				$this -> display();
			}
		}
	}

	public function updateActivity() {
		if ($_SESSION['user'] == NULL) {
			$this -> error ('用户未登录！');
			$this -> redirect("Index/index");
		} else {
			$user = $_SESSION['user'];
			if($user['user_type'] == 0) {
				$this -> error ('用户权限错误！');
				$this -> redirect("Index/index");
			} else {
				if (!$_POST['ac_id']) {
					$this -> error ('URL错误！');
					return;
				}
				$current_user = $_SESSION['user'];
				$user_dao = M('User');
				$user = $user_dao -> getById($current_user['id']);
				$a_id = $_POST['ac_id'];
				if (ActivityModel::getHostId($a_id) != $user['id']) {
					$this -> error ('URL错误！');
					return;
				}
				$ac_dao = M('Activity');
				$activity = $ac_dao -> getById($a_id);
				if (!$activity) {
					$this -> error ('URL错误！');
					return;
				}
				$activity["hostname"] = UserModel::getName($user["id"]);

				$newProfile = array();
				if (!empty($_POST['title'])) {
					$newProfile['name'] = $_POST['title'];
				}
				if (!empty($_POST['comStartTime'])) {
					$newProfile['start_date'] = $_POST['comStartTime'];
				}
				if (!empty($_POST['comEndTime'])) {
					$newProfile['end_date'] = $_POST['comEndTime'];
				}
				if (!empty($_POST['applyEndTime'])) {
					$newProfile['deadline'] = $_POST['applyEndTime'];
				}
				if (!empty($_POST['teamMinSize'])) {
					$newProfile['size_lowbound'] = $_POST['teamMinSize'];
				}
				if (!empty($_POST['teamMaxSize'])) {
					$newProfile['size_uppbound'] = $_POST['teamMaxSize'];
				}
				if (!empty($_POST['comDetail'])) {
					$newProfile['introduction'] = $_POST['comDetail'];
					$arr = explode("\r\n",$newProfile['introduction']);
					$intro = "";
					foreach ($arr as &$passage) {
						$passage = "<p>".$passage."</p>";
						$intro = $intro.$passage;
					}
					$newProfile['introduction'] = $intro;
				}
				$my_t=getdate(date("U"));
				$day = ($my_t["mday"] < 10) ? ("0".$my_t["mday"]):($my_t["mday"]);
				$hour = ($my_t["hours"] < 10) ? ("0".$my_t["hours"]):($my_t["hours"]);
				$min = ($my_t["minutes"] < 10) ? ("0".$my_t["minutes"]):($my_t["minutes"]);
				$newProfile['edit_date'] = $day." ".$my_t["month"]." ".$my_t["year"]." - ".$hour.":".$min;
				
				if ($_FILES['applyForm']['error'] != UPLOAD_ERR_NO_FILE) {
					$filename = basename ($_FILES ['applyForm'] ['name'] );
					$file_ext = substr ($filename, strrpos( $filename,'.')+1);
					$file_ext = strtolower($file_ext);//获取扩展名

					if (!in_array($file_ext, array ("doc","docx","xls"))) {
						$this -> error( "错误：文件类型需为word或excel" );
						return;
					}
					$file_name = $user['name']."_".$file_name;
					$destination_file = "./Files/".$file_name;
					if (isset ($_FILES ['applyForm']['na me'] )) {
						move_uploaded_file ( $_FILES["applyForm"]["tmp_name"], iconv("UTF-8", "GB2312", $destination_file ));
						$newProfile['applyForm'] = $file_name;
					}
				}
				if ($_FILES['poster']['error'] != UPLOAD_ERR_NO_FILE) {
					$filename = basename ($_FILES ['poster'] ['name'] );
					$file_ext = substr ($filename, strrpos( $filename,'.')+1);
					$file_ext = strtolower($file_ext);//获取扩展名

					if (!in_array($file_ext, array ("jpg","jpeg","png","gif"))) {
						$this -> error( "错误：海报图片格式错误" );
						return;
					}
					$file_name = uniqid().".".$file_ext;
					$destination_file = "./Tpl/Public/images/posters/".$file_name;
					if (isset ($_FILES ['poster']['name'] )) {
						move_uploaded_file ( $_FILES["poster"]["tmp_name"], $destination_file );
						$newProfile['poster'] = $file_name;
					}
				}
				
				ActivityModel::updateActivity($activity['id'], $newProfile);
				$this -> success ('修改成功！');
				$this -> assign("ac", $activity);
				$this -> assign("user", $user);
				$this -> redirect("Activity/index");
			}
		}
	}
	public function deleteActivity() {
		if ($_SESSION['user'] == NULL) {
			$this -> error ('用户未登录！');
			$this -> redirect("Index/index");
		} else {
			$user = $_SESSION['user'];
			if($user['user_type'] == 0) {
				$this -> error ('用户权限错误！');
				$this -> redirect("Index/index");
			} else {
				if (!$_GET['ac_id']) {
					$this -> error ('URL错误！');
					return;
				} else {
					$id = $_GET['ac_id'];
					if (ActivityModel::getHostId($id) != $user['id']) {
						$this -> error ('URL错误！');
						return;
					}
					$my_t=getdate(date("U"));
					$month = ($my_t["mon"] < 10) ? ("0".$my_t["mon"]):($my_t["mon"]);
					$day = ($my_t["mday"] < 10) ? ("0".$my_t["mday"]):($my_t["mday"]);
					$now = $my_t["year"]."-".$month."-".$day;

					$activity = ActivityModel::getById($id);
					if($activity['end_date'] >= $now) {
						$this -> error ('活动还在继续，请勿删除哦~');
						$this -> assign("user", $user);
						$this -> redirect("Activity/index");
					} else {
						InvitationModel::deleteByActivity($id);
						if (ActivityModel::deleteActivity($id)) {
							$this -> success ('删除成功！');
							$this -> assign("user", $user);
							$this -> redirect("Activity/index");
						} else {
							$this -> error ('已经有人求组队了，请勿删除哦~');
							$this -> assign("user", $user);
							$this -> redirect("Activity/index");
						}
					}
				}
			}
		}
	}
	public function activity_personal() {
		if ($_SESSION['user'] == NULL) {
			$this -> error ('用户未登录！');
			$this -> redirect("Index/index");
		} else {
			$user = $_SESSION['user'];
			if($user['user_type'] == 1) {
				$this -> error ('用户权限错误！');
				$this -> redirect("Index/index");
			} else {
				if (!$_GET['ac_id']) {
					$this -> error ('URL错误！');
					return;
				} else {
					$current_user = $_SESSION['user'];
					$user_dao = M('User');
					$user = $user_dao -> getById($current_user['id']);
					$this -> assign("user", $user);
					$a_id = $_GET['ac_id'];
					$ac_dao = M('Activity');
					$activity = $ac_dao -> getById($a_id);
					if (!$activity) {
						$this -> error ('URL错误！');
						return;
					}
					$activity["hostname"] = UserModel::getName($activity["host_id"]);
					$this -> assign("ac", $activity);
					$this -> display();
				}
			}
		}
	}
	public function preview() {
		if ($_SESSION['user'] == NULL) {
			$this -> error ('用户未登录！');
			$this -> redirect("Index/index");
		} else {
			$user = $_SESSION['user'];
			if($user['user_type'] == 0) {
				$this -> error ('用户权限错误！');
				$this -> redirect("Index/index");
			} else {
				$newProfile = array();
				if (!empty($_POST['title'])) {
					$newProfile['name'] = $_POST['title'];
				}
				if (!empty($_POST['comStartTime'])) {
					$newProfile['start_date'] = $_POST['comStartTime'];
				}
				if (!empty($_POST['comEndTime'])) {
					$newProfile['end_date'] = $_POST['comEndTime'];
				}
				if (!empty($_POST['applyEndTime'])) {
					$newProfile['deadline'] = $_POST['applyEndTime'];
				}
				if (!empty($_POST['teamMinSize'])) {
					$newProfile['size_lowbound'] = $_POST['teamMinSize'];
				}
				if (!empty($_POST['teamMaxSize'])) {
					$newProfile['size_uppbound'] = $_POST['teamMaxSize'];
				}
				if (!empty($_POST['comDetail'])) {
					$newProfile['introduction'] = $_POST['comDetail'];
					$arr = explode("\r\n",$newProfile['introduction']);
					$intro = "";
					foreach ($arr as &$passage) {
						$passage = "<p>".$passage."</p>";
						$intro = $intro.$passage;
					}
					$newProfile['introduction'] = $intro;
				}
				$my_t=getdate(date("U"));
				$newProfile['create_date'] = $my_t["mday"]." ".$my_t["month"]." ".$my_t["year"]." - ".$my_t["hours"].":".$my_t["minutes"];
				$newProfile["poster"] = $_POST["poster"];
				$this -> assign("ac", $newProfile);
				$user = $_SESSION['user'];
				$this -> assign("user", $user);
				$this -> display();
			}
		}
	}
	public function viewBrief() {
		$current_user = $_SESSION['user'];
        $user_dao = M('User');
        $user = $user_dao -> getById($current_user['id']);
        if(empty($user)) {
            $user['user_type'] = -1;
        }
        if (!$_GET['ac_id']) {
			$this -> error ('URL错误！');
			return;
		} else {
			$this -> assign("user", $user);
			$a_id = $_GET['ac_id'];
			$ac_dao = M('Activity');
			$activity = $ac_dao -> getById($a_id);
			if (!$activity) {
				$this -> error ('URL错误！');
				return;
			}
			$activity["hostname"] = UserModel::getName($activity["host_id"]);
			$this -> assign("ac", $activity);
			if (ActivityModel::getHostId($a_id) == $user['id']) {
				$this->redirect("Activity/activity_info?ac_id=".$a_id);
			}
		}
        $this->assign("user", $user);
        $this->display();
	}
}