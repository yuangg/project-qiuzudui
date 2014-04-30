<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
  <base href="__TMPL__">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">

    <link rel="stylesheet" type="text/css" href="Public/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="Public/css/home.css" />
    <script type="text/javascript" src="Public/js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="Public/js/jquery.pagination.js"></script>
    <script type="text/javascript" src="Public/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="Public/js/home.js"></script>

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
            <input class="reAndLoInput" type="password" name="password" placeholder="密码" />
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
        <div class="row result">
          <div class="span6">
            <a class="poster" href="11 competition-individual.html"><img src="Public/images/p1.png"></a>
            <div class="cutoffLine"></div>
            <div class="detail">
              <a href="11 competition-individual.html" id="title"><p><b>Will动漫协会放映会《凉宫春日的消失》</b></p></a>

              <div class="allInfo">
              <div class="info-block">
                <span class="info">主办单位：</span>
                <span class="infoValue">Will动漫协会</span>
              </div>

              <div class="info-block">
                <span class="info">活动时间：</span>
                <span class="infoValue">12月27日&nbsp;19:00</span>
                <span class="infoValue">-</span>
                <span class="infoValue">21:00</span>
              </div>

              <div class="info-block">
                <span class="info">报名截止时间：</span>
                <span class="infoValue">12月27日&nbsp;19:00</span>
              </div>
              </div>

              <a id="moreInfo" href="11 competition-individual.html">详情>></a>
              <div class="aboutTeam">
                <span class="findTeam"><a href="11 competition-individual.html"><img src="Public/images/findTeam.png"></a></span>
              </div>
            </div>
          </div>

          <div class="span6">
            <a class="poster" href="11 competition-individual.html"><img src="Public/images/p2.png"></a>
            <div class="cutoffLine"></div>
            <div class="detail">
              <a href="11 competition-individual.html"><p><b id="title">服务一条街</b></p></a>

              <div class="allInfo">
              <div class="info-block">
                <span class="info">主办单位：</span>
                <span class="infoValue">中山大学青年志愿者协会</span>
              </div>

              <div class="info-block">
                <span class="info">活动时间：</span>
                <span class="infoValue">4月12日</span>
              </div>

              <div class="info-block">
                <span class="info">报名截止时间：</span>
                <span class="infoValue">3月20日</span>
              </div>
              </div>

              <a id="moreInfo" href="11 competition-individual.html">详情>></a>

              <div class="aboutTeam">
                <span class="findTeam"><a href="11 competition-individual.html"><img src="Public/images/findTeam.png"></a></span>
              </div>
            </div>
          </div>
        </div>

        <div class="row result">
          <div class="span6">
            <a class="poster" href="11 competition-individual.html"><img src="Public/images/p3.png"></a>
            <div class="cutoffLine"></div>
            <div class="detail">
              <a href="11 competition-individual.html"><p><b id="title">书画协会招新</b></p></a>

              <div class="allInfo">
              <div class="info-block">
                <span class="info">主办单位：</span>
                <span class="infoValue">中东书画协会</span>
              </div>

              <div class="info-block">
                <span class="info">活动时间：</span>
                <span class="infoValue">12月27日&nbsp;19:00</span>
                <span class="infoValue">-</span>
                <span class="infoValue">21:00</span>
              </div>

              <div class="info-block">
                <span class="info">报名截止时间：</span>
                <span class="infoValue">12月27日&nbsp;19:00</span>
              </div>
              </div>

              <a id="moreInfo" href="11 competition-individual.html">详情>></a>

              <div class="aboutTeam">
                <span class="findTeam"><a href="11 competition-individual.html"><img src="Public/images/findTeam.png"></a></span>
              </div>
            </div>
          </div>

          <div class="span6">
            <a class="poster" href="11 competition-individual.html"><img src="Public/images/p4.png"></a>
            <div class="cutoffLine"></div>

            <div class="detail">
              <a href="11 competition-individual.html"><p><b id="title">第十七届中山大学程序设计竞赛</b></p></a>

              <div class="allInfo">
              <div class="info-block">
                <span class="info">主办单位：</span>
                <span class="infoValue">ACM协会</span>
              </div>

              <div class="info-block">
                <span class="info">活动时间：</span>
                <span class="infoValue">3月29日</span>
              </div>

              <div class="info-block">
                <span class="info">报名截止时间：</span>
                <span class="infoValue">3月20日</span>
              </div>
              </div>

              <a id="moreInfo" href="11 competition-individual.html">详情>></a>
              <div class="aboutTeam">
                <span class="findTeam"><a href="11 competition-individual.html"><img src="Public/images/findTeam.png"></a></span>
              </div>
            </div>
          </div>
        </div>
        <div class="row result">
          <div class="span6">
            <a class="poster" href="11 competition-individual.html"><img src="Public/images/p1.png"></a>
            <div class="cutoffLine"></div>
            <div class="detail">
              <a href="11 competition-individual.html" id="title"><p><b>xxxxx2</b></p></a>

              <div class="allInfo">
              <div class="info-block">
                <span class="info">主办单位：</span>
                <span class="infoValue">Will动漫协会</span>
              </div>

              <div class="info-block">
                <span class="info">活动时间：</span>
                <span class="infoValue">12月27日&nbsp;19:00</span>
                <span class="infoValue">-</span>
                <span class="infoValue">21:00</span>
              </div>

              <div class="info-block">
                <span class="info">报名截止时间：</span>
                <span class="infoValue">12月27日&nbsp;19:00</span>
              </div>
              </div>

              <a id="moreInfo" href="11 competition-individual.html">详情>></a>
              <div class="aboutTeam">
                <span class="findTeam"><a href="11 competition-individual.html"><img src="Public/images/findTeam.png"></a></span>
              </div>
            </div>
          </div>

          <div class="span6">
            <a class="poster" href="11 competition-individual.html"><img src="Public/images/p2.png"></a>
            <div class="cutoffLine"></div>
            <div class="detail">
              <a href="11 competition-individual.html"><p><b id="title">服务一条街</b></p></a>

              <div class="allInfo">
              <div class="info-block">
                <span class="info">主办单位：</span>
                <span class="infoValue">中山大学青年志愿者协会</span>
              </div>

              <div class="info-block">
                <span class="info">活动时间：</span>
                <span class="infoValue">4月12日</span>
              </div>

              <div class="info-block">
                <span class="info">报名截止时间：</span>
                <span class="infoValue">3月20日</span>
              </div>
              </div>

              <a id="moreInfo" href="11 competition-individual.html">详情>></a>

              <div class="aboutTeam">
                <span class="findTeam"><a href="11 competition-individual.html"><img src="Public/images/findTeam.png"></a></span>
              </div>
            </div>
          </div>
        </div>
        <div class="row result">
          <div class="span6">
            <a class="poster" href="#"><img src="Public/images/p3.png"></a>
            <div class="cutoffLine"></div>
            <div class="detail">
              <a href="11 competition-individual.html"><p><b id="title">地球一小时</b></p></a>

              <div class="allInfo">
              <div class="info-block">
                <span class="info">主办单位：</span>
                <span class="infoValue">中东书画协会</span>
              </div>

              <div class="info-block">
                <span class="info">活动时间：</span>
                <span class="infoValue">12月27日&nbsp;19:00</span>
                <span class="infoValue">-</span>
                <span class="infoValue">21:00</span>
              </div>

              <div class="info-block">
                <span class="info">报名截止时间：</span>
                <span class="infoValue">12月27日&nbsp;19:00</span>
              </div>
              </div>

              <a id="moreInfo" href="11 competition-individual.html">详情>></a>

              <div class="aboutTeam">
                <span class="findTeam"><a href="11 competition-individual.html"><img src="Public/images/findTeam.png"></a></span>
              </div>
            </div>
          </div>

          <div class="span6">
            <a class="poster" href="11 competition-individual.html"><img src="Public/images/p4.png"></a>
            <div class="cutoffLine"></div>

            <div class="detail">
              <a href="11 competition-individual.html"><p><b id="title">第十七届中山大学程序设计竞赛</b></p></a>

              <div class="allInfo">
              <div class="info-block">
                <span class="info">主办单位：</span>
                <span class="infoValue">ACM协会</span>
              </div>

              <div class="info-block">
                <span class="info">活动时间：</span>
                <span class="infoValue">3月29日</span>
              </div>

              <div class="info-block">
                <span class="info">报名截止时间：</span>
                <span class="infoValue">3月20日</span>
              </div>
              </div>

              <a id="moreInfo" href="11 competition-individual.html">详情>></a>
              <div class="aboutTeam">
                <span class="findTeam"><a href="11 competition-individual.html"><img src="Public/images/findTeam.png"></a></span>
              </div>
            </div>
          </div>
        </div>
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