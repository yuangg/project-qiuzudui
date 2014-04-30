$(document).ready(function(){
    var $logState = true;
	$('input[id=lefile]').change(function() {
        $('#photoCover').val($(this).val());
    });

    $('input[id=upload]').change(function(){
    	$("#imageCover").val($(this).val());
    });

    $("#email").change(function(){
        var span = $(this).siblings('span');
        if($(this).val() == "" || !/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test($(this).val())){
            span.text("您输入的邮箱格式不正确呦").css('color', 'red');
            $logState = false;
        } else{
            span.text("");
            $logState = true;
        }
    });

    $("#infoForm").submit(function(){
        if($logState == false){
            return false;
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