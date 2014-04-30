<?php
header('Content-Type: text/html; charset=utf-8');
class InvitationAction extends Action {
	public function addInvitation() {
		$my_t=getdate(date("U"));
		$my_t=getdate(date("U"));
		$day = ($my_t["mday"] < 10) ? ("0".$my_t["mday"]):($my_t["mday"]);
		$hour = ($my_t["hours"] < 10) ? ("0".$my_t["hours"]):($my_t["hours"]);
		$min = ($my_t["minutes"] < 10) ? ("0".$my_t["minutes"]):($my_t["minutes"]);
		$invitationdate = $day." ".$my_t["month"]." ".$my_t["year"]." - ".$hour.":".$min;
		$id = InvitationModel::addRecord($_POST["invitor_id"], $_POST["invitee_id"], $_POST["activity_id"], $invitationdate);
		if (!empty($id) || $id == NULL) {
			$invitor_name = UserModel::getNameById($_POST["invitor_id"]);
			$invitee_name = UserModel::getNameById($_POST["invitee_id"]);
			$invitor_email = UserModel::getEmailById($_POST["invitor_id"]);
			$invitee_email = UserModel::getEmailById($_POST["invitee_id"]);
			$invitor_gender = UserModel::getGenderById($_POST["invitor_id"]);
			$invitor_grade = UserModel::getGradeById($_POST["invitor_id"]);
			$invitor_major = UserModel::getMajorById($_POST["invitor_id"]);

			$abilities = UserabilityModel::getByUser($_POST["invitor_id"]);
			$abNameList = array();
			foreach ($abilities as $ab) {
				$abName = AbilityModel::getById($ab["ability_id"]);
				array_push($abNameList, $abName['name']);
			}
			$invitor_ability = implode(",", $abNameList);
			//echo $invitor_ability;
			$activity_name = ActivityModel::getNameById($_POST["activity_id"]);
			$activity_host = ActivityModel::getHostById($_POST["activity_id"]);
			require("class.phpmailer.php"); //下载的文件必须放在该文件所在目录
			$mail = new phpmailer();
			$mail->IsSMTP(); // 使用SMTP方式发送
			$mail->CharSet = "utf-8";
			$mail->Host = "smtp.163.com";
			$mail->SMTPAuth = true; // 启用SMTP验证功能
			$mail->Username = "qiuzudui_public@163.com"; // 邮局用户名(请填写完整的email地址)
			$mail->Password = "qiuzudui"; // 邮局密码
			$mail->From = "qiuzudui_public@163.com"; //邮件发送者email地址
			$mail->FromName = "求组队网";
			$mail->AddAddress($invitee_email, $invitee_name);//收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
			$mail->IsHTML(true);
			$mail->Subject = "求组队邀请"; //邮件标题

			$namecard = "<p>对方名片</p><p>性别：".$invitor_gender."</p><p>专业：".$invitor_major."</p><p>年级：".$invitor_grade."</p><p>标签：".$invitor_ability."</p>";

			$warning = "<p>无论是否愿意与之组队，我们都希望你能在两天内回复邮件给邀请你的同学</p>";

			$body = "<p>".$invitor_name."(".$invitor_email .")在 ".$activity_host." 所举办的 ".$activity_name." 邀你一起组队参加</p>".$namecard.$warning;
			$mail->MsgHTML($body);

			if (!$mail->Send()) {      
		        echo "fail".$mail->ErrorInfo;
		        exit;
		    } else {
		        echo "success";    
		    }
		} else {
			echo "already";
		}
		return $id;
	}
}
?>