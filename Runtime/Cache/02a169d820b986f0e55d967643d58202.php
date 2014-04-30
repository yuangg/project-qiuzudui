<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" xmlns:wb="http://open.weibo.com/wb">
<head>
<base href="__TMPL__">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="Public/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="Public/bootstrap/css/bootstrap-datetimepicker.min.css" />
  <link rel="stylesheet" type="text/css" href="Public/css/postCompetition.css" />
  <link rel="stylesheet" type="text/css" href="Public/css/home.css" />
  <link rel="stylesheet" type="text/css" href="Public/css/public_info_edit.css" />
  <link rel="stylesheet" type="text/css" href="Public/css/skill.css">
  <script type="text/javascript" src="Public/js/jquery-2.1.0.min.js"></script>
  <script type="text/javascript" src="Public/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="Public/js/public_info_edit.js"></script>
  <script type="text/javascript" src = "Public/js/skill.js"></script>
  <script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript" charset="UTF-8">

	$(document).ready(function(){
    console.log($('#poster').attr('value'));
		$("#infoForm").submit(function(event){
			  $("#myAllSkill li").each(function(){
				  $("#hiddenSkill").val($("#hiddenSkill").val() + $(this).text() + ",");
			  });
		});
	});
	</script>
  <title>求组队</title>
</head>

<body>
  <!--content-->
  <div id="content">
    <!-- navigation-bar -->
      <div class="navbar">
        <div class="container-fluid">
          <!--brand-->
          <a class="brand private" href="__APP__/Index/index">
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
      <div id="post">个人信息</div>
      <div class="header">
        <div id="postline"></div>
      </div>
      <form id="infoForm" class = "privateInfoForm" action="__APP__/Profile/changeProfile" method="post" enctype="multipart/form-data">
        <div class="info-block">
          <div class="info" style="margin-top:25px">头&nbsp;&nbsp;像：</div>
          <div class="photo">
            <img id="poster" src="Public/images/icons/<?php echo ($user["photo"]); ?>">
            <input type="file" name="photo" id="upload" class="form-control info-value" style="display:none">
            <a id="upload-image" class="btn" onclick="$('input[id=upload]').click();">上传图片</a>
            <span>文件不超过2MB,类型为JPG或PNG</span>
          </div>
        </div>
        <div class="info-block">
          <div class="info">邮  箱：</div>
          <input id="email" type="text" name="email" class="info-value" value = "<?php echo ($user["email"]); ?>">
          <span class="tip">请填写有效的电子邮箱地址，以便于找回密码</span>
        </div>
        <div class="info-block">
          <div class="info">真实姓名：</div>
          <input id = "realname" type="text" name="name" class="info-value" value = "<?php echo ($user["name"]); ?>">
          <span class="tip">请填写真实姓名</span>
        </div>
        <div class="info-block gender-block">
          <div class="info">性  别：</div>
          <span class="gender">男</span><input type="radio" name="gender" value="male" class="info-value" checked>&nbsp;
          <span class="gender">女</span><input type="radio" name="gender" value="female" class="info-value">
        </div>
        <div class="info-block">
          <div class="info">专  业：</div>
          <input id = "major" type="text" name="major" class="info-value" value = "<?php echo ($user["major"]); ?>">
          <span class="tip">请填写专业名称</span>
        </div>
        <div class="info-block">
          <div class="info">年  级：</div>
          <select id = "grade" name="grade" class="info-value" value = "<?php echo ($user["grade"]); ?>">
            <option value="2014">2014</option>
            <option value="2013">2013</option>
            <option value="2012">2012</option>
            <option value="2011">2011</option>
            <option value="2010">2010</option>
            <option value="2009">2009</option>
            <option value="2008">2008</option>
            <option value="2007">2007</option>
          </select>
        </div>
        <input id = "hiddenSkill" type="hidden" name="skills">
        <div class="info-block">
          <div class="info">技能/特点(单击选择/取消)：</div>
          <div id="skill">
            <div id="mySkill">
              <ul id="myAllSkill">
              <?php if(is_array($abilities)): foreach($abilities as $key=>$ab): ?><li><?php echo ($ab); ?></li><?php endforeach; endif; ?>
              </ul>
            </div>
          </div>
        </div>
         <div class="info-block">
          <div class="info">手动添加：</div>
          <input type="text"  class="info-value" id = "skillAdd">
          <button class="btn btn-default" id = "skillDefine">确定</button>
          <br />
        <span id = "skillDefine"></span>
        </div>
        <div class="info-block">
        	<div class="info" style="margin-top:2px">待选技能/特点：</div>
           	<div id="allSkill">
              <ul id = "allSkill">
                <li>美工</li>
                <li>编程</li>
                <li>设计</li>
                <li>文案</li>
                <li>策划</li>
                <li>摄影</li>
                <li>硬件</li>
                <li>管理</li>
                <li>翻译</li>
                <li>金融</li>
                <li>统计</li>
                <li>展示</li>
                <li>幽默</li>
                <li>文史</li>
                <li>哲学</li>
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
            <a href="__APP__/Footer/aboutUs">关于我们</a> | <a href="__APP__/Footer/ad">广告合作</a> | <a href="__APP__/Footer/Links">友情链接</a><!--  | <a href="">手机版</a> | <a href="">客户端</a> -->
            <div class="weibo"><wb:follow-button uid="2347663625" type="red_1" width="67" height="24" ></wb:follow-button></div>
          </div>
          <div id = "copyright">
            © Copyright (c) 2013 | Powered by <a href="__APP__/Index/index">求组队网</a>
          </div>
        </div>
      </div>
      <!--  footer end -->
  </div>
  <!--content end-->
</body>
</html>