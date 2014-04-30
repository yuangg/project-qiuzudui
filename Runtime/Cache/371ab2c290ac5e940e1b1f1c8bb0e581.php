<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" xmlns:wb="http://open.weibo.com/wb">
<head>
<base href="__TMPL__">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">

  <link rel="stylesheet" type="text/css" href="Public/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="Public/css/home.css" />
  <link rel="stylesheet" type="text/css" href="Public/css/infoMessage.css" />
  <script type="text/javascript" src="Public/js/jquery-2.1.0.min.js"></script>
  <script src="Public/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src = "Public/js/change_password.js"></script>
  <script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
  <title>求组队</title>
</head>
<body>
  <!--content-->
  <div id="content">
    <!-- navigation-bar -->
      <div class="navbar">
        <div class="container-fluid">
          <!--brand-->
          <a class="brand private" href="">
            <img src="Public/images/logo.jpg" class="img-responsive" alt="Responsive image">
          </a>
          <!--register & login-->
          <div class="first-approch pull-right afterLogin private">
            <a href="__APP__/Profile/info"><img id="photo-private" src="Public/images/icons/<?php echo ($user["photo"]); ?>"></a>
          </div>
          <div class="first-approch pull-right afterLogin left private">
            <div id="privateName"><a href="__APP__/Profile/info">
              <img src="Public/images/private.png">
              <span id="name"><?php echo ($user["name"]); ?></span></a>
              <div id = "hiddenInfo" a_id = <?php echo ($ac["id"]); ?> u_id = <?php echo ($user["id"]); ?>>
              </div>
            </div>
            <div class="bottom">
              <div class="bottom1" id="private-info"><a href="__APP__/Profile/info"><img src="Public/images/info.png">个人信息</a></div>
              <div class="bottom1" id="logout"><a href="__APP__/Login/logout"><img src="Public/images/logout.png">退出</a></div>
            </div>
          </div>
        </div>
        <div class="navline">
          <div class="private shortline blueline"></div>
          <div class="private longline"></div>
          <span class="home"><a id="home" href="__APP__/Index/index">首页</a>|</span>
          <span class="home"><a id="home" href="__APP__/Team">我的队伍</a>|</span>
          <form class="search-bar" action="__APP__/Search/search" method="get">
            <input id="search" type="text" placeholder="搜索" name = "keyword">
            <button type="submit" class="btn btn-blue">
              <i class="icon-search icon-white"></i>
            </button>
          </form>
          <div class="private longline"></div>
          <div class="private shortline orangeline"></div>
        </div>
      </div>
      <!-- navigation-bar end -->

    <!--container-->
    <div class="container">
      <div class="header">个人信息</div>

      <div class="headerline grayline1"></div>
      <div class="headerline orangeline"></div>
      <div class="headerline grayline2"></div>

      <div class="message">
       <ul>
         <li><span class = "messageTitle">头像：   </span><img src="Public/images/icons/<?php echo ($user["photo"]); ?>" alt="头像" class="messageDetail">
         </li>
         <li>
          <span class ="messageTitle">邮箱：</span><span class = "messageDetail"><?php echo ($user["email"]); ?></span>
        </li>
         <li>
          <span class ="messageTitle">真实姓名：</span><span class = "messageDetail"><?php echo ($user["name"]); ?></span>
        </li>
         <li>
          <span class ="messageTitle">性别：</span><span class = "messageDetail"><?php echo ($user["gender"]); ?></span>
        </li>
        <li>
          <span class ="messageTitle">专业：</span><span class = "messageDetail"><?php echo ($user["major"]); ?></span>
        </li>
         <li>
          <span class ="messageTitle">年级：</span><span class = "messageDetail"><?php echo ($user["grade"]); ?></span>
        </li>
        <li> <span class ="messageEdit"><a href="__APP__/Profile">[编辑个人信息]</a></span><span class = "messageEdit passwordEdit">[修改密码]</span></li>
      </ul>
</div>
<div id="passwordChange">
 <form action="__APP__/Profile/changePassword"  class="form3" method = "post">
        <ul>
          <li>
            <label for = "orginalPassword">原有密码:</label><input type = "password" id="orginalPassword" class = "orginalPassword" name="orginalPassword" maxlength="16"/>
             <span>(请输入您的原有密码)</span>
          </li>
          <li>
            <label for = "newPassword">新密码：</label><input type="password" id="newPassword" class = "newPassword" name="newPassword" placeholder="密码" maxlength="16">
            <span>(请用大小写字母加数字或符号的组合)</span>
          </li>
          <li>
            <label for = "password-confirm">确认密码：</label><input type="password" id="password-confirm" class = "password-confirm" name="password-confirm" placeholder="确认密码" maxlength="16" />
            <span>(请再次输入相同的密码)</span>
          </li>
        <li id="submitButton">
         <button class="btn btn-warning" type="submit">确认修改</button>
         <button class="btn btn-warning" id = "cancelChange">取消修改</button>
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
            <a href="__APP__/Footer/aboutUs">关于我们</a> | <a href="__APP__/Footer/ad">广告合作</a> | <a href="__APP__/Footer/Links">友情链接</a><!--  | <a href="">手机版</a> | <a href="">客户端</a> -->
            <div class="weibo"><wb:follow-button uid="2347663625" type="red_1" width="67" height="24" ></wb:follow-button></div>
          </div>
          <div id = "copyright">
            © Copyright (c) 2013 | Powered by <a href="">求组队网</a>
          </div>
        </div>
      </div>
      <!--  footer end -->
</div>
<!--content end-->
</body>
</html>