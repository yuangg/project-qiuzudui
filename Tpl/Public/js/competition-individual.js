var findTeamAbled = function(endtime){
	var date = new Date();
	var year = date.getFullYear();
	var month = date.getMonth() + 1;
	var day = date.getDate();
	var time = year + '-' + month + '-' + day;
	if(month < 10){
		time = year + '-0' + month + '-' + day;
	}
	if(time > endtime){
		return false;
	}
	return true;
}

$(document).ready(function(){
	//info->tagChoose
	$('#findTeam').click(function(){
		c = 0;
		$('.tag-region button').each(function(){
			if($(this).hasClass('current')){
				$(this).removeClass('current');
			}
		});
		$('#info').hide();
		$(".info-block.detail").hide();
		$('#tagChoose').show();
	});
    //tagChoose->info
	$('#closeTag').click(function(){
		$('#tagChoose').hide();
		$('#info').show();
		$(".info-block.detail").show();
	});
    //tagChoose-recoMate
	$('#ensure').click(function(){
		if (c == 0) {
			alert('请选择至少一个');
			return false;
		}
	});
    //recoMate->info
	$('#closeTag1').click(function(){
		$('#recoMate').hide();
		$('#info').show();
		$(".info-block.detail").show();
	});

    var a = 0;
	$('#another').click(function(){

		var len = $('.change-to-another').length;
		$($('.change-to-another').get(a++)).hide();
		if(a == len){
			a = 0;
		}
		$($('.change-to-another').get(a)).show();
	});

    //tag choose
    var c = 0;
	$('.tag-region button').each(function(){
		$(this).click(function(event) {
		    if($(event.target).hasClass('current')){
		    	$(event.target).removeClass('current');
				c--;
			} else{
				$(event.target).addClass('current');
				c++;
			}
			if(c == 4){
			    $("#myModal1").modal('show');
			    $(event.target).removeClass('current');
			    c--;
			    return false;
		    }
		});
	});
	var flag = true,
    teamSize = 0,
    findTeamMate = true;
    size = $("#teamSize").text();
    maxSize = /\d-(\d)/.exec(size)[1];
	/*$('.matePhoto').each(function(){
		var index = $('.matePhoto').index($(this));
		var direction = 'right';
		if(index % 8 % 4 == 2 || index % 8 % 4 == 3){
			direction = 'left';
		}
		$(this).popover({
			html: 'true',
			placement: direction,
			trigger: "hover",
			content: "<div id='mateName'>宿海仁太</div><div id='mateDetail'>男，本科2011级<br>软件学院 软件工程专业<br>标签：动漫、编程、网球</div>"
		}); 
		$(this).click(function(){
			if(!findTeamMate){
				return false;
			}
			$(".plusMate").eq(index).css("background-color", "#ff974f");
			if(teamSize == maxSize){
				$("#myModal").modal('show');
				findTeamMate = false;
			}
			teamSize++;
		});     
	});*/
});