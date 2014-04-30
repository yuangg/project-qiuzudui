<?php
class AbilityModel extends Model {
	protected static $_instance;
	protected static function getInstance() {
		if(self::$_instance) {
			return self::$_instance;
		}
		self::$_instance = new self;
		return self::$_instance;
	}
	public static function getByName($name) {
		$model = self::getInstance();
		$condition['name'] = $name;
		return $model->where($condition)->find();
	}
	public static function getById($id) {
		$model = self::getInstance();
		$condition['id'] = $id;
		return $model->where($condition)->find();
	}
	public static function addAbility($name) {
		$abi_dao = M("Ability");
		$data["name"] = $name;
		$id = $abi_dao -> add($data);
		return $id;
	}
}