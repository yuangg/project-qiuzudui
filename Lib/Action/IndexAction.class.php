<?php

class IndexAction extends Action {
    public function index(){
     	if ($_SESSION['user'] == NULL) {
     		$activity = ActivityModel::getAll();
            foreach ($activity as &$act) {
                $actName = UserModel::getNameById($act['host_id']);
                $act["hostName"] = $actName;
            }
            $rowList = array();
            for($j = 0; $j < count($activity); ++$j) {
                $rowList[$j / 2][$j % 2] = $activity[$j];
            }
     		$this->assign("activitys", $rowList);
    		$this->display();
     	} else {
     		$user = $_SESSION['user'];
	     	if($user['user_type'] == 0) {
	 			$this->redirect ("Index/index_personal" );
	 		} else {
	 			$this->redirect("Index/index_society");
	 		}
     	}
    }

    public function index_personal()
    {
    	$current_user = $_SESSION['user'];
    	$user_dao = M('User');
    	$user = $user_dao -> getById($current_user['id']);
    	$activity = ActivityModel::getAll();
    	foreach ($activity as &$act) {
    		$actName = UserModel::getNameById($act['host_id']);
    		$act["hostName"] = $actName;
    	}
        $rowList = array();
        for($j = 0; $j < count($activity); ++$j) {
            $rowList[$j / 2][$j % 2] = $activity[$j];
        }
    	if(empty($user))
    	{
    		$this->error ('用户未登录！');
    		$this->redirect("Index/index");
    	}
    	else
    	{
    		$this->assign("activitys", $rowList);
    		$this->assign("user", $user);
    		$this->display();
    	}

    }
    public function index_society()
    {
    	$current_user = $_SESSION['user'];
		$user_dao = M('User');
		$user = $user_dao -> getById($current_user['id']);
		$activity = ActivityModel::getAll();
        foreach ($activity as &$act) {
            $actName = UserModel::getNameById($act['host_id']);
            $act["hostName"] = $actName;
        }
        $rowList = array();
        for($j = 0; $j < count($activity); ++$j) {
            $rowList[$j / 2][$j % 2] = $activity[$j];
        }
    	if(empty($user))
    	{
    		$this->error ('用户未登录！');
    		$this->redirect("Index/index");
    	} else {
    		$this->assign("activitys", $rowList);
    		$this->assign("user", $user);
    		$this->display();
    	}
    }
}

?>