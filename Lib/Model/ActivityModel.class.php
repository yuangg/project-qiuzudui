<?php
header('Content-Type: text/html; charset=utf-8');
class ActivityModel extends Model {

	protected static $_instance;

	protected static function getInstance() {
		if(self::$_instance) {
			return self::$_instance;
		}
		self::$_instance = new self;
		return self::$_instance;
	}
	public static function getById($id) {
		$model = self::getInstance();
		$condition['id'] = $id;
		return $model->where($condition)->find();
	}
	public static function getByHost($hostid) {
		$model = self::getInstance();
		$condition['host_id'] = $hostid;
		$arr = $model -> where($condition) -> select();
		return array_reverse($arr);
	}
	public static function getAll() {
		$model = self::getInstance();
		$arr = $model -> select();
		return array_reverse($arr);
	}
	public static function getByKeyword($keyword) {
		$model = self::getInstance();
		$keyword = "%".$keyword."%";
		$condition["introduction"] = $condition["name"] = array('like', $keyword);
		$condition['_logic'] = 'or';
		$arr = $model -> where($condition) -> select();
		return array_reverse($arr);
	}
	public static function getName($id) {
		$model = self::getInstance();
		$condition['id'] = $id;
		return $model -> where($condition) -> select();
	}
	public static function getNameById($id) {
		$model = self::getInstance();
		$condition['id'] = $id;
		$ac = $model -> where($condition) -> find();
		return $ac["name"];
	}
	public static function getHostId($id) {
		$model = self::getInstance();
		$condition['id'] = $id;
		$ac = $model -> where($condition) -> find();
		return $ac["host_id"];
	}
	public static function getHostById($id) {
		$model = self::getInstance();
		$condition['id'] = $id;
		$ac = $model -> where($condition) -> find();
		$host = UserModel::getNameById($ac["host_id"]);
		return $host;
	}
	public static function createActivity($acti) {
		$user_dao = M("Activity");
		$id = $user_dao -> add($acti);
		return $id;
	}
	public static function updateActivity($id, $newProfile) {
		$model = self::getInstance();
		$condition['id'] = $id;
		return $model->where($condition)->save($newProfile);
	}
	public static function deleteActivity($id) {
		$model = self::getInstance();
		$condition['id'] = $id;
		return $model->where($condition)->delete();
	}
}

?>