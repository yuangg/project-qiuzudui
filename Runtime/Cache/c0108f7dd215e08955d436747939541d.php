<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" xmlns:wb="http://open.weibo.com/wb">
  <head>
    <meta name="viewport" http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../Public/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../Public/css/postCompetition.css" />
    <link rel="stylesheet" type="text/css" href="../Public/css/preview.css" />
    <script type="text/javascript" src="../Public/js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="../Public/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../Public/js/competition-individual.js"></script>
    <script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
	<script>
	$(document).ready(function(){
      if(!findTeamAbled(<?php echo ($ac["end_date"]); ?>)){
        $('#findTeam').empty().append('比赛已结束').css({
          'color' : 'rgb(105, 103, 103)',
          'cursor' : 'default'
        });
        return false;
      }
      var u_id = $("#hiddenInfo").attr('u_id');
  		$('#ensure').click(function(){
  			var skillString = "";
  			$(".current").each(function(){
  				  skillString += $(this).text() + ",";
  			});
        $(".change-to-another").empty();
  			$.post("__APP__/Ability/getUserByAbility",
  				{wantedSkill:skillString,
            u_id: u_id
          },
  				function(data,status) {
  					var i;
            var maxPeople = 15;
            var peoplenum = 0;
  					for (i = 0; i < data.length; i++) {
  						var id = data[i].id;
  						if (i > maxPeople) {
  							break;
  						}
              console.log(data[i].id +',' + u_id);
                peoplenum++;
    						if (peoplenum >= 0 && peoplenum <= 8) {
                  $('#another').hide();
    							$(".namelist1").append("<span class='matePhoto' id = '" + id +"'><img src='../Public/images/icons/" + data[i].photo + "'><div class='plusMate'>+求组队</div></span>");
    						} else {
                  $('#another').show();
    							$(".namelist2").append("<span class='matePhoto'><img src='../Public/images/icons/" + data[i].photo + "'><div class='plusMate'>+求组队</div></span>");
    						}
                $('.matePhoto').each(function(i){
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
                });
                var flag = true,
                teamSize = 0,
                findTeamMate = true;
                size = $("#teamSize").text();
                maxSize = /\d-(\d)/.exec(size)[1];
                $('.matePhoto').click(function(){
                  if(!findTeamMate){
                    return false;
                  }
                  if(teamSize > maxSize - 1){
                    $("#myModal").modal('show');
                    findTeamMate = false;
                  }
                  if($(":last-child", $(this)).css("background-color") != "rgb(255, 151, 79)") {
                    if (findTeamMate) {
                      $(":last-child", $(this)).css("background-color", "rgb(255, 151, 79)");
                      teamSize++;
                      console.log("+1");
                      $.post("__APP__/Invitation/addInvitation",
                          { invitor_id:$("#hiddenInfo").attr("u_id"),
                            invitee_id:$(this).attr('id'),
                            activity_id:$("#hiddenInfo").attr("a_id")
                          },
                          function(data,status) {
                            if (status == "success") {
                              $("#myModal2").modal('show');
                            }
                          }
                      );
                    }
                  }
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
          <a class="brand private" href="__APP__/Index/index">
            <img src="../Public/images/logo.jpg" class="img-responsive" alt="Responsive image">
          </a>
          <!--register & login-->
          <div class="first-approch pull-right afterLogin right private">
            <a href="__APP__/Profile/info"><img id="photo-private" src="../Public/images/icons/<?php echo ($user["photo"]); ?>"></a>
          </div>
          <div class="first-approch pull-right afterLogin left private">
            <div id="privateName"><a href="__APP__/Profile/info">
              <img src="../Public/images/private.png">
              <span id="name"><?php echo ($user["name"]); ?></span></a>
              <div id = "hiddenInfo" a_id = <?php echo ($ac["id"]); ?> u_id = <?php echo ($user["id"]); ?>>
              </div>
            </div>
            <div class="bottom">
              <div class="bottom1" id="private-info"><a href="__APP__/Profile/info"><img src="../Public/images/info.png">个人信息</a></div>
              <div class="bottom1" id="logout"><a href="__APP__/Login/logout"><img src="../Public/images/logout.png">退出</a></div>
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

    <!--container-->
    <div class="container">
      <div id="post"><a href="__APP__/Index/index" id="backToCompeList"><span>&lt;&lt;返回比赛列表</span></a><?php echo ($ac["name"]); ?></div>
      <div class="header">
      </div>
      <div class="main">
        <div class="poster">
          <img src="../Public/images/posters/<?php echo ($ac["poster"]); ?>">
        </div>
        <div id="info" class="allInfo" style="display: block">
          <div class="info-block">
            <span class="info">主办单位：</span>
            <span class="infoValue"><?php echo ($ac["hostname"]); ?></span>
          </div>
          <div class="info-block">
            <span class="info">活动时间：</span>
            <span class="infoValue"><?php echo ($ac["start_date"]); ?> - <?php echo ($ac["end_date"]); ?></span>
          </div>
          <div class="info-block">
            <span class="info">报名截止时间：</span>
            <span class="infoValue"><?php echo ($ac["deadline"]); ?></span>
          </div>

          <div class="info-block">
            <span class="info">队伍人数：</span>
            <span id="teamSize" class="infoValue"><?php echo ($ac["size_lowbound"]); ?>-<?php echo ($ac["size_uppbound"]); ?>人</span>
          </div>

          <div id="findTeam" class="button"><img src="../Public/images/findTeam-large.png"></div>
        </div>
        <!--click1: tag choose-->
        <div id="tagChoose" class="allInfo tagChoose" style="display: none">
          <img id="closeTag" class="closeX" src="../Public/images/close.png">
          <div class="post tag-title">需要怎样的小伙伴？  <span class="small">（最多可选三项）</span></div>
          <div class="tag-region">
            <button class="button tag">美工</button>
            <button class="button tag">编程</button>
            <button class="button tag">设计</button>
            <button class="button tag">文案</button>
            <button class="button tag">策划</button>
            <button class="button tag">摄影</button>
            <button class="button tag">硬件</button>
            <button class="button tag">管理</button>
            <button class="button tag">翻译</button>
            <button class="button tag">金融</button>
            <button class="button tag">统计</button>
            <button class="button tag">展示</button>
            <button class="button tag">幽默</button>
            <button class="button tag">文史</button>
            <button class="button tag">哲学</button>
          </div>
          <button id="ensure" class="button edit ensure">确 认</button>
        </div>
        <!--click2: recommend mate-->
        <div id="recoMate" class="allInfo tagChoose" style="display: none">
          <img id="closeTag1" class="closeX" src="../Public/images/close.png">
          <div class="post tag-title">潜在盟友</div>
          <div class="tag-region change-to-another namelist1" style="display: block">
          </div>
          <!--another-->
          <div class="tag-region change-to-another namelist2" style="display: none">
          </div>
          <div id="another" class="another">换一批</div>
        </div>
      </div>
      <div style="clear: both"></div>

      <div class="info-block detail">
        <span class="info">比赛详情：</span>
        <span class="infoValue detail"><?php echo ($ac["introduction"]); ?></span>
	    </div>

      <div class="info-block detail">
        <span class="info">下载：</span>
        <span class="infoValue detail"><a href="/qiuzudui/Files/<?php echo ($ac["applyForm"]); ?>" target="_self">点击下载报名表</a></span>
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
        <button class="btn" data-dismiss="modal" aria-hidden="true">我知道了</button>
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
        <button class="btn" data-dismiss="modal" aria-hidden="true">我知道了</button>
      </div>
    </div>
    <!-- Modal -->
    <div id="myModal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">tips</h3>
      </div>
      <div class="modal-body">
        <p>系统已成功替你发出邮件邀请，请留意对方的邮件回复</p>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">我知道了</button>      </div>
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
  <!--content end-->
  </body>
</html>