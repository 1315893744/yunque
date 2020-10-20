function succeedhandle_favorite_del(a, b, c){
	if(b.indexOf("成功") >= 0){
		b = '已取消关注此版块';
	}
	$('.comiis_favorites').removeClass('bg_b f_d').addClass("bg_a f_f");
	$('.comiis_favorites a').attr('href', "home.php?mod=spacecp&ac=favorite&type=forum&id=" + c['id'] + "&formhash=" + formhash + "&handlekey=forum_fav&mobile=2").text('+ 关注');
	if(Number($('#comiis_forum_favtimes em').text()) > 1){
		$('#comiis_forum_favtimes em').text(Number($('#comiis_forum_favtimes em').text()) - 1);
	}else{
		$('#comiis_forum_favtimes').html('');
	}
	popup.open(b, 'alert');
}
function errorhandle_favorite_del(a, b){
	if(a.indexOf("不存在") >= 0){
		a = '您还没有关注此版块';
	}
	popup.open(a, 'alert');
}
function succeedhandle_forum_fav(a, b, c){
	if(b.indexOf("收藏成功") >= 0){
		b = '版块关注成功';
		$('.comiis_favorites').removeClass('bg_a f_f').addClass("bg_b f_d");
		$('.comiis_favorites a').attr('href', "home.php?mod=spacecp&ac=favorite&op=delete&type=forum&formhash=" + formhash + "&favid=" + c['favid'] + "&handlekey=forum_fav&mobile=2").text('已关注');
		if($('#comiis_forum_favtimes em').length > 0){
			$('#comiis_forum_favtimes em').text(Number($('#comiis_forum_favtimes em').text()) + 1);
		}else{
			$('#comiis_forum_favtimes').html('关注: <em>1</em>');
		}
	}
	popup.open(b, 'alert');
}
function errorhandle_forum_fav(a, b){
	if(a.indexOf("重复收藏") >= 0){
		a = '版块已关注';
	}else if(a.indexOf("不存在") >= 0){
		a = '您还没有关注此版块';
	}
	popup.open(a, 'alert');
}
function succeedhandle_favorite_thread(a, b, c){
	popup.open(b, 'alert');
}
function errorhandle_favorite_thread(a, b){
	popup.open(a, 'alert');
}
function succeedhandle_favorite_add(a, b, c){
	if($('#comiis_favorite_a span').length < 1){
		$('#comiis_favorite_a').append('<span class="bg_del f_f comiis_kmvnum comiis_favorite_a_num" id="comiis_recommend_num">0</span>');
	}
	$('.comiis_favorite_a_num').text(Number($('.comiis_favorite_a_num').text()) + 1);
	$('.comiis_favorite_a_color').removeClass('f_b').addClass("f_a").html('&#xe64c;');
	popup.open(b, 'alert');
}
function errorhandle_favorite_add(a, b){
	popup.open(a, 'alert');
}
function comiis_followmod() {
	var obj = $('#followmod');
	$.ajax({
		type:'GET',
		url: obj.attr('href') + '&inajax=1' ,
		dataType:'xml',
	}).success(function(s) {
		if(s.lastChild.firstChild.nodeValue.indexOf("'type':'add'") > 0){
			obj.text('已关注楼主').attr({"href" : 'home.php?mod=spacecp&ac=follow&op=del&fuid=' + authorid, "class" : "top_nums bg_b f_d y followmod"});
			popup.open('关注成功', 'alert');
		}else if(s.lastChild.firstChild.nodeValue.indexOf("'type':'del'") > 0){
			obj.text('关注楼主').attr({"href" : 'home.php?mod=spacecp&ac=follow&op=add&hash=' + formhash + '&fuid=' + authorid, "class" : "top_nums bg_c f_f y followmod"});
			popup.open('已取消关注', 'alert');
			popup.close();
		}else{
			window.location.href = obj.attr('href');
		}
	}).error(function() {
		window.location.href = obj.attr('href');
	});
}
function comiis_recommend(a){
	var pid = a;
	$.ajax({
		type:'GET',
		url:'forum.php?mod=misc&action=postreview&do=support&tid=' + tid + '&pid=' + a + '&hash=' + formhash + '&inajax=1',
		dataType:'xml',
	})
	.success(function(s) {
		var s = s.lastChild.firstChild.nodeValue;
		if(s.indexOf("您不能对自己的回帖进行投票") >= 0){
			popup.open('您不能点赞自己的回帖', 'alert');
		}else if(s.indexOf("您已经对此回帖投过票了") >= 0){
			$.ajax({
				type : 'GET',
				url : 'plugin.php?id=comiis_app&comiis=re_hotreply&tid='+tid+'&pid='+pid+'&inajax=1',
				dataType : 'xml',
			}).success(function(v) {
				var re_tid = $('#comiis_recommend'+pid);
				var recommend_num = Number(re_tid.text());
				if(recommend_num > 1){
					re_tid.text((recommend_num - Number(allowrecommend)));
				}else{
					re_tid.text('');
				}
				popup.open('已取消回帖点赞', 'alert');
				$('#comiis_hotreply' + pid).removeClass('f_wb');
				$('#comiis_hotreply' + pid + ' i').html('&#xe63b;');
			});
		}else if(s.indexOf("投票成功") >= 0){
			popup.open('点赞成功', 'alert');
			var c = Number($('#comiis_recommend' + a).text());
			var b = (isNaN(c) ? 0 : c) + Number(allowrecommend);
			$('#comiis_recommend' + a).text(b);
			$('#comiis_hotreply' + pid).addClass('f_wb');
			$('#comiis_hotreply' + pid + ' i').html('&#xe654;');
		}else if(s.indexOf("window.location.href = 'member.php?mod=logging&action=login&mobile=2'") >= 0){
			window.location.href = 'member.php?mod=logging&action=login&mobile=2';
		}else{
			popup.open('发生错误', 'alert');
		}
	})
	.error(function() {
		window.location.href = obj.attr('href');
		popup.close();
	});
	return false;
}
function comiis_getthreadtypes(a, b) {
	$.ajax({
		type:'GET',
		url: 'forum.php?mod=ajax&action=getthreadtypes&fid=' + a + '&inajax=1' ,
		dataType:'xml',
	}).success(function(s){
		$('#'+b).html(s.lastChild.firstChild.nodeValue.replace("<select",'<div class="comiis_login_select comiis_inner b_ok"><span class="inner"><i class="comiis_font f_d">&#xe60c;</i><span class="z"><span class="comiis_question f_b" id="select_'+b+'_name"></span></span></span><select id="select_'+b+'"'));
		
	});
}
function submitpostpw(pid, tid) {
	var obj = document.getElementById('postpw_' + pid);
	setcookie('postpw_' + pid, hex_md5(obj.value));
	if(!tid) {
		location.href = location.href;
	} else {
		location.href = 'forum.php?mod=viewthread&tid='+tid;
	}
}
function setcookie(cookieName, cookieValue, seconds, path, domain, secure) {
	if(cookieValue == '' || seconds < 0) {
		cookieValue = '';
		seconds = -2592000;
	}
	if(seconds) {
		var expires = new Date();
		expires.setTime(expires.getTime() + seconds * 1000);
	}
	domain = !domain ? cookiedomain : domain;
	path = !path ? cookiepath : path;
	document.cookie = escape(cookiepre + cookieName) + '=' + escape(cookieValue)
		+ (expires ? '; expires=' + expires.toGMTString() : '')
		+ (path ? '; path=' + path : '/')
		+ (domain ? '; domain=' + domain : '')
		+ (secure ? '; secure' : '');
}
var comiis_recommend_key = 0;
$(document).ready(function() {
	$('#followmod').on('click', function() {
		if($(this).attr('href').indexOf('op=del') > 0){
			popup.open($('#comiis_followmod'));
		}else{
			comiis_followmod();
		}
		return false;
	});
	$('.comiis_recommend_addkey').on('click', function() {
		if(comiis_recommend_key == 0){
			comiis_recommend_key = 1;
			$.ajax({
				type : 'GET',
				url : $(this).attr('href') + '&inajax=1',
				dataType : 'xml',
			})
			.success(function(s) {
				var s = s.lastChild.firstChild.nodeValue;
				if(s.indexOf("您已评价过本主题") >= 0){
					$.ajax({
						type : 'GET',
						url : 'plugin.php?id=comiis_app&comiis=re_recommend&tid='+tid+'&inajax=1',
						dataType : 'xml',
					}).success(function(v) {
						var recommend_num = Number($('#comiis_recommend_num').text());
						if($(".comiis_recommend_list_a").length > 0){
							$('#comiis_recommend_list_a'+uid).remove();
						}
						if($(".comiis_recommend_list_t").length > 0){
							$('#comiis_recommend_list_t'+uid).remove();
						}
						if(recommend_num > 1){
							$('.comiis_recommend_num').text((recommend_num-Number(allowrecommend)));
							$('.comiis_recommend_nums').text('+' + (recommend_num-Number(allowrecommend)));
						}else{
							$('#comiis_recommend_num').remove();
							$('.comiis_recommend_nums').text('');
							
							if($(".comiis_recommend_list_a").length > 0){
								$('.comiis_recommend_list_a').empty().removeClass('comiis_recommend_list_on');
							}
							if($(".comiis_recommend_list_t").length > 0){
								$('.comiis_recommend_list_t').removeClass('comiis_recommend_list_on');
							}
						}
						$('.comiis_recommend_color').removeClass('f_a').addClass("f_b").html('&#xe63b;');
						popup.open('已取消点赞', 'alert');
					});
				}else if(s.indexOf("您不能评价自己的帖子") >= 0){
					popup.open('不能点赞自己的帖子', 'alert');
				}else if(s.indexOf("今日评价机会已用完") >= 0){
					popup.open('您今日的点赞机会已用完', 'alert');
				}else if(s.indexOf("'recommendv':'+" + allowrecommend + "'") >= 0){
					var b = [], r;
					r = s.match(/\'recommendc\':\'(.*?)\'/);
					if(r != null){
						b['recommendc'] = r[1];
					}else{
						b['recommendc'] = 0;
					}
					r = s.match(/\'daycount\':\'(.*?)\'/);
					if(r != null){
						b['daycount'] = r[1];
					}else{
						b['daycount'] = 0;
					}
					if($('.comiis_recommend_new span').length < 1){
						$('.comiis_recommend_new').append('<span class="bg_del f_f comiis_kmvnum comiis_recommend_num" id="comiis_recommend_num">0</span>');
					}
					var comiis_recommend_num = Number($('#comiis_recommend_num').text());
					if($(".comiis_recommend_list_a").length > 0){
						$('.comiis_recommend_list_a').removeClass('comiis_recommend_list_on').addClass("comiis_recommend_list_on").prepend(($(".comiis_recommend_list_a li").length > 0 ? '' : '<li style="float:right;margin-right:0;"><a href="misc.php?op=recommend&tid= ' + tid + '&mod=faq&mobile=2"><span class="bg_b f_c"><em class="comiis_recommend_num">' + comiis_recommend_num + '</em>赞</span></a></li>') + '<li id="comiis_recommend_list_a'+uid+'"><a href="home.php?mod=space&uid='+uid+'"><img src="uc_server/avatar.php?uid='+uid+'&size=small"></a></li>');
					}
					if($('.comiis_recommend_list_t').length > 0){
						$('.comiis_recommend_list_t').removeClass('comiis_recommend_list_on').addClass("comiis_recommend_list_on").prepend('<span id="comiis_recommend_list_t'+uid+'"><a href="home.php?mod=space&uid='+uid+'" class="f_c">'+username+'</a>'+ ($(".comiis_recommend_list_t a").length > 0 ? '<span class="f_d"> , </span>' : '') + '</span>');
					}
					$('.comiis_recommend_num').text(comiis_recommend_num + Number(allowrecommend));
					$('.comiis_recommend_nums').text('+' + (comiis_recommend_num + Number(allowrecommend)));
					$('.comiis_recommend_color').removeClass('f_b').addClass("f_a").html('&#xe654;');

					popup.open('点赞成功' + (b['daycount'] ? ', 您今天还能点赞 ' + (b['daycount'] - 1) + ' 次' : ''), 'alert');
				}else if(s.indexOf("window.location.href = 'member.php?mod=logging&action=login&mobile=2'") >= 0){
					window.location.href = 'member.php?mod=logging&action=login&mobile=2';
				}else{
					popup.open('没有点赞权限或帖子不存在', 'alert');
				}
				setTimeout(function() {
					comiis_recommend_key = 0;
				}, 500);
			})
			.error(function() {
				window.location.href = obj.attr('href');
				popup.close();
				setTimeout(function() {
					comiis_recommend_key = 0;
				}, 500);
			});
		}
		return false;
	});
});
var DTimers = new Array();
var DItemIDs = new Array();
var DTimers_exists = false;
function settimer(timer, itemid) {
	if(timer && itemid) {
		DTimers.push(timer);
		DItemIDs.push(itemid);
	}
	if(!DTimers_exists) {
		setTimeout("showtime()", 1000);
		DTimers_exists = true;
	}
}
function showtime() {
	for(i=0; i<=DTimers.length; i++) {
		if(DItemIDs[i]) {
			if(DTimers[i] == 0) {
				$('#'+DItemIDs[i]).html('已结束');
				DItemIDs[i] = '';
				continue;
			}
			var timestr = '';
			var timer_day = Math.floor(DTimers[i] / 86400);
			var timer_hour = Math.floor((DTimers[i] % 86400) / 3600);
			var timer_minute = Math.floor(((DTimers[i] % 86400) % 3600) / 60);
			var timer_second = (((DTimers[i] % 86400) % 3600) % 60);
			if(timer_day > 0) {
				timestr += timer_day + '天';
			}
			if(timer_hour > 0) {
				timestr += timer_hour + '小时'
			}
			if(timer_minute > 0) {
				timestr += timer_minute + '分'
			}
			if(timer_second > 0) {
				timestr += timer_second + '秒'
			}
			DTimers[i] = DTimers[i] - 1;
			$('#'+DItemIDs[i]).html(timestr);
		}
	}
	setTimeout("showtime()", 1000);
}
function setanswer(pid, from){
	if(confirm('您确认要把该回复选为“最佳答案”吗？')){
		document.getElementById('modactions').action='forum.php?mod=misc&action=bestanswer&tid=' + tid + '&pid=' + pid + '&from=' + from + '&bestanswersubmit=yes';
		var obj = $('#modactions');
		$.ajax({
			type:'POST',
			url:obj.attr('action') + '&inajax=1',
			data:obj.serialize(),
			dataType:'xml'
		})
		.success(function(s) {
			popup.open(s.lastChild.firstChild.nodeValue);
			evalscript(s.lastChild.firstChild.nodeValue);
		})
		.error(function() {
			window.location.href = obj.attr('href');
			popup.close();
		});		
	}
}
