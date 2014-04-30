$(function(){
    //a flag to detemine the ability of login
    var $logState = false;

    $(".societyName").change(function(){
      var val = $(this).val().length;
      var span = $(this).siblings("span");
      if(val < 3) {
        span.text("您输入的字符少于3位，不合要求呀~").css("color","red");
        $logState = false;
      } else{
       span.text("");
       $logState = true;
     }
   });

    //verify the password
    $(".password").keyup(function(){
      var val = $(".password").val().length;
      if(val > 0){
        $(".password").siblings("span").text("请用大小写字母加数字或符号的组合").css("color","black");   
        $logState = true;
      }
    });
    
    //verify the password-confirm
    $(".password-confirm").change(function(){
      var cpasswordConfirm = $(this).val();
      var span = $(this).siblings("span");
      if(cpasswordConfirm != $(".password").val()){
        span.text("您两次输入的密码不一致").css("color","red");
        $logState = false;
      } else if(cpasswordConfirm == $(".password").val()){
       span.text("");
       $logState = true;
     }
   });

    $(".email").change(function(){
      var span = $(this).siblings("span");
      if (!/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test($(this).val())){
       span.text("您输入的邮箱格式不正确呦").css("color","red");
       $logState = false;
     }else{
       span.text("");
       $logState = true;
     }
   });

    $(".form2").submit(function(){ 

     var societyNameLength = $(".societyName").val().length;
     var emailLength = $(".email").val().length;
     var passwordLength = $(".password").val().length;
     var passwordConfirmLength = $(".password-confirm").val().length;

     if(societyNameLength == 0){
      $(".societyName").siblings("span").text("请填写您的社团全称").css("color","red");
      $logState = false;
    } 

    if(passwordLength == 0){
      $(".password").siblings("span").text("请填写您的密码").css("color","red");
      $logState = false;
    } 

    if(passwordConfirmLength == 0){
      if(passwordLength == 0){
        $(".password-confirm").siblings("span").text("请先填写您的密码");
        $logState = false;
      } else {
       $(".password-confirm").siblings("span").text("请填写您的确认密码");
       $logState = false;
     }
   }

   if(emailLength == 0){
    $(".email").siblings("span").text("请填写您的邮箱").css("color","red");
    $logState = false;
  } 
  if($logState == false ){
     alert(12);
    return false;
  } else {

   return true;
 }
});
});
