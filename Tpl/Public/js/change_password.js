$(function(){
	$(".passwordEdit").click(function(){
		$("#passwordChange").show();
	});

	$("#cancelChange").click(function(){
		$("#passwordChange").hide();
		$(".orginalPassword").siblings("span").text("(请填写您的原始密码)").css("color","black");
		$(".newPassword").siblings("span").text("(请用大小写字母加数字或符号的组合)").css("color","black");
		$(".password-confirm").siblings("span").text("(请再次输入相同的密码)");
		return false;
	})
	// if a user submit this form without filling it,the color of tips after the input tags will be red and he/she can not submit this form;

	//a global variable to determine the ability of submit
	var $logState = false;
	$(".orginalPassword").keyup(function(){
		var val = $(".orginalPassword").val().length;
		if(val > 0){
			$(".orginalPassword").siblings("span").text("");
			logState = true;
		}
	});

	$(".newPassword").keyup(function(){
		var span = $(this).siblings("span");
		var val = $(".newPassword").val();
		var oldPassword = $(".orginalPassword").val();
		if(val == oldPassword){
			span.text("新旧密码不能一致").css("color","red");
		} else if(val != oldPassword && val > 0){
			span.text("");
			$logState = true;
		}
	});

	$(".password-confirm").change(function(){
      var cpasswordConfirm = $(this).val();
      var span = $(this).siblings("span");
      if(cpasswordConfirm != $(".newPassword").val()){
        span.text("您两次输入的密码不一致").css("color","red");
        $logState = false;
      } else{
       span.text("");
       $logState = true;
     }
   });

	$(".form3").submit(function(){
		
		var orginalPasswordLength = $(".orginalPassword").val().length;
		var newPasswordLength = $(".newPassword").val().length;
		var passwordConfirmLength = $(".password-confirm").val().length;
		if(orginalPasswordLength == 0){
			$(".orginalPassword").siblings("span").text("(请填写您的原始密码)").css("color","red");
			$logState = false;
		}

		if(newPasswordLength == 0){
			$(".newPassword").siblings("span").text("(请填写您的新密码)").css("color","red");
			$logState = false;
		}

		if(passwordConfirmLength == 0){
			$(".password-confirm").siblings("span").text("请先填写您的新密码");
			$logState = false;
		}

		//only the value of $logState is true can the user submit the form
		if($logState == false){
			return false;
		} else {
			return true;
		}
	})

});