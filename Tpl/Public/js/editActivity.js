$(document).ready(function(){
    $("#preview").click(function(){
        return false;
    });

    //a global variable to detemine the state of submit;
    var $logState = true;

    $('input[id=lefile]').change(function() {
        $('#photoCover').val($(this).val());
    });

    $('input[id=upload]').change(function(){
    	$("#imageCover").val($(this).val());
    });
    
    if($('#photoCover').val == ""){
        $('#photoCover').val($('input[id=lefile]').val());
    }

    if($('#imageCover').val == ""){
        $('#imageCover').val($('input[id=upload]').val());
    }

    $("#title").change(function(){
        var titleLength = $(this).val().length;
        if(titleLength > 0){
            $(this).siblings("span").text("");
            $logState = true;
        }
    });

    $("#startTime").change(function(){
        var startTime = $("#startTime").val().length;
        if(startTime > 0){
            $("#dtp_input1").siblings("span").text("");
            $logState = true;
        }
    });

    $("#endTime").change(function(){
        var startTime = $("#endTime").val().length;
        if(startTime > 0){
            $("#dtp_input2").siblings("span").text("");
            $logState = true;
        }
    });

    $("#registrationEndTime").change(function(){
        var startTime = $("#registrationEndTime").val().length;
        if(startTime > 0){
            $("#dtp_input3  ").siblings("span").text("");
            $logState = true;
        }
    });

    $("#maxSize").keyup(function(event) {
        //判断人数
        var span = $("#maxSize").siblings("span");
        var maxSize = $("#maxSize").val();
        var minSize = $("#minSize").val();
        if( (maxSize < minSize) || (maxSize.length >0 && minSize.length == 0)){
            span.text("(队伍人数不符合格式)").css("color","red");
            $logState = false;
        } else {
            span.text("");
            $logState = true;
        }
    });

    $("#minSize").keyup(function(event) {
        //判断人数
        var span = $("#maxSize").siblings("span");
        var maxSize = $("#maxSize").val();
        var minSize = $("#minSize").val();
        if((maxSize.length != 0 && maxSize < minSize)){
            span.text("(队伍人数不符合格式)").css("color","red");
            $logState = false;
        } else {
            span.text("");
            $logState = true;
        }
    });

    $(".form-horizontal").submit(function(){
        console.log('submitting');
        var title = $("#title").val().length;
        if(title == 0){
            //$("#title").siblings("span").text("(标题不能为空)").css("color","red");
        	$("#title").siblings('span').text("(标题不能为空)").css("color","red");
            $logState =  false;
        }
        var startTime = $("#startTime").val().length;
        if(startTime == 0){
            $("#dtp_input1").siblings("span").text("(请选择比赛时间)").css("color","red");
            $logState = false;
        }

        var endTime = $("#endTime").val().length;
        if(endTime == 0){
            $("#dtp_input2").siblings("span").text("(请选择比赛结束时间)").css("color","red");
        }

        var registrationEndTime = $("#registrationEndTime").val().length;
        if(registrationEndTime == 0){
            $("#dtp_input3").siblings("span").text("(请选择报名截至时间)").css("color","red")
        }

        var teamMinSize = $("#minSize").val().length;
        var teamMaxSize = $("#maxSize").val().length;
        if(teamMinSize == 0 && teamMinSize == 0){
            $("#maxSize").siblings("span").text("(请填写比赛队伍人数)").css("color","red");
        }
        if((teamMinSize == 0 && teamMaxSize >0) || (teamMaxSize == 0 && teamMinSize > 0)){
            $("#maxSize").siblings("span").text("(队伍人数不符合格式)").css("color","red");
            $logState = false;
        }

        var posterSrc = $("#poster").attr("src");
        if(posterSrc == "#") {
            var posterPictureTip = $("#posterPicture");
            posterPictureTip.text("(请上传图片)").css("color","red"); 
            $logState = false;
        } else {
            $logState = true;
        }
  
        if($logState == false){
            return false;
        } else {
            return true;
        }
    });
});

window.onload = function(){
	var file = document.getElementById("upload");
	var pic = document.getElementById("poster");

	file.onchange = function(){
		change(file,pic);
	};
};

function change(file,pic) {

 var ext=file.value.substring(file.value.lastIndexOf(".")+1).toLowerCase();
     // gif在IE浏览器暂时无法显示
     if(ext!='png'&&ext!='jpg'&&ext!='jpeg'){
         alert("文件必须为图片！"); return false;
     }
     // IE浏览器
     if (document.all) {

         file.select();
         var reallocalpath = document.selection.createRange().text;
         var ie6 = /msie 6/i.test(navigator.userAgent);
         // IE6浏览器设置img的src为本地路径可以直接显示图片
         if (ie6) pic.src = reallocalpath;
         else {
             // 非IE6版本的IE由于安全问题直接设置img的src无法显示本地图片，但是可以通过滤镜来实现
             pic.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='image',src=\"" + reallocalpath + "\")";
             // 设置img的src为base64编码的透明图片 取消显示浏览器默认图片
             pic.src = 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==';
         }
     }else{
         html5Reader(file);
     }
 }

 function html5Reader(file){
     var file = file.files[0];
     var pic = document.getElementById("poster");
     var reader = new FileReader();
     reader.readAsDataURL(file);
     reader.onload = function(e){
         pic.src=this.result;
     };
 }