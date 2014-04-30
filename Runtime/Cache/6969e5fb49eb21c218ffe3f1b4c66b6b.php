<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
  <base href="__TMPL__">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">

    <link rel="stylesheet" type="text/css" href="Public/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="Public/bootstrap/css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" type="text/css" href="Public/css/postCompetition.css" />
    <link rel="stylesheet" type="text/css" href="Public/css/home.css" />
    <link rel="stylesheet" type="text/css" href="Public/css/public_info_edit.css" />
    <script type="text/javascript" src="Public/js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="Public/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src = "Public/js/public_info_edit.js"></script>
    <title>求组队</title>
  </head>

  <body>
  <!--content-->
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
      <!-- navigation-bar end -->

    <!--container-->
    <div class="container">
      <div id="post">社团信息</div>
      <div class="header">
        <div id="postline"></div>
      </div>
      <form id="infoForm" action="__APP__/Profile/changeProfile" method="post" enctype="multipart/form-data">
        <div class="info-block">
          <div class="info">头&nbsp;&nbsp;像：</div>
          <div class="photo">
            <img id="poster" src="Public/images/icons/<?php echo ($user["photo"]); ?>">
            <input type="file" name="photo" id="upload" class="form-control info-value" style="display:none">
            <a id="upload-image" class="btn" onclick="$('input[id=upload]').click();">上传图片</a>
            <span>文件不超过2MB,类型为JPG或PNG</span>
          </div>
        </div>
        <div class="info-block">
          <div class="info">社团名称：</div>
          <input type="text" id="publicName" name="publicName" class="info-value" maxlength="15"><span></span>
        </div>
        <div class="info-block">
          <div class="info">邮  箱：</div>
          <input type="text"  name="email" class="info-value" id="email" placeholder="@" >
          <span class="tip">请填写有效的电子邮箱地址，以便于找回密码</span>
        </div>
        <div class="info-block">
          <div class="info">网站/微博：</div>
          <input type="text" name="websiteORweibo" class="info-value" placeholder="http://">
        </div>
        <div class="info-block">
          <div class="info">微  信：</div>
          <input type="text" name="weixin" class="info-value" placeholder="微信号/QQ/手机">
        </div>
        <div class="info-block">
          <div class="info">社团简介：</div>
          <textarea cols="100" name="intro" rows="5" id="intro" class="info-value" placeholder="不要超过2000字哦" maxlength="2000"></textarea>
        </div>

        <button type="submit" class="btn btn-default" id="submit">提  交</button>
      </form>
    </div>


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
  <!--content end-->
  </body>
</html>