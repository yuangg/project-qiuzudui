<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" xmlns:wb="http://open.weibo.com/wb">
  <head>
  <base href="__TMPL__">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">

    <link rel="stylesheet" type="text/css" href="Public/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="Public/css/home.css" />
	<link rel="stylesheet" type="text/css" href="Public/css/pagination.css" />
    <script type="text/javascript" src="Public/js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="Public/js/jquery.pagination.js"></script>
    <script type="text/javascript" src="Public/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="Public/js/home.js"></script>
    <script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>

    <title>求组队</title>
  </head>

  <body>
  <!--content-->
  <div id="content">
   <!--navbar-->
    <div class="navbar">
      <div class="container-fluid">
        <!--brand-->
        <a class="brand" href="__APP__/Index/index">
          <img src="Public/images/logo.jpg" class="img-responsive" alt="Responsive image">
        </a>

        <!--register & login-->
        <div class="first-approch pull-right beforeLogin">
          <a id="register" href="__APP__/Register/register">加入我们吧</a>
          <form name="registerAndLogin" action="__APP__/Login/login" method="post">
          	<input class="reAndLoInput" type="text" name="email" placeholder="个人/社团ID" style="width:86%"/>
            <input class="reAndLoInput" type="password" name="password" placeholder="" />
            <button class="reAndLoButton" type="submit" id="login">登陆</button>
          </form>
        </div>
      </div>
      <div class="navline">
        <div class="shortline blueline"></div>
        <div class="longline"></div>
        <span class="home"><a id="home" href="__APP__/Index/index">&nbsp;首页</a>&nbsp;|&nbsp;</span>
        <form class="search-bar" action="" method="get">
          <input id="search" type="text" placeholder="搜索">
          <button type="submit" class="btn btn-blue">
            <i class="icon-search icon-white"></i>
          </button>
        </form>&nbsp;
        <div class="longline"></div>
        <div class="shortline orangeline"></div>
      </div>
    </div>

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
          <img src="Public/images/1.png" alt>
        </div>
        <div class="item">
          <img src="Public/images/2.png" alt>
        </div>
        <div class="item">
          <img src="Public/images/3.png" alt>
        </div>
        <div class="item">
          <img src="Public/images/4.png" alt>
        </div>
        <div class="item">
          <img src="Public/images/5.png" alt>
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
              <a class="poster"><img src="Public/images/posters/<?php echo ($ac["poster"]); ?>"></a>
              <div class="cutoffLine"></div>
              <div class="detail">
                <a id="title"><b><?php echo ($ac["name"]); ?></b></p></a>

                <div class="allInfo">
                <div class="info-block">
                  <span class="info">主办单位：</span>
                  <span class="infoValue"><?php echo ($ac["hostName"]); ?></span>
                </div>

                <div class="info-block">
                  <span class="info">活动时间：</span>
                  <span class="infoValue"><?php echo ($ac["start_date"]); ?></span>
                  <span class="infoValue">-</span>
                  <span class="infoValue">21:00</span>
                </div>

                <div class="info-block">
                  <span class="info">报名截止时间：</span>
                  <span class="infoValue"><?php echo ($ac["deadline"]); ?></span>
                </div>
                </div>

                <span class="moreInfo">详情>></span>
                <div class="aboutTeam">
                  <span class="findTeam" ac_id = <?php echo ($ac["id"]); ?>><a><img class = "qiuzudui" src="Public/images/findTeam.png"></a></span>
                </div>
              </div>
            </div><?php endforeach; endif; ?>
          </div><?php endforeach; endif; ?>
      </div>
      
      <div id="Pagination" class="pagination">
      	<span class="prev">&lt;前页</span>
        <span class="current">1</span>
        <a href="#">2</a>
        <a href="#" class="next">后页&gt;</a>
      </div>
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