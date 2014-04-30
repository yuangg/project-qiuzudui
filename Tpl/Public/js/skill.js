$(function(){
	$("#allSkill,#mySkill").delegate("li",{
		mouseover:function(){
			$(this).addClass("mouseOver");
		},
		mouseout:function(){
			$(this).removeClass("mouseOver");
		}
	});
	$("#allSkill").delegate("li","click",function(){
		var mySkillNum = $("#mySkill>ul>li").length;
		var flag = true;
		var content = $(this).text();
		$("#mySkill li").each(function(){
			if(content == $(this).text()){
				flag = false;
			}
		}); 
		if(mySkillNum <= 5) {
			if(flag == true){
				$(this).appendTo("#mySkill > ul");
			}
		} else {
			$("ul#allSkill").siblings("span").css("color","red");
		}
		
	});

	$("#mySkill").delegate("li","click",function(){
		$(this).appendTo("#allSkill > ul");
	});

	$("#skillDefine").click(function(){
		var newSkill = $("#skillAdd").val();
		var mySkillNum = $("#mySkill>ul>li").length;
		var flag = true;
		$("#mySkill>ul>li").each(function(){
			if($(this).text() == newSkill){
				flag = false;
			}
		});
		var isEnglish  = true;
		if(/[^\x00-\xff]/g.test(newSkill)) {
			isEnglish = false;
		}
		if(mySkillNum <= 5){
			if(isEnglish == false){
				if(0 < newSkill.length && newSkill.length <= 4){
					if(flag == true){
						var newLi  = $("<li class = 'addSkill'>" + newSkill + "</li>");
						newLi.appendTo($("#mySkill>ul"));
						$(this).siblings("span").text("请限制在四个字以内(包括四个字)或12个英文字母以内").css("color","black");
						$("#skillAdd").val("");
					} else {
						$(this).siblings("span").text("该词条已经存在").css("color","red");
					}
				} else if( newSkill.length > 4){
					$(this).siblings("span").text("词条过长").css("color","red");
				}
			} else {
				if(0 < newSkill.length && newSkill.length <= 20) {
					if(flag == true) {
						var newLi  = $("<li class = 'addSkill'>" + newSkill + "</li>");
						newLi.appendTo($("#mySkill>ul"));
						$(this).siblings("span").text("请限制在四个字以内(包括四个字)或12个英文字母以内").css("color","black");
						$("#skillAdd").val("");
					} else {
						$(this).siblings("span").text("词条过长").css("color","red");
					}
				}
			} 
		} else {
			$(this).siblings("span").text("最多只能添加6个个人技能").css("color","red");
		}	
		return false;
	});

	$("#mySkill").delegate("li.addSkill","click",function(){
		$(this).detach();
	});

	var detect = setInterval(function() {
		var mySkillNum = $("#mySkill>ul>li").length;
		if(mySkillNum < 6) {
			$(".skillDefine").css("color","black");
			$("#skilltip").css("color","black");
		}
	},1000);
});