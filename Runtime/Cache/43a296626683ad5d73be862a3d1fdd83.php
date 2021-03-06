<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" xmlns:wb="http://open.weibo.com/wb">
  <head>
  <base href="__TMPL__">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">

    <link rel="stylesheet" type="text/css" href="../Public/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../Public/bootstrap/css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" type="text/css" href="../Public/css/postCompetition.css" />
    <script type="text/javascript" src="../Public/js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="../Public/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../Public/js/editActivity.js"></script>
    <script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
    $(document).ready(function(){
      $("#preview").click(function() {
        var newForm = document.createElement("form");
        newForm.action = "__APP__/Activity/preview";
        newForm.method = "post";
        var msg1 = document.createElement("input"); 
        var msg2 = document.createElement("input");
        var msg3 = document.createElement("input");
        var msg4 = document.createElement("input");
        var msg5 = document.createElement("input");
        var msg6 = document.createElement("input");
        var msg7 = document.createElement("input");
        var msg8 = document.createElement("input");
        msg1.type = msg2.type = msg3.type = msg4.type = msg5.type = msg6.type = msg7.type = msg8.type ="hidden";
        msg1.value = $("#title").val();
        msg1.name = "title";
        newForm.appendChild(msg1);
        msg2.value = $("#startTime").val();
        msg2.name = "comStartTime";
        newForm.appendChild(msg2);
        msg3.value = $("#endTime").val();
        msg3.name = "comEndTime";
        newForm.appendChild(msg3);
        msg4.value = $("#registrationEndTime").val();
        msg4.name = "applyEndTime";
        newForm.appendChild(msg4);
        msg5.value = $("#minSize").val();
        msg5.name = "teamMinSize";
        newForm.appendChild(msg5);
        msg6.value = $("#maxSize").val();
        msg6.name = "teamMaxSize";
        newForm.appendChild(msg6);
        msg7.value = $("#registrationEndTime").val();
        msg7.name = "applyEndTime";
        newForm.appendChild(msg7);
        msg8.value = $("#input01").val();
        msg8.name = "comDetail";
        newForm.appendChild(msg8);
        var msg9 = document.createElement("input");
        msg9.type = "hidden";
        msg9.value = $("#poster").attr("src");
        msg9.name = "poster";
        newForm.appendChild(msg9);
        newForm.attr('target', '_blank');
        // window.open('__APP__/Activity/preview', '_blank');
        newForm.submit();
      })
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

    <!--container-->
    <div class="container">
      <div id="post">发布比赛</div>
      <div class="header">
        <div id="postline"></div>
      </div>
      <form class="form-horizontal" role="form" action="__APP__/Activity/updateActivity" method="post"
       enctype="multipart/form-data">
        <div class="form-group">
          <label for="input01" class="col-sm-2 control-label">标&nbsp;&nbsp;题</label>
          <div class="col-sm-10">
            <input type="text" name="title" class="form-control" id="title" value="<?php echo ($ac["name"]); ?>">
            <br><span class = "tips">(请填写比赛标题)</span>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">比赛开始时间</label>
          <div class="controls input-append date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
            <input id = "startTime" size="16" type="text" name="comStartTime" value="<?php echo ($ac["start_date"]); ?>" readonly>
            <span class="add-on"><i class="icon-remove"></i></span>
            <span class="add-on"><i class="icon-th"></i></span>
          </div>
          <input type="hidden" id="dtp_input1" value="<?php echo ($ac["start_date"]); ?>" /><br/><span class = "tips">(请选择比赛时间)</span>
        </div>
        <div class="control-group">
          <label class="control-label">比赛结束时间</label>
          <div class="controls input-append date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2">
            <input id = "endTime" size="16" type="text" name="comEndTime" value="<?php echo ($ac["end_date"]); ?>" readonly>
            <span class="add-on"><i class="icon-remove"></i></span>
            <span class="add-on"><i class="icon-th"></i></span>
          </div>
          <input type="hidden" id="dtp_input2" value="<?php echo ($ac["end_date"]); ?>" /><br/>
          <span class = "tips">(请选择比赛结束时间)</span>
        </div>
        <div class="control-group">
          <label class="control-label">报名截止时间</label>
          <div class="controls input-append date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input3">
            <input  id = "registrationEndTime"size="16" type="text" name="applyEndTime" value="<?php echo ($ac["deadline"]); ?>" readonly>
            <span class="add-on"><i class="icon-remove"></i></span>
            <span class="add-on"><i class="icon-th"></i></span>
          </div>
          <input type="hidden" id="dtp_input3" value="<?php echo ($ac["deadline"]); ?>" /><br/>
           <span class = "tips">(请选择报名截至时间)</span>
        </div>
        <div class="control-group" id="teamSize">
          <label class="control-label">队伍人数</label>
          <div class="col-sm-10">
            <input type="text" name="teamMinSize" class="form-control teamSize" id="minSize" value="<?php echo ($ac["size_lowbound"]); ?>">&nbsp;到
            <input type="text" name="teamMaxSize" class="form-control teamSize" id="maxSize" value="<?php echo ($ac["size_uppbound"]); ?>">&nbsp;人 <span></span>
          </div>
        </div>

        <!--upload img-->
        <div class="imgUpload">
          <img id="poster" src="../Public/images/posters/<?php echo ($ac["poster"]); ?>">
          <input type="file" name="poster" id="upload" class="form-control" style="display:none">
          <a id="upload-image" class="btn" onclick="$('input[id=upload]').click();">上传图片</a>
          <div id="imgNote">
            <input id="imageCover" class="input-large" type="text">
            <span style="margin-left: 2px; color:red">已有海报，无需上传</span>
            <br>文件不超过2MB
            <br>类型为JPG或PNG
          </div>
        </div>
        <!--end-->

        <div class="form-group">
          <label for="input01" class="col-sm-2 control-label">比赛详情</label>
          <div class="col-sm-10">
            <textarea cols="100" rows="5" name="comDetail" class="form-control" id="input01" ><?php echo ($ac["introduction"]); ?></textarea>
          </div>
        </div>
		<input type="hidden" name="ac_id" value = <?php echo ($ac["id"]); ?>>
        <div class="form-group">
          <label for="input01" class="col-sm-2 control-label">上传报名表</label>
          <input id="lefile" type="file" name="applyForm" style="display:none" value>
          <div class="input-append">
            <input id="photoCover" class="input-large" type="text" >
            <a class="btn" onclick="$('input[id=lefile]').click();">浏览...</a>
          </div>
          <span style="margin-left: 2px; color:red">已有报名表，无需上传</span>
        </div>

        <!--submit & preview-->
        <div class="form-group submit">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" id="submit" class="btn btn-default">发&nbsp;布</button>
          </div>
        </div>
        <div class="form-group submit">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="button" id="preview" class="btn btn-default">预&nbsp;览</button>
          </div>
        </div>
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
            © Copyright (c) 2013 | Powered by <a href="">求组队网</a>
          </div>
        </div>
      </div>
      <!--  footer end -->
  </div>
  <!--content end-->
<script type="text/javascript" src="../Public/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="../Public/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script type="text/javascript">
    $('.form_date').datetimepicker({
        //language:  'fr',
      weekStart: 1,
      todayBtn:  1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 2,
      forceParse: 0,
      showMeridian: 1,
      minView: 2,
      startDate: '+0d'
    });
</script>
  </body>
</html>