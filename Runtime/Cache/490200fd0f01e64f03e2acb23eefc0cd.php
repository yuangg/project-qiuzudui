<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" xmlns:wb="http://open.weibo.com/wb">
  <head>
  <base href="__TMPL__">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">

    <link rel="stylesheet" type="text/css" href="Public/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="Public/css/home.css" />
    <link rel="stylesheet" type="text/css" href="Public/css/sign_up_individual.css" />
    <link rel="stylesheet" type="text/css" href="Public/css/myTeams.css" />
    <script type="text/javascript" src="Public/js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="Public/js/jquery.pagination.js"></script>
    <script type="text/javascript" src="Public/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="Public/js/home.js"></script>
    <script type="text/javascript" src = "Public/js/sign_jump.js"></script>
    <script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
	<script>
	$(document).on("click", ".invitationItem", function() {
	  	var id = $(this).attr("ac_id");
	  	var newForm = document.createElement("form");
  		newForm.action = "__APP__/Activity/activity_personal";
  		newForm.method = "get";
  		var msg = document.createElement("input");
  		msg.type="hidden";
  		msg.value = id;
  		msg.name = "ac_id";
  		newForm.appendChild(msg);
  		newForm.submit();
    })
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

      <!-- container -->
    <div class="container">
      <div class="header">
        <span class="individual">被邀请</span>
        <span class="association">发出的邀请</span>
      </div>

      <div id="horizonLine1" class="headerline grayline1"></div>
      <div id="horizonLine2" class="headerline orangeline"></div>
      <div id="horizonLine3" class="headerline grayline3"></div>

      <div class="registBox" id="personalBox">
      	<?php if(is_array($inviteeList)): foreach($inviteeList as $key=>$invitation): ?><div class="item">
	          <span class="name"><?php echo ($invitation["invitorName"]); ?></span>在<a class = "invitationItem" ac_id = "<?php echo ($invitation["activity_id"]); ?>"><span><?php echo ($invitation["activityName"]); ?></span></a>中邀请了我
	        </div><?php endforeach; endif; ?>
      </div>

      <div class="registBox" id="societyBox">
      	<?php if(is_array($invitorList)): foreach($invitorList as $key=>$invitation): ?><div class="item">我在<a class = "invitationItem" ac_id = "<?php echo ($invitation["activity_id"]); ?>"><span><?php echo ($invitation["activityName"]); ?></span></a>中邀请了<span class="name"><?php echo ($invitation["inviteeName"]); ?></span>
		    </div><?php endforeach; endif; ?>
      </div>
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
            © Copyright (c) 2013 | Powered by <a href="">求组队网</a>
          </div>
        </div>
      </div>
      <!--  footer end -->
  </div>
  <!--content end-->
  </body>
</html>