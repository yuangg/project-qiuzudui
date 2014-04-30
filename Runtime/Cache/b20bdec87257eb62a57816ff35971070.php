<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<base href="__TMPL__">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">

  <link rel="stylesheet" type="text/css" href="Public/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="Public/css/home.css" />
  <link rel="stylesheet" type="text/css" href="Public/css/sign_up_individual.css" />
  <script type="text/javascript" src="Public/js/jquery-2.1.0.min.js"></script>
  <script type="text/javascript" src="Public/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src = "Public/js/form_vaild.js"></script>
  <script type="text/javascript" src = "Public/js/sign_jump.js"></script>
  <title>求组队</title>
</head>

<body>
  <!-- Main div block holding all the contents -->
  <div id="content">
    <!-- navigation-bar -->
    <div class="navbar">
      <div class="container-fluid">
        <!--brand-->
        <a class="brand" href="home.html">
          <img src="Public/images/logo.jpg" class="img-responsive" alt="Responsive image">
        </a>

        <!--register & login-->
        <div class="first-approch pull-right beforeLogin">
          <a href="__APP__/Register/register"><button class="reAndLoButton" id="register">注册</button></a>
          <form name="registerAndLogin" action="__APP__/Login/login" method="post">
            <input class="reAndLoInput" type="text" name="email" value="个人/社团ID" />
            <input class="reAndLoInput" type="password" name="password" value="密码" />
            <button class="reAndLoButton" type="submit" id="login">登陆</button>
          </form>
        </div>
      </div>
      <div class="navline">
        <div class="shortline blueline"></div>
        <div class="longline"></div>
        <span class="home"><a id="home" href="__APP__/Index/index">&nbsp;首页</a>&nbsp;|&nbsp;</span>
        <div class="search-bar">
          <input id="search" type="text" placeholder="搜索">
          <button class="btn btn-blue">
            <i class="icon-search icon-white"></i>
          </button>
        </div>&nbsp;
        <div class="longline"></div>
        <div class="shortline orangeline"></div>
      </div>
    </div>

    <!-- navigation-bar end -->

    <!-- container -->
    <div class="container">
      <div class="header">
        <span class="choice">请选择注册类别</span>
        <span class="individual">个人注册</span>
        <span class="association">社团注册</span>
      </div>

      <div id="horizonLine1" class="headerline grayline1"></div>
      <div id="horizonLine2" class="headerline orangeline"></div>
      <div id="horizonLine3" class="headerline grayline3"></div>

      <div class="registBox" id="personalBox">
        <form action="__APP__/Register/personalRegister"  class="form2" id="form2" method = "post" name="">
          <ul>
            <li>
              <lable for = "email">邮箱:</lable><input type = "text" id="email" class = "email" name="email" placeholder="@" / >
              <span>请填写有效的电子邮件地址，以便于找回密码
              </span>
            </li>
            <li>
              <lable for = "password">登录密码：</lable><input type="password" id="password" class = "password" name="password" placeholder="密码" maxlength="16">
              <span>请用大小写字母加数字或符号的组合</span>
            </li>
            <li>
              <lable for = "password-confirm">确认密码：</lable><input type="password" id="password-confirm" class = "password-confirm" name="password-confirm" placeholder="确认密码" />
              <span>请再次输入相同的密码</span>
            </li>
          </li>
          <li id="submitButton">
           <button class="btn btn-warning" type="submit">注册</button><span>(请注册后到"个人信息"处完善个人信息)</span>
         </li>
       </ul>
     </form>
   </div>



    <div class="registBox" id="societyBox">
        <form action="__APP__/Register/societyRegister" id="form3" class="form3" method = "post" name="">
          <ul>
           <li>
              <lable for = "societyName">社团全称:</lable><input type = "text" id="societyName" class = "societyName" name="societyName" placeholder="3-8个字符" maxlength="15" / >
              <span>请填写您的社团全称</span>
            </li>
            <li>
              <lable for = "societyEmail">邮箱:</lable><input type = "text" id="societyEmail" class = "societyEmail" name="societyEmail" placeholder="@" / >
              <span>请填写有效的电子邮件地址，以便于找回密码</span>
            </li>
            <li>
              <lable for = "societyPassword">登录密码：</lable><input type="password" id="societyPassword" class = "societyPassword" name="societyPassword" placeholder="密码" maxlength="16">
              <span>请用大小写字母加数字或符号的组合</span>
            </li>
            <li>
              <lable for = "societyPassword-confirm">确认密码：</lable><input type="password" id="societyPassword-confirm" class = "societyPassword-confirm" name="societyPassword-confirm" placeholder="确认密码" />
              <span>请再次输入相同的密码</span>
            </li>
          </li>
          <li id="submitButton">
           <button class="btn btn-warning" type="submit">注册</button><span>(请注册后到"社团信息"处完善社团信息)</span>
         </li>
       </ul>
     </form>
   </div>


 </div>
 <!-- container end -->

 <!--  footer -->
 <div id = "footer">
  <div class="footline cyanline"></div>
  <div class = "footerContent">
    <div id = "footer-column">
      <a href="">关于我们</a> | <a href="">广告合作</a> | <a href="">友情链接</a> | <a href="">手机版</a> | <a href="">客户端</a>
    </div>
    <div id = "copyright">
      © Copyright (c) 2013 | Powered by <a href="">求组队网</a>
    </div>
  </div>
</div>
<!--  footer end -->
</div>
<!-- content end -->
</body>
</html>