<?php
header('Content-Type: text/html; charset=utf-8');
class UserModel extends Model {

	protected static $_instance;

	protected static function getInstance() {
		if(self::$_instance) {
			return self::$_instance;
		}
		self::$_instance = new self;
		return self::$_instance;
	}
	public static function getNameById($id) {
		$model = self::getInstance();
		$condition['id'] = $id;
		$user = $model->where($condition)->find();
		return $user["name"];
	}
	public static function getEmailById($id) {
		$model = self::getInstance();
		$condition['id'] = $id;
		$user = $model->where($condition)->find();
		return $user["email"];
	}
	public static function getMajorById($id) {
		$model = self::getInstance();
		$condition['id'] = $id;
		$user = $model->where($condition)->find();
		return $user["major"];
	}
	public static function getGenderById($id) {
		$model = self::getInstance();
		$condition['id'] = $id;
		$user = $model->where($condition)->find();
		if ($user["gender"] == "M") {
			return "男";
		} else {
			return "女";
		}
	}
	public static function getGradeById($id) {
		$model = self::getInstance();
		$condition['id'] = $id;
		$user = $model->where($condition)->find();
		return $user["grade"];
	}
	public static function getById($id) {
		$model = self::getInstance();
		$condition['id'] = $id;
		return $model->where($condition)->find();
	}
	public static function getName($id) {
		$model = self::getInstance();
		$condition['id'] = $id;
		$user = $model->where($condition)->find();
		return $user["name"];
	}
	public static function changePassword($id, $newpwd)
	{
		$model = self::getInstance();
		$condition['id'] = $id;
		$data['password'] = $newpwd;
		return $model->where($condition)->save($data);
	}
	public static function changeProfile($id, $newPro) {
		$model = self::getInstance();
		$condition['id'] = $id;
		return $model->where($condition)->save($newPro);
	}
	public static function changePhoto($id, $newPhoto) {
		$model = self::getInstance();
		$condition['id'] = $id;
		$data['photo'] = $newPhoto;
		return $model->where($condition)->save($data);
	}

}
?>