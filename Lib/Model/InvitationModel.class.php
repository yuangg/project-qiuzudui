<?php
class InvitationModel extends Model {
	protected static $_instance;
	protected static function getInstance() {
		if(self::$_instance) {
			return self::$_instance;
		}
		self::$_instance = new self;
		return self::$_instance;
	}
	public static function findRecord($invitor_id, $invitee_id, $activity_id) {
		$model = self::getInstance();
		$condition["invitor_id"] = $invitor_id;
		$condition["invitee_id"] = $invitee_id;
		$condition["activity_id"] = $activity_id;
		return $model->where($condition)->find();
	}
	public static function addRecord($invitor_id, $invitee_id, $activity_id, $date) {
		if (!self::findRecord($invitor_id, $invitee_id, $activity_id)) {
			if ($invitor_id != $invitee_id) {
				$dao = M("Invitation");
				$data["invitor_id"] = $invitor_id;
				$data["invitee_id"] = $invitee_id;
				$data["activity_id"] = $activity_id;
				$data["date"] = $date;
	 			$id = $dao -> add($data);
				return $id;
			}
		}
	}
	public static function deleteByActivity($a_id) {
		$model = self::getInstance();
		$condition['activity_id'] = $a_id;
		return $model->where($condition)->delete();
	}
	public static function getByInvitor($u_id) {
		$model = self::getInstance();
		$condition['invitor_id'] = $u_id;
		return $model->where($condition)->select();
	}
	public static function getByInvitee($u_id) {
		$model = self::getInstance();
		$condition['invitee_id'] = $u_id;
		return $model->where($condition)->select();
	}
}