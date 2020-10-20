
jQuery(function(){
	var tophtml="<div id=\"izl_rmenu\" class=\"izl-rmenu\"><a href=\"tencent://Message/?Uin=121834517&websiteName=www.lanrentuku.com=&Menu=yes\" class=\"btn btn-qq\"></a><div class=\"btn btn-wx\"><img class=\"pic\" src=\"template/ubike_hyb/style/img/weixin.jpg\" onclick=\"window.location.href=\'136-2228-0099\'\"/></div><div class=\"btn btn-phone\"><div class=\"phone\">136-6762-0099</div></div><div class=\"btn btn-top\"></div></div>";
	jQuery("#top").html(tophtml);
	jQuery("#izl_rmenu").each(function(){
		jQuery(this).find(".btn-wx").mouseenter(function(){
			jQuery(this).find(".pic").fadeIn("fast");
		});
		jQuery(this).find(".btn-wx").mouseleave(function(){
			jQuery(this).find(".pic").fadeOut("fast");
		});
		jQuery(this).find(".btn-phone").mouseenter(function(){
			jQuery(this).find(".phone").fadeIn("fast");
		});
		jQuery(this).find(".btn-phone").mouseleave(function(){
			jQuery(this).find(".phone").fadeOut("fast");
		});
		jQuery(this).find(".btn-top").click(function(){
			jQuery("html, body").animate({
				"scroll-top":0
			},"fast");
		});
	});
	var lastRmenuStatus=false;
	jQuery(window).scroll(function(){//bug
		var _top=jQuery(window).scrollTop();
		if(_top>200){
			jQuery("#izl_rmenu").data("expanded",true);
		}else{
			jQuery("#izl_rmenu").data("expanded",false);
		}
		if(jQuery("#izl_rmenu").data("expanded")!=lastRmenuStatus){
			lastRmenuStatus=jQuery("#izl_rmenu").data("expanded");
			if(lastRmenuStatus){
				jQuery("#izl_rmenu .btn-top").slideDown();
			}else{
				jQuery("#izl_rmenu .btn-top").slideUp();
			}
		}
	});
});