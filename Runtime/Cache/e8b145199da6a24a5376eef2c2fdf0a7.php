<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" xmlns:wb="http://open.weibo.com/wb">
  <head>
    <meta name="viewport" http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../Public/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../Public/css/home.css" />
	  <link rel="stylesheet" type="text/css" href="../Public/css/pagination.css" />
    <script type="text/javascript" src="../Public/js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="../Public/js/jquery.pagination.js"></script>
    <script type="text/javascript" src="../Public/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../Public/js/home.js"></script>
    <script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
      function handler(e){
        var id = e.attr("ac_id");
        var newForm = document.createElement("form");
        newForm.action = "__APP__/Activity/viewBrief";
        newForm.method = "get";
        var msg = document.createElement("input");
        msg.type="hidden";
        msg.value = id;
        msg.name = "ac_id";
        newForm.appendChild(msg);
        newForm.submit();
      }
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
          <a class="brand public" href="__APP__/Index/index">
            <img src="../Public/images/logo.jpg" class="img-responsive" alt="Responsive image">
          </a>
          <!--register & login-->
          <div class="first-approch pull-right afterLogin">
            <a href="__APP__/Profile/info"><img id="photo-public" src="../Public/images/icons/<?php echo ($user["photo"]); ?>"></a>
          </div>
          <div class="first-approch pull-right afterLogin left">
            <div id="publicName"><a href="__APP__/Profile/info">
              <img src="../Public/images/team.png">
              <span id="name"><?php echo ($user["name"]); ?></span></a>
            </div>
            <div class="bottom">
              <div class="bottom1" id="public-info"><a href="__APP__/Profile/info"><img src="../Public/images/info.png">社团信息</a></div>
              <div class="bottom1" id="logout"><a href="__APP__/Login/logout"><img src="../Public/images/logout.png">退出</a></div>
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

      <!--caroousel-->
      <div id = "carousel-container">
        <div id="myCarousel" class="carousel slide">
        <ol class="carousel-indicators">
           <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
           <li data-target="#myCarousel" data-slide-to="1"></li>
           <li data-target="#myCarousel" data-slide-to="2"></li>
           <li data-target="#myCarousel" data-slide-to="3"></li>
           <li data-target="#myCarousel" data-slide-to="4"></li>
        </ol>
        <!-- Carousel items -->
        <div class="carousel-inner">
        <div class="active item">
          <img src="../Public/images/1.png" alt>
        </div>
        <div class="item">
          <img src="../Public/images/2.png" alt>
        </div>
        <div class="item">
          <img src="../Public/images/3.png" alt>
        </div>
        <!-- <div class="item">
          <img src="../Public/images/4.png" alt>
        </div> -->
        <div class="item">
          <img src="../Public/images/5.png" alt>
        </div>

        </div>
        <!-- Carousel nav -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
        </div>
      </div>

      <!--main-->
      <div id="Searchresult" class="container main">
      </div>

      <div id="hiddenresult" style="display: none">
        <?php if(is_array($activitys)): foreach($activitys as $key=>$row): ?><div class="row result">
            <?php if(is_array($row)): foreach($row as $key=>$ac): ?><div class="span6">
              <a class="poster"><img src="../Public/images/posters/<?php echo ($ac["poster"]); ?>" ac_id = <?php echo ($ac["id"]); ?> onclick="handler($(this))"></a>
              <div class="cutoffLine"></div>
              <div class="detail">
                <a id="title" ac_id = <?php echo ($ac["id"]); ?> onclick="handler($(this))"><b><?php echo ($ac["name"]); ?></b></p></a>

                <div class="allInfo">
                <div class="info-block">
                  <span class="info">主办单位：</span>
                  <span class="infoValue"><?php echo ($ac["hostName"]); ?></span>
                </div>

                <div class="info-block">
                  <span class="info">活动时间：</span>
                  <span class="infoValue"><?php echo ($ac["start_date"]); ?></span>
                  <span class="infoValue">-</span>
                  <span class="infoValue"><?php echo ($ac["end_date"]); ?></span>
                </div>

                <div class="info-block">
                  <span class="info">报名截止时间：</span>
                  <span class="infoValue"><?php echo ($ac["deadline"]); ?></span>
                </div>
                </div>

                <span class="moreInfo" ac_id = <?php echo ($ac["id"]); ?> onclick="handler($(this))">详情>></span>
              </div>
            </div><?php endforeach; endif; ?>
          </div><?php endforeach; endif; ?>
      </div>
      <div id="Pagination" class="pagination">
        <a href="#" class="prev">&lt;前页</a>
        <a href="#">1</a>
        <span class="current">2</span>
        <span class="current next">后页&gt;</span>
      </div>
    </div>


    <!--  footer -->
      <div id = "footer">
        <div class="footline cyanline"></div>
        <div class = "footerContent">
          <div id = "footer-column">
            <a href="__APP__/Footer/aboutUs">关于我们</a> | <a href="__APP__/Footer/ad">广告合作</a> | <a href="__APP__/Footer/Links">友情链接</a><!--  | <a href="">手机版</a> | <a href="">客户端</a> -->
            <div class="weibo"><wb:follow-button uid="3501041083" type="red_1" width="67" height="24" ></wb:follow-button></div>
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