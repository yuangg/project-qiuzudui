<?php
class TeamAction extends Action {
	public function index(){
     	if ($_SESSION['user'] == NULL) {
     		$this->error ('用户未登录！');
    		$this->redirect("Index/index");
     	} else {
     		$user = $_SESSION['user'];
	     	if($user['user_type'] == 0) {
	     		$asInvitor = InvitationModel::getByInvitor($user["id"]);
	     		$asInvitee = InvitationModel::getByInvitee($user["id"]);
	     		foreach ($asInvitor as &$record) {
	     			$record["invitorName"] = UserModel::getNameById($record["invitor_id"]);
	     			$record["inviteeName"] = UserModel::getNameById($record["invitee_id"]);
	     			$record["activityName"] = ActivityModel::getNameById($record["activity_id"]);
	     		}
	     		foreach ($asInvitee as &$record) {
	     			$record["invitorName"] = UserModel::getNameById($record["invitor_id"]);
	     			$record["inviteeName"] = UserModel::getNameById($record["invitee_id"]);
	     			$record["activityName"] = ActivityModel::getNameById($record["activity_id"]);
	     		}
	     		$user_dao = M('User');
	     		$user = $user_dao -> getById($user['id']);
	     		$this -> assign("user", $user);
	     		$this -> assign("inviteeList", $asInvitee);
	     		$this -> assign("invitorList", $asInvitor);
	 			$this -> display();
	 		} else {
    			$this->redirect("Index/index");
	 		}
     	}
	}
}
?>