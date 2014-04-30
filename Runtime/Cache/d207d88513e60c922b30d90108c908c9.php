<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" xmlns:wb="http://open.weibo.com/wb">
  <head>
  <base href="__TMPL__">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">

    <link rel="stylesheet" type="text/css" href="Public/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="Public/css/postCompetition.css" />
    <link rel="stylesheet" type="text/css" href="Public/css/preview.css" />
    <script type="text/javascript" src="Public/js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="Public/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="Public/js/postCompetition.js"></script>
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
          <form class="search-bar" action="" method="get">
            <input id="search" type="text" placeholder="搜索">
            <button type="submit" class="btn btn-blue">
              <i class="icon-search icon-white"></i>
            </button>
          </form>
          <div class="public longline"></div>
          <div class="public shortline orangeline"></div>
        </div>
      </div>
      <!-- navigation-bar end -->

    <!--container-->
    <div class="container">
      <div id="post">
        <a href="__APP__/Activity/activity_society" id="backToCompeList">
          <span>&lt;&lt;返回比赛列表</span>
        </a>
        <span id="title"><?php echo ($ac["name"]); ?></span>
      </div>
      <div class="header">

      </div>
      <div class="main">
        <div class="poster">
          <img src="<?php echo ($ac["poster"]); ?>">
        </div>
        <div id="info" class="allInfo" style="display: block">
          <div class="info-block">
            <span class="info">主办单位：</span>
            <span class="infoValue"><?php echo ($user["name"]); ?></span>
          </div>

          <div class="info-block">
            <span class="info">活动时间：</span>
            <span id="comTime" class="infoValue"><?php echo ($ac["start_date"]); ?> - <?php echo ($ac["start_date"]); ?></span>
          </div>

          <div class="info-block">
            <span class="info">报名截止时间：</span>
            <span id="applyEndTime" class="infoValue"><?php echo ($ac["deadline"]); ?>&nbsp;</span>
          </div>

          <div class="info-block">
            <span class="info">队伍人数：</span>
            <span id="teamSize" class="infoValue"><?php echo ($ac["size_lowbound"]); ?>-<?php echo ($ac["size_uppbound"]); ?>人</span>
          </div>

        </div>
      </div>
      <div style="clear: both"></div>

      <div class="info-block detail">
            <span class="info">比赛详情：</span>
            <span class="infoValue detail"><?php echo ($ac["introduction"]); ?></span>
        </div>
        <!-- <a><button id="edit" class="button edit-in-10" onClick="javascript:history.back();return false;">编辑内容</button></a> -->
    </div>

    <!--  footer -->
      <div id = "footer">
        <div class="footline cyanline"></div>
        <div class = "footerContent">
          <div id = "footer-column">
            <a href="__APP__/Footer/aboutUs">关于我们</a> | <a href="__APP__/Footer/ad">广告合作</a> | <a href="__APP__/Footer/Links">友情链接</a><!--  | <a href="">手机版</a> | <a href="">客户端</a> -->
            <wb:follow-button uid="3501041083" type="red_3" width="100%" height="24"></wb:follow-button>
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