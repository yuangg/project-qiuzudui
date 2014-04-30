<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<base href="__TMPL__">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">

  <link rel="stylesheet" type="text/css" href="Public/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="Public/bootstrap/css/bootstrap-datetimepicker.min.css" />
  <link rel="stylesheet" type="text/css" href="Public/css/postCompetition.css" />
  <link rel="stylesheet" type="text/css" href="Public/css/public_info_edit.css" />
  <link rel="stylesheet" type="text/css" href="Public/css/skill.css">
  <script type="text/javascript" src="Public/js/jquery-2.1.0.min.js"></script>
  <script type="text/javascript" src="Public/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="Public/js/public_info_edit.js"></script>
  <script type="text/javascript" src = "Public/js/skill.js"></script>
  <title>求组队</title>
</head>

<body>
  <!--content-->
  <div id="content">
    <!-- navigation-bar -->
    <div class="navbar">
        <div class="container-fluid">
          <!--brand-->
          <a class="brand" href="home_afterlogin_private.html">
            <img src="Public/images/logo.jpg" class="img-responsive" alt="Responsive image">
          </a>
          <!--register & login-->
          <div class="first-approch pull-right afterLogin">
            <a href="6individual_info.html"><img id="photo-private" src="Public/images/photoPrivate.png"></a>
          </div>
          <div class="first-approch pull-right afterLogin left">
            <div id="privateName"><a href="6individual_info.html">
              <img src="Public/images/private.png">
              <span id="name"><?php echo ($user["name"]); ?></span></a>
            </div>
            <div class="bottom">
              <div class="bottom1" id="private-info"><a href="__APP__/Profile"><img src="Public/images/info.png">个人信息</a></div>
              <div class="bottom1" id="logout"><a href="__APP__/Login/logout"><img src="Public/images/logout.png">退出</a></div>
            </div>
          </div>
        </div>
        <div class="navline">
          <div class="private shortline blueline"></div>
          <div class="private longline"></div>
          <span class="home"><a id="home" href="__APP__/Index/index">首页</a>|</span>
          <span class="home"><a id="home" href="">我的队伍</a>|</span>
          <div class = "search-bar">
            <input id="search" type="text" placeholder="搜索比赛" />
            <button class = "btn btn-blue">
              <i class="icon-search icon-white"></i>
            </button>
          </div>
          <div class="private longline"></div>
          <div class="private shortline orangeline"></div>
        </div>
      </div>
    <!-- navigation-bar end -->

    <!--container-->
    <div class="container">
      <div id="post">个人信息</div>
      <div class="header">
        <div id="postline"></div>
      </div>
      <form id="infoForm" action="#" method="post">
        <div class="info-block">
          <div class="info">头&nbsp;&nbsp;像：</div>
          <div class="photo">
            <img id="poster" src="Public/images/photoPublic.png">
            <input type="file" name="photo" id="upload" class="form-control info-value" style="display:none">
            <a id="upload-image" class="btn" onclick="$('input[id=upload]').click();">上传图片</a>
            <span>文件不超过2MB,类型为JPG或PNG</span>
          </div>
        </div>
        <div class="info-block">
          <div class="info">邮  箱：</div>
          <input id="email" type="text" name="email" class="info-value" placeholder="@">
          <span class="tip">请填写有效的电子邮箱地址，以便于找回密码</span>
        </div>
        <div class="info-block">
          <div class="info">真实姓名：</div>
          <input type="text" name="name" class="info-value">
          <span class="tip">请填写真实姓名</span>
        </div>
        <div class="info-block gender-block">
          <div class="info">性  别：</div>
          <span class="gender">男</span><input type="radio" name="gender" value="male" class="info-value" checked>&nbsp;
          <span class="gender">女</span><input type="radio" name="gender" value="female" class="info-value">
        </div>
        <div class="info-block">
          <div class="info">专  业：</div>
          <input type="text" name="major" class="info-value">
          <span class="tip">请填写专业名称</span>
        </div>
        <div class="info-block">
          <div class="info">年  级：</div>
          <select name="grade" class="info-value">
            <option value="大一">大一</option>
            <option value="大二">大二</option>
            <option value="大三">大三</option>
            <option value="大四">大四</option>
            <option value="研一">研一</option>
            <option value="研二">研二</option>
            <option value="研三">研三</option>
          </select>
        </div>
        <div class="info-block">
          <div class="info">技能/特点(单击选择/取消)：</div>
          <div id="skill">
            <div id="mySkill">
              <ul></ul>
            </div>
          </div>
        </div>
         <div class="info-block">
          <div class="info">手动添加：</div>
          <input type="text"  class="info-value" id = "skillAdd">
          <button class="btn btn-default" id = "skillDefine">确定</button>
        </div>
        <div class="info-block">
          <div class="info">待选技能/特点：</div>
           <div id="allSkill">
              <ul id = "allSkill">
                <li>美工</li>
                <li>编程</li>
                <li>传设院</li>
                <li>管理学院</li>
                <li>翻译</li>
                <li>翻译学院</li>
                <li>摄影</li>
                <li>文案</li>
                <li>活动策划</li>
                <li>女生</li>
                <li>男生</li>
                <li>东校区</li>
                <li>珠海校区</li>
                <li>南校区</li>
                <li>北校区</li>
              </ul>
            </div>
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