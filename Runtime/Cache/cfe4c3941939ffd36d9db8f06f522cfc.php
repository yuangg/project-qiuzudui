<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" xmlns:wb="http://open.weibo.com/wb">
<head>
<base href="__TMPL__">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">

  <link rel="stylesheet" type="text/css" href="../Public/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="../Public/css/home.css" />
  <link rel="stylesheet" type="text/css" href="../Public/css/postCompetition.css" />
  <link rel="stylesheet" type="text/css" href="../Public/css/pagination.css" />
  <link rel="stylesheet" type="text/css" href="../Public/css/MyCompetitionList.css">
  <script type="text/javascript" src="../Public/js/jquery-2.1.0.min.js"></script>
  <script type="text/javascript" src="../Public/js/jquery.pagination.js"></script>
  <script src="../Public/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../Public/js/home.js"></script>
  <script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
  $(document).on("click", ".viewContent a", function() {
    var id = $(this).parent().parent().parent().attr("acti_id");
    var newForm = document.createElement("form");
    newForm.action = "__APP__/Activity/activity_info";
    newForm.method = "get";
    var msg = document.createElement("input");
    msg.type="hidden";
    msg.value = id;
    msg.name = "ac_id";
    newForm.appendChild(msg);
    newForm.submit();
  });
  $(document).on("click", ".editContent a", function() {
    var id = $(this).parent().parent().parent().attr("acti_id");
    var newForm = document.createElement("form");
    newForm.action = "__APP__/Activity/editActivity";
    newForm.method = "get";
    var msg = document.createElement("input");
    msg.type="hidden";
    msg.value = id;
    msg.name = "ac_id";
    newForm.appendChild(msg);
    newForm.submit();
  });
  $(document).on("click", ".btn-primary", function() {
    var id = $(".detailLink").attr("acti_id");
    var newForm = document.createElement("form");
    newForm.action = "__APP__/Activity/deleteActivity";
    newForm.method = "get";
    var msg = document.createElement("input");
    msg.type="hidden";
    msg.value = id;
    msg.name = "ac_id";
    newForm.appendChild(msg);
    newForm.submit();
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

    <!--MainContent-->
    <div id="mainContent">
      <div id="contentTop">
        <h1>我的比赛</h1>
        <div id="longBar">
          <div id="shortBar"></div>
        </div>
      </div>
	  <div id="contentDetail">
	        <div id="Searchresult" class="container main">
	        </div>
			    <div id="hiddenresult" style="display: none">
            <?php if(is_array($myActivity)): foreach($myActivity as $key=>$acti): ?><div class="row result">
                <a class="posters"><img src="../Public/images/posters/<?php echo ($acti["poster"]); ?>"></a>
                <div class="postDetail">
                  <div class="briefInfo">
  			           <p><h2 class ="title"><?php echo ($acti["name"]); ?></h2></p>
  			           <span class = "publishTime">发布时间:</span>
  			           <span class = "publishTimeValue"><?php echo ($acti["create_date"]); ?>&nbsp;</span>
  			           <span class = "lastEditTime">最后编辑:</span>
  			           <span class = "lastEditTimeValue"><?php echo ($acti["edit_date"]); ?></span>
                  </div>
                  <div class="mainDetail">
                    <div class="detailBlock">
                      <span class = "detailInfo detailInfo2">比赛时间:</span>
                      <span class = "detailInfoTime"><?php echo ($acti["start_date"]); ?></span>
                      <span class = "detailInfoTime">-</span>
                      <span class = "detailInfoTime"><?php echo ($acti["end_date"]); ?></span>
                    </div>
                    <div class="detailBlock">
                      <span class = "detailInfo">报名截止时间:</span>
                      <span class = "detailInfoTime"><?php echo ($acti["deadline"]); ?></span>
                      <?php if(($acti["accepting"] == true)): ?><span class = "detailInfo">[接受报名中]</span><?php endif; ?>
                    </div>
                    <div class="detailBlock">
                      <span class = "detailInfo detailInfo2">队伍人数:</span>
                      <span class = "detailInfoTime"><?php echo ($acti["size_lowbound"]); ?></span>
                      <span class = "detailInfoTime">-</span>
                      <span class = "detailInfoTime"><?php echo ($acti["size_uppbound"]); ?></span>
                      <span class = "detailInfoTime">人</span>
                    </div>
                  </div>
                  <div class="detailLink" acti_id = "<?php echo ($acti["id"]); ?>">
                    <ul>
                      <li class="viewContent" ><a>查看内容</a></li>
                      <li class="editContent"><a>编辑</a> </li>
                      <li class="deleteRequest"><a href="#myModal" data-toggle="modal">请求删除</a></li>
                    </ul>
                  </div>
                </div>
              </div><?php endforeach; endif; ?>
          </div>

        <div id="Pagination" class="pagination">
          <span class="current prev">&lt;前页</span>
          <span class="current">1</span>
          <a href="#">2</a>
          <a href="#" class="next">后页&gt;</a>
        </div>
    </div>
  </div>

  <!-- Modal -->
  <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3 id="myModalLabel"></h3>
    </div>
    <div class="modal-body">
      <p>确定要删除吗?</p>
    </div>
    <div class="modal-footer">
      <button class="btn" data-dismiss="modal" aria-hidden="true">取消</button>
      <button class="btn btn-primary">确定</button>
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