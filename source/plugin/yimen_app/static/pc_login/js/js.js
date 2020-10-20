	$(function(){
		/*����ƹ������Ұ�ť��ʾ*/
		$(".pic1").hover(function(){
			$(this).find(".prev,.next").fadeTo("show",0.3);
		},function(){
			$(this).find(".prev,.next").hide();
		});
		/*����ƹ�ĳ����ť ������ʾ*/
		$(".pic1 .prev,.pic1 .next").hover(function(){
			$(this).fadeTo("show",0.7);
		},function(){
			$(this).fadeTo("show",0.3);
		});
		/*����ͼ*/
		$(".pic1").slide({ titCell:".num ul" , effect:"fade", mainCell:".pic_con" , autoPlay:true, delayTime:500 , autoPage:true,interTime:3000});
		$(".show").on("click",function(event){
			if(event.target.nodeName!="A"){
				window.open($(this).find("a.tit").attr("href"));
			}
		});
		$(".fenlei dt").click(function(){
			$(this).attr("id","presed").siblings().attr("id","");
		});
		$(".anli_menu li").click(function(){
			$(this).attr("id","dq_menu").siblings().attr("id","");
		});
		$(".check").click(function(){
			$(this).hasClass("checked")?$(this).removeClass('checked'):$(this).addClass("checked");
		});
		$(".character_menu li").click(function(){
				var index_val=$(this).index();
				$(this).parent().siblings().find(".character_cont").eq(index_val).show().siblings().hide();
				$(this).addClass("clicked_menu").siblings().removeClass('clicked_menu');
			});
		$(".built_app_menu li").click(function(){
				var index_val=$(this).index();
				$(this).parents().siblings().find(".menu_cont").eq(index_val).show().siblings().hide();
				$(this).addClass("clicked_menu").siblings().removeClass('clicked_menu');
			});
	});