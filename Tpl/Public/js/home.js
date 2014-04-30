$(document).ready(function(){
	//author hexiaoou
	$('.carousel').carousel();
    $('.list > li').mouseover(function(){
    	$(this).addClass("active-add");
    	//$(this).css({"background-color":"#669acc","color":"white"});
    	//$(".text span").css({"color":"yellow"});
    }).mouseout(function(){
    	$(this).removeClass("active-add");
    	//$(this).css({"background-color":"white","color":"#669acc"});
    	//$(".text span").css({"color":"#669acc"});
    });

    $(".deleteRequest").each(function(){
        $(this).click(function(){
            var index = $(".deleteRequest").index($(this));
            $("#myModalLabel").text($(".title").eq(index).text());
        });
    });

     $(".pagination span.prev").removeClass('current');

    $(function(){
    //这是一个非常简单的demo实例，让列表元素分页显示
    //回调函数的作用是显示对应分页的列表项内容
    //回调函数在用户每次点击分页链接的时候执行
    //参数page_index{int整型}表示当前的索引页
    var initPagination = function() {
        var num_entries = $("#hiddenresult div.result").length;
        // 创建分页
        $("#Pagination").pagination(num_entries, {
            ellipse_text: "",
            num_edge_entries: 0,
            num_display_entries: 6,
            callback: pageselectCallback,
            items_per_page: 2,
            prev_text: "<前一页",
            next_text: "后一页>"
        });
     }();

    function pageselectCallback(page_index, jq){

    	$("#Pagination>a").each(function(){
            if($(this).attr('href') == '#'){
              $(this).attr('href','javascript:void(0)');
            }
        });

        var new_content = $("#hiddenresult div.result:eq("+(page_index*2)+")").clone(),
            new_content1 = $("#hiddenresult div.result:eq("+(page_index*2+1)+")").clone();
        $("#Searchresult").empty().append(new_content); //装载对应分页的内容
        $("#Searchresult").append(new_content1);
        return false;
    }
  });
});