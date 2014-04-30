<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
  <base href="__TMPL__">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">

    <link rel="stylesheet" type="text/css" href="Public/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="Public/bootstrap/css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" type="text/css" href="Public/css/postCompetition.css" />
    <script type="text/javascript" src="Public/js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="Public/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="Public/js/postCompetition.js"></script>
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
      <div id="post">发布比赛</div>
      <div class="header">
        <div id="postline"></div>
      </div>
      <form class="form-horizontal" role="form" action="__APP__/Activity/postActivity" method="post"
       enctype="multipart/form-data">
        <div class="form-group">
          <label for="input01" class="col-sm-2 control-label">标&nbsp;&nbsp;题</label>
          <div class="col-sm-10">
            <input type="text" name="title" class="form-control" id="title" placeholder="">
            <br><span class = "tips">(请填写比赛标题)</span>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">比赛开始时间</label>
          <div class="controls input-append date form_datetime" data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
            <input id = "startTime" size="16" type="text" name="comStartTime" value="" readonly>
            <span class="add-on"><i class="icon-remove"></i></span>
            <span class="add-on"><i class="icon-th"></i></span>
          </div>
          <input type="hidden" id="dtp_input1" value="" /><br/><span class = "tips">(请选择比赛时间)</span>
        </div>
        <div class="control-group">
          <label class="control-label">比赛结束时间</label>
          <div class="controls input-append date form_datetime" data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
            <input id = "endTime" size="16" type="text" name="comEndTime" value="" readonly>
            <span class="add-on"><i class="icon-remove"></i></span>
            <span class="add-on"><i class="icon-th"></i></span>
          </div>
          <input type="hidden" id="dtp_input2" value="" /><br/>
          <span class = "tips">(请选择比赛结束时间)</span>
        </div>
        <div class="control-group">
          <label class="control-label">报名截止时间</label>
          <div class="controls input-append date form_datetime" data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
            <input  id = "registrationEndTime"size="16" type="text" name="applyEndTime" value="" readonly>
            <span class="add-on"><i class="icon-remove"></i></span>
            <span class="add-on"><i class="icon-th"></i></span>
          </div>
          <input type="hidden" id="dtp_input3" value="" /><br/>
           <span class = "tips">(请选择报名截至时间)</span>
        </div>
        <div class="control-group" id="teamSize">
          <label class="control-label">队伍人数</label>
          <div class="col-sm-10">
            <input type="text" name="teamMinSize" class="form-control teamSize" id="minSize" placeholder="">&nbsp;到
            <input type="text" name="teamMaxSize" class="form-control teamSize" id="maxSize" placeholder="">&nbsp;人 <span></span>
          </div>
        </div>

        <!--upload img-->
        <div class="imgUpload">
          <img id="poster" src="#">
          <input type="file" name="poster" id="upload" class="form-control" style="display:none">
          <a id="upload-image" class="btn" onclick="$('input[id=upload]').click();">上传图片</a>
          <div id="imgNote"><input id="imageCover" class="input-large" type="text"><br>文件不超过2MB<br>类型为JPG或PNG</div>
        </div>
        <!--end-->

        <div class="form-group">
          <label for="input01" class="col-sm-2 control-label">比赛详情</label>
          <div class="col-sm-10">
            <textarea cols="100" rows="5" name="comDetail" class="form-control" id="input01" placeholder=""></textarea>
          </div>
        </div>

        <div class="form-group">
          <label for="input01" class="col-sm-2 control-label">上传报名表</label>
          <input id="lefile" type="file" name="applyForm" style="display:none">
          <div class="input-append">
            <input id="photoCover" class="input-large" type="text">
            <a class="btn" onclick="$('input[id=lefile]').click();">浏览...</a>
          </div>
        </div>

        <!--submit & preview-->
        <div class="form-group submit">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" id="submit" class="btn btn-default">发&nbsp;布</button>
          </div>
        </div>
        <div class="form-group submit">
          <div class="col-sm-offset-2 col-sm-10">
            <button  id="preview" class="btn btn-default">预&nbsp;览</button>
          </div>
        </div>
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
<script type="text/javascript" src="Public/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="Public/jjs/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
        showMeridian: 1
    });
</script>
  </body>
</html>