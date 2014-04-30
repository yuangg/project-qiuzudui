<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
  <base href="__TMPL__">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">

    <link rel="stylesheet" type="text/css" href="Public/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="Public/css/postCompetition.css" />
    <link rel="stylesheet" type="text/css" href="Public/css/preview.css" />
    <script type="text/javascript" src="Public/js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="Public/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="Public/js/competition-individual.js"></script>
	<script>
	$(document).ready(function(){
		var flag = true,
	    teamSize = 0,
	    findTeamMate = true;
	    size = $("#teamSize").text();
	    maxSize = /\d-(\d)/.exec(size)[1];
		$('#ensure').click(function(){
			var skillString = "";
			$(".current").each(function(){
				  skillString += $(this).text() + ",";
			});
			$.post("__APP__/Ability/getUserByAbility",
				{wantedSkill:skillString},
				function(data,status) {
					var i;
					for (i = 0; i < data.length; ++i) {
						var id = data[i].id;
						if (i > 15) {
							break;
						}
						if (i >= 0 || i <= 7) {
							$(".change-to-another").first().append("<span class='matePhoto'><img src='Public/images/icons/" + data[i].photo + "'><div class='plusMate'>+求组队</div></span>");
						} else {
							$(".change-to-another").last().append("<span class='matePhoto'><img src='Public/images/icons/" + data[i].photo + "'><div class='plusMate'>+求组队</div></span>");
						}
						$('.matePhoto').each(function(){
							var index = $('.matePhoto').index($(this));
							var direction = 'right';
							if(index % 8 % 4 == 2 || index % 8 % 4 == 3){
								direction = 'left';
							}
							$(this).popover({
								html: 'true',
								placement: direction,
								trigger: "hover",
								content: "<div id='mateName'>" + data[i].name + "</div><div id='mateDetail'>" + data[i].gender + "，" + data[i].grade + "级<br>" + data[i].major + "<br>标签：" + data[i].abilities + "</div>"
							});
							$(this).click(function(){
								if(!findTeamMate){
									return false;
								}
								$.post("__APP__/Invitation/addInvitation",
										{invitor_id:$("#hiddenInfo").attr("u_id"),
										 invitee_id:id,
										 activity_id:$("#hiddenInfo").attr("a_id")
										},
										function(data,status) {
											if (status == "success") {
												alert("成功邀请～");
											} else {
												alert("邀请失败...");
											}
										}
								);
								$(".plusMate").eq(index).css("background-color", "#ff974f");
								if(teamSize == maxSize){
									$("#myModal").modal('show');
									findTeamMate = false;
								}
								teamSize++;
							});
						});
					}
				},"json"
			);
			$('#tagChoose').hide();
			$('#recoMate').show();
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
          <a class="brand" href="">
            <img src="Public/images/logo.jpg" class="img-responsive" alt="Responsive image">
          </a>
          <!--register & login-->
          <div class="first-approch pull-right afterLogin">
            <a href="__APP__/Profile/info"><img id="photo-private" src="Public/images/icons/<?php echo ($user["photo"]); ?>"></a>
          </div>
          <div class="first-approch pull-right afterLogin left">
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
          <div class = "search-bar">
            <input id="search" type="text" placeholder="搜索比赛" />
            <button class = "btn btn-blue">
              <i class="icon-search icon-white"></i>
            </button>
          </div>
          <div class="private longline"></div>
          <div class="private shortline orangeline"></div>
        </div>
      </div>
      <!-- navigation-bar end -->

    <!--container-->
    <div class="container">
      <div id="post"><a href="__APP__/Index/index" id="backToCompeList"><span>&lt;&lt;返回比赛列表</span></a><?php echo ($ac["name"]); ?></div>
      <div class="header">
      </div>
      <div class="main">
        <div class="poster">
          <img src="Public/images/posters/<?php echo ($ac["poster"]); ?>">
        </div>
        <div id="info" class="allInfo" style="display: block">
          <div class="info-block">
            <span class="info">主办单位：</span>
            <span class="infoValue"><?php echo ($ac["hostname"]); ?></span>
          </div>
          <div class="info-block">
            <span class="info">活动时间：</span>
            <span class="infoValue"><?php echo ($ac["start_date"]); ?></span>
          </div>
          <div class="info-block">
            <span class="info">报名截止时间：</span>
            <span class="infoValue"><?php echo ($ac["deadline"]); ?></span>
          </div>

          <div class="info-block">
            <span class="info">队伍人数：</span>
            <span id="teamSize" class="infoValue"><?php echo ($ac["size_lowbound"]); ?>-<?php echo ($ac["size_uppbound"]); ?>人</span>
          </div>

          <a href="javascript:void(0)" id="findTeam" class="button"><img src="Public/images/findTeam-large.png"></a>
        </div>
        <!--click1: tag choose-->
        <div id="tagChoose" class="allInfo tagChoose" style="display: none">
          <img id="closeTag" class="closeX" src="Public/images/close.png">
          <div class="post tag-title">需要怎样的小伙伴？  <span class="small">（最多可选三项）</span></div>
          <div class="tag-region">
            <button class="button tag">美工</button>
            <button class="button tag">编程</button>
            <button class="button tag">传设院</button>
            <button class="button tag">管理学院</button>
            <button class="button tag">翻译学院</button>
            <button class="button tag">摄影</button>
            <button class="button tag">文案</button>
            <button class="button tag">活动策划</button>
            <button class="button tag">女生</button>
            <button class="button tag">男生</button>
            <button class="button tag">东校区</button>
            <button class="button tag">珠海校区</button>
            <button class="button tag">南校区</button>
            <button class="button tag">北校区</button>
            <button class="button tag">翻译</button>
          </div>
          <button id="ensure" class="button edit ensure">确 认</button>
        </div>
        <!--click2: recommend mate-->
        <div id="recoMate" class="allInfo tagChoose" style="display: none">
          <img id="closeTag1" class="closeX" src="Public/images/close.png">
          <div class="post tag-title">潜在盟友</div>
          <div class="tag-region change-to-another" style="display: block">
          </div>
          <!--another-->
          <div class="tag-region change-to-another" style="display: none">
          </div>
          <div id="another" class="another">换一批</div>
        </div>
      </div>
      <div style="clear: both"></div>

      <div class="info-block detail">
            <span class="info">比赛详情：</span>
            <span class="infoValue detail"><?php echo ($ac["introduction"]); ?></span>
        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">tips</h3>
      </div>
      <div class="modal-body">
        <p>人数超过最大人数了，不要再求组队啦~</p>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">取消</button>
        <button class="btn btn-primary">确定</button>
      </div>
    </div>
    <!-- Modal -->
    <div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">tips</h3>
      </div>
      <div class="modal-body">
        <p>最多可选三人</p>
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