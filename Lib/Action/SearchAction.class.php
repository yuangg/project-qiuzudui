<?php

class SearchAction extends Action {
	public function search() {
		$current_user = $_SESSION['user'];
		$user_dao = M('User');
		$user = $user_dao -> getById($current_user['id']);
		if(empty($user)) {
			$this -> error ('用户未登录！');
			$this -> redirect("Index/index");
		} else {
			$acti_dao = M("Activity");
			$keyword = trim($_GET["keyword"]);
			if ($keyword != "") {
				$user['keyword'] = $keyword;
				$resultActivity = ActivityModel::getByKeyword($keyword);
				$this -> assign("user", $user);
				$this -> assign("myActivity", $resultActivity);
				$this -> display();
			} else {
				return;
			}
			
		}
	}
}

?>