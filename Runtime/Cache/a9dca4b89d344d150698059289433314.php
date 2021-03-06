<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<base href="__TMPL__">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">

  <link rel="stylesheet" type="text/css" href="Public/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="Public/css/home.css" />
  <link rel="stylesheet" type="text/css" href="Public/css/infoMessage.css" />
  <script src="Public/js/jquery-2.1.0.min.js"></script>
  <script src="Public/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src = "Public/js/change_password.js"></script>
  <title>求组队社团信息</title>
</head>

<body>
  <!-- Main div block holding all the contents -->
  <div id="content">
    <!-- navigation-bar -->
    <div class="navbar">
        <div class="container-fluid">
          <!--brand-->
          <a class="brand" href="__APP__/Index/index">
            <img src="Public/images/logo.jpg" class="img-responsive" alt="Responsive image">
          </a>
          <!--register & login-->
          <div class="first-approch pull-right afterLogin">
            <a href="__APP__/Profile/info"><img id="photo-public" src="Public/images/icons/<?php echo ($user["photo"]); ?>"></a>
          </div>
          <div class="first-approch pull-right afterLogin left">
            <div id="publicName"><a href="__APP__/Profile/info">
              <img src="Public/images/team.png">
              <span id="name"><?php echo ($user["name"]); ?></span></a>
            </div>
            <div class="bottom">
              <div class="bottom1" id="public-info"><a href="__APP__/Profile/info"><img src="Public/images/info.png">社团信息</a></div>
              <div class="bottom1" id="logout"><a href="__APP__/Login/logout"><img src="Public/images/logout.png">退出</a></div>
            </div>
          </div>
        </div>
        <div class="navline">
          <div class="public shortline blueline"></div>
          <div class="public longline"></div>
          <span class="home"><a id="home" href="__APP__/Index/index">首页</a>|</span>
          <span class="home"><a id="home" href="__APP__/Activity/activity_society">我的比赛</a>|</span>
          <span class="home"><a id="home" href="__APP__/Activity/index_postActivity">发布比赛</a>|</span>
          <div class = "search-bar">
            <input id="search" type="text" placeholder="搜索比赛" />
            <button class = "btn btn-blue">
              <i class="icon-search icon-white"></i>
            </button>
          </div>
          <div class="public longline"></div>
          <div class="public shortline orangeline"></div>
        </div>
    </div>
  </div>

  <!-- navigation-bar end -->

  <!-- container -->
  <div class="container">
    <div class="header">社团信息</div>

    <div class="headerline grayline1"></div>
    <div class="headerline orangeline"></div>
    <div class="headerline grayline2"></div>

    <div class="message">
     <ul>
       <li><span class = "messageTitle">标志:</span><img src="Public/images/icons/<?php echo ($user["photo"]); ?>" alt="头像" class="messageDetail">
       </li>
       <li>
        <span class ="messageTitle">邮箱：</span><span class = "messageDetail"><?php echo ($user["email"]); ?></span>
      </li>
      <li>
        <span class ="messageTitle">网站/微博：</span><span class = "messageDetail detailLink"><a href="<?php echo ($user["weibo"]); ?>"><?php echo ($user["weibo"]); ?></a></span>
      </li>
      <li>
        <span class ="messageTitle">社团全称：</span><span class = "messageDetail"><?php echo ($user["name"]); ?></span>
      </li>
      <li>
        <span class ="messageTitle">微信：</span><span class = "messageDetail detailLink"><a href = "<?php echo ($user["wechat"]); ?>"><?php echo ($user["wechat"]); ?></a></span>
      </li>
      <li>
        <span class ="messageTitle">社团简介：</span><span class = "messageDetail"><?php echo ($user["introduction"]); ?></span>
      </li>
      <li> <span class ="messageEdit"><a href="__APP__/Profile">[编辑社团信息]</a></span><span class = "messageEdit passwordEdit">[修改密码]</span></li>
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
      <a href="">关于我们</a> | <a href="">广告合作</a> | <a href="">友情链接</a> | <a href="">手机版</a> | <a href="">客户端</a>
    </div>
    <div id = "copyright">
      © Copyright (c) 2013 | Powered by <a href="">求组队网</a>
    </div>
  </div>
</div>
<!--  footer end -->
<!-- content end -->
</body>
</html>