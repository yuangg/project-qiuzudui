$(function(){

  //verify the form of personalSignUpForm;
  var $logState = false;

  $(".email").change(function(){
    var span = $(this).siblings("span");
    if (!/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test($(this).val())){
     span.text("您输入的邮箱格式不正确呦").css("color","red");
     $logState = false;
   }else{
     span.text(" ");
     $logState = true;
   }
 });

  $(".password").keyup(function(){
    var val = $(".password").val().length;
    if(val > 0){
      $(".password").siblings("span").text("").css("color","black");   
      $logState = true;
    }
  });

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

  $(".form2").submit(function(){

    var societyNameLength = $(".societyName").val().length;
    var passwordLength = $(".password").val().length;
    var passwordConfirmLength = $(".password-confirm").val().length;
    if(passwordLength == 0){
      $(".password").siblings("span").text("请填写您的密码").css("color","red");
      $logState = false;
    } 
    if(passwordConfirmLength == 0){
      $(".password-confirm").siblings("span").text("请先填写您的密码");
      $logState = false;
    }
    var emailLength = $(".email").val().length;
    if(emailLength == 0){
      $(".email").siblings("span").text("请填写您的邮箱").css("color","red");
      $logState = false;
    } 

    if($logState == false ){
      return false;
    } else {
      return true;
    }
  });

  //verify the associationSignUpForm

  var $societyLogState = false;
  $("#societyName").change(function(){
    var val = $(this).val().length;
    var span = $(this).siblings("span");
    if(val < 3) {
      span.text("您输入的字符少于3位，不合要求呀~").css("color","red");
      $societyLogState = false;
    } else{
     span.text(" ");
     $societyLogState = true;
   }
 });

  $("#societyEmail").change(function(){
    var span = $(this).siblings("span");
    if (!/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test($(this).val())){
     span.text("您输入的邮箱格式不正确呦").css("color","red");
     $societyLogState = false;
   }else{
     span.text(" ");
     $societyLogState = true;
   }
 });

  $("#societyPassword").keyup(function(){
    var val = $("#societyPassword").val().length;
    if(val > 0){
      $("#societyPassword").siblings("span").text("").css("color","black");   
      $societyLogState = true;
    }
  });

  $("#societyPassword-confirm").change(function(){
    var cpasswordConfirm = $(this).val();
    var span = $(this).siblings("span");
    if(cpasswordConfirm != $("#societyPassword").val()){
      span.text("您两次输入的密码不一致").css("color","red");
      $societyLogState = false;
    } else if(cpasswordConfirm == $("#societyPassword").val()){
     span.text("");
     $societyLogState = true;
   }
  });

  $("#form3").submit(function(){

    var societyNameLength = $("#societyName").val().length;
    var passwordLength = $("#societyPassword").val().length;
    var passwordConfirmLength = $("#societyPassword-confirm").val().length;

     if(societyNameLength == 0){
      $("#societyName").siblings("span").text("请填写您的社团全称").css("color","red");
      $societyLogState = false;
    } 
    if(passwordLength == 0){
      $("#societyPassword").siblings("span").text("请填写您的密码").css("color","red");
      $societyLogState = false;
    } 
    if(passwordConfirmLength == 0){
      $("#societyPassword-confirm").siblings("span").text("请先填写您的密码");
      $societyLogState = false;
    }
    var emailLength = $("#societyEmail").val().length;
    if(emailLength == 0){
      $("#societyEmail").siblings("span").text("请填写您的邮箱").css("color","red");
      $societyLogState = false;
    } 

    if($societyLogState == false ){
      return false;
    } else {
      return true;
    }
  });
});

