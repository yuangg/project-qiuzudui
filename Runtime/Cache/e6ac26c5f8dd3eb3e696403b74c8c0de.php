<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" xmlns:wb="http://open.weibo.com/wb">
  <head>
  <base href="__TMPL__">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">

    <link rel="stylesheet" type="text/css" href="../Public/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../Public/css/postCompetition.css" />
    <link rel="stylesheet" type="text/css" href="../Public/css/footer.css" />
    <script type="text/javascript" src="../Public/js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="../Public/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../Public/js/editActivity.js"></script>
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
        <?php if($user['user_type'] == 0): ?><div class="navline">
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
          </div><?php endif; ?>
        <?php if($user['user_type'] == 1): ?><div class="navline">
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
          </div><?php endif; ?>
      </div>
      <!-- navigation-bar end -->

    <!--container-->
    <div class="container">
      <div id="post">关于我们</div>
      <div class="header">
        <div id="postline"></div>
      </div>
      <div class="main">
        <div class="item">
          <h1>项目介绍</h1>
          <div class="detail">求组队中山大学竞赛管理平台，获取第一手竞赛资讯的同时，帮你找到满意的队友！</div>
        </div>
        <hr>
        <div class="item">
          <h1>加入我们</h1>
          <div class="detail">想为我们的母校留下一份礼物嘛？想用自己的知识为我们的校友创造一份便利嘛？
有了求组队，再也不用风里雨里拉横幅贴海报了；
有了求组队，再也不用千辛万苦往教室黑板上写宣传语了；
有了求组队，再也不用上下七层楼一遍又一遍地敲宿舍门了；
有了求组队，只要轻轻一点按钮，系统将会自己为你匹配合适的队友，并代你发出邀请；
加入我们吧，这里有妹子、有汉子和你一起创造价值！</div>
        </div>
        <hr>
        <div class="item">
          <h1>主创人</h1>
          <div class="detail">顾海月（guhaiyue1993@sina.com）</div>
        </div>
        <hr>
        <div class="item">
          <h1>团队人员</h1>
          <!-- <div class="role"> -->
            <div class="detail">何晓鸥，袁梓民，杨柳，郑穗展，严昕，王栩瑶，曾灏，高原，陈冰</div>
            <!-- <div class="detail">后端：郑穗展</div>
            <div class="detail">严昕，王栩瑶</div>
            <div class="detail">曾灏，高原</div>
            <div class="detail">陈冰</div> -->
          <!-- </div> -->
          <!-- <hr>
          <div class="role">
            <h2>设计人员</h2>
            <div class="detail">严昕(15889935703)，王栩瑶(13580506218)</div>
          </div>
          <hr>
          <div class="role">
            <h2>项目指导</h2>
            <div class="detail">曾灏(13580501593)，高原(13450219209)</div>
          </div>
          <hr>
          <div class="role">
            <h2>运营</h2>
            <div class="detail">陈冰(13580519521)</div>
          </div> -->
        </div>
      </div>
      

    </div>


    <!--  footer -->
      <div id = "footer">
        <div class="footline cyanline"></div>
        <div class = "footerContent">
          <div id = "footer-column">
            <a href="__APP__/Footer/aboutUs">关于我们</a> | <a href="__APP__/Footer/ad">广告合作</a> | <a href="__APP__/Footer/Links">友情链接</a>
            <wb:follow-button uid="2347663625" type="red_1" width="67" height="24" ></wb:follow-button>
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