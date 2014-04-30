<?php
class UserabilityModel extends Model {

	protected static $_instance;

	protected static function getInstance() {
		if(self::$_instance) {
			return self::$_instance;
		}
		self::$_instance = new self;
		return self::$_instance;
	}
	public static function getById($u_id, $a_id) {
		$model = self::getInstance();
		$condition['user_id'] = $u_id;
		$condition['ability_id'] = $a_id;
		return $model->where($condition)->find();
	}
	public static function getByUser($u_id) {
		$model = self::getInstance();
		$condition['user_id'] = $u_id;
		return $model->where($condition)->select();
	}
	public static function addAbility($u_id, $a_id) {
		$abi_dao = M("Userability");
		$data["user_id"] = $u_id;
		$data["ability_id"] = $a_id;
		$id = $abi_dao -> add($data);
		return $id;
	}
	public static function deleteByUser($u_id) {
		$model = self::getInstance();
		$data["user_id"] = $u_id;
		return $model->where($condition)->delete();
	}
	public static function getUserByAbility($a_id, $u_id) {
		$model = self::getInstance();
		$condition['ability_id'] = $a_id;
		$condition['user_id'] = array("NEQ", $u_id);
		return $model->where($condition)->select();
	}
	public static function getUserByAbilities($aid_List, $u_id) {
		$userlist = array();
		foreach ($aid_List as $a_id) {
			if ($a_id != NULL) {
				$users = self::getUserByAbility($a_id, $u_id);
				$userlist = array_merge($userlist, $users);
			}
		}
		foreach ($userlist as &$record) {
			$record = $record["user_id"];
		}
		$userCountList = array_count_values($userlist);
		arsort($userCountList);
		$finalList = array();
		foreach ($userCountList as $u_id=>$time) {
			$user = UserModel::getById($u_id);
			array_push($finalList, $user);
		}
		return $finalList;
	}
}