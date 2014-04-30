<?php
class AbilityAction extends Action {
	public function getUserByAbility() {
		$skillstring = $_POST["wantedSkill"];
		$u_id = $_POST['u_id'];
		$skillstring = substr($skillstring,0,-1);
		$skills = explode(",",$skillstring);
		foreach ($skills as &$sk) {
			$skill = AbilityModel::getByName($sk);
			$sk = $skill["id"];
		}
		$data = UserabilityModel::getUserByAbilities($skills, $u_id);
		foreach ($data as &$item) {
			if ($item['gender'] == "M") {
				$item['gender'] = "男";
			} else {
				$item['gender'] = "女";
			}
			$abilities = UserabilityModel::getByUser($item['id']);
			$string = "";
			foreach ($abilities as $ab) {
				$abName = AbilityModel::getById($ab["ability_id"]);
				$string .= ($abName['name'].",");
			}
			$string = substr($string,0,-1);
			$item["abilities"] = $string;
		}
 		$this->ajaxReturn($data,'JSON');
	}

}
?>