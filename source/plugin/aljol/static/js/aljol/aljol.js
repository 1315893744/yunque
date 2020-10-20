$(function(){
	document.documentElement.style.fontSize = document.documentElement.clientWidth / 10 + 'px';
	var face=false;
	var topheight= $('header').outerHeight();
	var footheight= $('footer').outerHeight();
	var allheight=$(window).height();
	var mainheight=allheight-topheight-footheight;
	$('main').css("height",mainheight);
	//表情开始
	if($('.Eface').length>0) {
		var i,str,sum=' ';
		for(i=1;i<=30;i++){
			var str='<li onclick="addsmile('+
			"'[em_"+i+"]');"+
			'"><img src="source/plugin/aljol/static/img/face/'+i+'.gif"></li>';
			sum=sum+str;
		}
		$('.Eface').append(sum);
	}
	$('.emotion').click(function(){
		if(face==true) {
			 $('.Emain').fadeOut();
			 $(this).css("color","#5A5151");
			 face=false;
		}else{
			 $('.Emain').fadeIn();
			 face=true;
			  $(this).css("color","#f65d5b");
		}
	});
	$('.Emain').click(function(){
		 $('.Emain').fadeOut();
		 $('.emotion').css("color","#5A5151");
		 face=false;
	});
	//表情结束

	//控制main高顿
	if($('main').hasClass('talk')) {
		$('.talk').scrollTop($('.talk')[0].scrollHeight);
	}
	//长按删除
	/*var time = 0;//初始化起始时间
	$(".friend").on('touchstart',function(e){
		time = setTimeout(function(){
		var id=$(this).attr('data-id');
		var fid = $(this).attr('id');
	    e.stopPropagation();
	        layer.open({
			    content: '\u662f\u5426\u5220\u9664\u8be5\u6d88\u606f'
			    ,btn: ['\u5220\u9664', '\u53d6\u6d88']
			    ,skin: 'footer'
			    ,yes: function(index){
			      deletenews(id,fid);
			    }//是否删除该消息
			  });
	    }, 5000);//这里设置长按响应时间
	});*/

	//长按删除结束
	//点击图片生成幻灯片

	$('.closeswiper').click(function(){
		$('.swiper-container1').hide();
	})
	//幻灯片结束




})
//获取好友

//压缩图片上传
function lrz_mobile(id,evt){
        file = evt.files[0];
        var filesize = file.size;
        var size = filesize/1024/1024;
        var type = file.name.split('.')[1];
        if (!file.type.match('image.*')) {
			  layer.open({
			    content: '\u56fe\u7247\u7c7b\u578b\u9519\u8bef'
			    ,skin: 'msg'
			    ,time: 2 //2秒后自动关闭
			  });//图片类型错误
        }
        lrz(file, {
            width:1200,
            before: function() {
                //console.log('start');
            },
            fail: function(err) {
                console.error(err);
            },
            always: function() {
                //console.log('end');
            },
            done: function (results) {
            	if(type == 'gif') {
            		if(size >2){
            			   layer.open({
							    content: '\u52a8\u6001\u56fe\u7247\u6587\u4ef6\u5927\u5c0f\u4e0d\u5f97\u8d85\u8fc7\u0032\u004d'
							    ,skin: 'msg'
							    ,time: 2 //2秒后自动关闭
							  });//动态图片不得超过2M
            		}else {
            			uploadgif(id);
            		}

            	}else {
            		var data={'picpath':results.base64,'friendid':id,'type':type};
					var url='plugin.php?id=aljol&act=upload';
	                $.post(url,data,function(res){
						if(res.code == 4) {
							alert('\u60a8\u5df2\u88ab\u7981\u6b62\u53d1\u8a00\uff01\uff01\uff01');
							return false;
						}
						if(res.code == 5) {
							alert('\u60a8\u5df2\u88ab\u7981\u6b62\u8bbf\u95ee\uff01\uff01\uff01');
							return false;
						}
						if(res.code == 200){
							var talkarea=$('.talk ul');
							var datedom = '<li class="layim-chat-li layim-chat-mine">'+
									'<div class="layim-chat-user">'+
										res.head+
									'<cite>'+res.username+'</cite>'+
									'</div>'+
									'<div class="layim-chat-text"><img src="'+res.src+'" class="jm" onclick="clickjm(this);"></div>'+
									'</li>';
							talkarea.append(datedom);
							addslide();
							$('.talk').animate({scrollTop:$('.talk')[0].scrollHeight}, 500);
						}
					},'json');
				}
            }})
    }
function uploadgif(id) {
	 $("#picturefile").ajaxSubmit({
            type: "post",
            dataType: "json",
            data:{'type':'gif','friendid':id},
            url: "plugin.php?id=aljol&act=upload",
            success: function (res) {
               if(res.code == 200) {
           			var talkarea=$('.talk ul');
						var datedom = '<li class="layim-chat-li layim-chat-mine">'+
								'<div class="layim-chat-user">'+
									res.head+
								'<cite>'+res.username+'</cite>'+
								'</div>'+
								'<div class="layim-chat-text"><img src="'+res.src+'" class="jm" onclick="clickjm(this);"></div>'+
								'</li>';
					talkarea.append(datedom);
					addslide();
					$('.talk').animate({scrollTop:$('.talk')[0].scrollHeight}, 500);
               }
            }
    });
}
//delete
function deletenews(id,fid) {
	var url ='plugin.php?id=aljol&act=deletenews';
	var data={'friendid':id};
	$.post(url,data,function(res){
		if(res.code == 200) {
		    layer.open({
			    content: '\u64cd\u4f5c\u6210\u529f'
			    ,skin: 'msg'
			    ,time: 2 //2秒后自动关闭
			    ,end: function(){
			    	$('#'+fid).remove();
			    }//操作成功
			  });
		}
	},'json')
}
function loadmore(a, friendid, uid, loadchatid){
	morepage = parseInt(morepage)+1;
	$(a).html('\u52a0\u8f7d\u4e2d\u002e\u002e\u002e\u002e\u002e\u002e');
	$.post('plugin.php?id=aljol&ajax=1&act=talk&friendid='+friendid+'&morepage='+morepage+'&chatid='+loadchatid, function(res){
		if(res.code == 200) {
			if(res.data == null || res.data == "null" || res.data == ''){
				$(a).html('\u6ca1\u6709\u66f4\u591a\u6570\u636e');
			}else{
				$.each(res.data, function(i, n){
					//alert(parseInt(uid)+'===='+parseInt(n.uid));
					if(parseInt(uid) != parseInt(n.uid)){
						if(n.type == 1){
                            $('#loadmore').prepend('<li class="layim-chat-li w" date-id="'+n.id+'"><div style="font-size:12px;color:#999999;text-align:center;padding:20px;">'+n.datetime+'</div><div class="layim-chat-user"><img src="uc_server/avatar.php?uid='+n.uid+'&size=middle"><cite>'+n.username+'</cite></div><div class="layim-chat-text w"><img src="http://liangjianyun.oss-cn-shanghai.aliyuncs.com/hongbao.png" width="180" onclick="show_red_packet(\''+n.id+'\',\'aljol\')"></div></li>');
						}else{
                            if(n.talk != ''){
                                $('#loadmore').prepend('<li class="layim-chat-li w" date-id="'+n.id+'"><div style="font-size:12px;color:#999999;text-align:center;padding:20px;">'+n.datetime+'</div><div class="layim-chat-user"><img src="uc_server/avatar.php?uid='+n.uid+'&size=middle"><cite>'+n.username+'</cite></div><div class="layim-chat-text w">'+n.talk+'</div></li>');
                            }else{
                                $('#loadmore').prepend('<li class="layim-chat-li w" date-id="'+n.id+'"><div style="font-size:12px;color:#999999;text-align:center;padding:20px;">'+n.datetime+'</div><div class="layim-chat-user"><img src="uc_server/avatar.php?uid='+n.uid+'&size=middle"><cite>'+n.username+'</cite></div><div class="layim-chat-text w"><img src="'+n.picture+'" class="jm" onclick="clickjm(this);"></div></li>');
                            }
						}

					}else{
                        if(n.type == 1){
                            $('#loadmore').prepend('<li class="layim-chat-li w" date-id="'+n.id+'"><div style="font-size:12px;color:#999999;text-align:center;padding:20px;">'+n.datetime+'</div><div class="layim-chat-user"><img src="uc_server/avatar.php?uid='+n.uid+'&size=middle"><cite>'+n.username+'</cite></div><div class="layim-chat-text w"><img src="http://liangjianyun.oss-cn-shanghai.aliyuncs.com/hongbao.png" width="180" onclick="show_red_packet(\''+n.id+'\',\'aljol\')"></div></li>');
                        }else {
                            if (n.talk != '') {
                                $('#loadmore').prepend('<li class="layim-chat-li layim-chat-mine" date-id="' + n.id + '"><div style="font-size:12px;color:#999999;text-align:center;padding:20px;">' + n.datetime + '</div><div class="layim-chat-user"><img src="uc_server/avatar.php?uid=' + n.uid + '&size=middle"><cite>' + n.username + '</cite></div><div class="layim-chat-text">' + n.talk + '</div></li>');
                            } else {
                                $('#loadmore').prepend('<li class="layim-chat-li layim-chat-mine" date-id="' + n.id + '"><div style="font-size:12px;color:#999999;text-align:center;padding:20px;">' + n.datetime + '</div><div class="layim-chat-user"><img src="uc_server/avatar.php?uid=' + n.uid + '&size=middle"><cite>' + n.username + '</cite></div><div class="layim-chat-text"><img src="' + n.picture + '" class="jm" onclick="clickjm(this);"></div></li>');
                            }
                        }
					}
				});
				$(a).html('\u52a0\u8f7d\u66f4\u591a');
			}
		}
	},'json');
}


//变换列表
function switch_list(num,obj) {
	var header=$('#header-list li');
	var foot = $('#foot-list li');
	if(num == 1) {
		header.eq(0).addClass('active').siblings('li').removeClass('active');
		foot.eq(0).addClass('active').siblings('li').removeClass('active');
		$('#friend').hide();
		$('#information').show();
	}
	if(num == 2) {
		header.eq(1).addClass('active').siblings('li').removeClass('active');
		foot.eq(1).addClass('active').siblings('li').removeClass('active');
		$('#information').hide();
		$('#friend').show();
	}
}
//添加表情
function addsmile(smile){
	var old=$("#saytext").val();
	$("#saytext").val(old+smile);
	$('.layim-send').removeClass('layui-disabled');
}
//添加输入
function addtext(){
	var value = $('#saytext').val();
	if(value !='' && value!=null) {
		$('.layim-send').removeClass('layui-disabled');
	}else{
		$('.layim-send').addClass('layui-disabled');
	}
}
//跳转
function friendtalk(id){
	location.href='plugin.php?id=aljol&act=talk&friendid='+id;
}
//发送文字
function send(id,obj){
	if($(obj).hasClass('layui-disabled')){
		return false;
	}else {
		var talk=$('#saytext').val();
		var url='plugin.php?id=aljol&act=chat&friendid='+id;
		var date={'chat':talk};
		$.post(url,date,function(res){
			if(res.code == 4) {
				alert('\u60a8\u5df2\u88ab\u7981\u6b62\u53d1\u8a00\uff01\uff01\uff01');
				return false;
			}
			if(res.code == 5) {
				alert('\u60a8\u5df2\u88ab\u7981\u6b62\u8bbf\u95ee\uff01\uff01\uff01');
				return false;
			}
			var talkarea=$('.talk ul');
			if(res.code == 200) {
				var datedom = '<li class="layim-chat-li layim-chat-mine">'+
								'<div class="layim-chat-user">'+
								res.head+
								'<cite>'+res.username+'</cite>'+
								'</div>'+
								'<div class="layim-chat-text">'+res.chat+'</div>'+
								'</li>';
				var talk=$('#saytext').val('');
				$('.layim-send').addClass('layui-disabled');
				talkarea.append(datedom);
				$('.talk').animate({scrollTop:$('.talk')[0].scrollHeight}, 500);
			}
		},'json');
	}
}
//聊天功能
function chat(id){
	if($('.layim-chat-li').length>30) {
		//$(".layim-chat-li").eq(0).remove();
	}
	var url='plugin.php?id=aljol&act=friendchat&friendid='+id+'&chatid='+$('#loadmore').find('li.w').last().attr('date-id');
	$.post(url,function(res){
		var talkarea=$('.talk ul');
		if(res.code == 200) {
			var datedom = '<li class="layim-chat-li w"  date-id="'+res.id+'">'+
							'<div style="font-size:12px;color:#999999;text-align:center;padding:20px;">'+res.datetime+'</div>'+
							'<div class="layim-chat-user">'+
							'<img src="uc_server/avatar.php?uid='+res.uid+'&size=middle">'+
							'<cite>'+res.username+'</cite>'+
							'</div>'+
							'<div class="layim-chat-text">';
							if(res.type == 1){
                                datedom += '<img src="http://liangjianyun.oss-cn-shanghai.aliyuncs.com/hongbao.png" width="180" onclick="show_red_packet(\''+res.id+'\',\'aljol\')">';
							}else {
                                if (res.chat != null && res.chat != '') {
                                    datedom += res.chat;
                                } else {
                                    datedom += '<img src="' + res.picture + '" class="jm" onclick="clickjm(this);">';
                                }
                            }
					datedom+='</div>'+
							'</li>';
			talkarea.append(datedom);
			addslide();
			$('.talk').animate({scrollTop:$('.talk')[0].scrollHeight}, 500);
		}
	},'json');
	setTimeout(function(){
        chat(id);
    },2000);
}
//消息提醒功能
function news() {
	var url='plugin.php?id=aljol&act=news';
	$.post(url,function(res){
		if(res!=null && res!='') {
			$.each(res,function(k,d){
				var fid=$("#f_"+d.uid);
				var time=parseInt(fid.attr('data-time'));
				if(fid.length == 1) {
					if(d.datetime>time) {
						fid.find('span').html(d.lastnews);
						fid.find('p').eq(1).html(d.time);
						fid.attr('data-time',d.datetime);
					}
				}else{
					var datadom =
					'<div class="friend" onclick="friendtalk('+d.uid+');" id="f_'+d.uid+'" data-time="'+d.datetime+'">'+
						'<div class="friend-head">'+
							d.head+
						'</div>'+
						'<div class="friend-name">'+
							'<div class="friend-name-left">'+
								'<p>'+d.username+'</p>'+
								'<span>'+d.lastnews+'</span>'+
							'</div>'+
							'<div class="friend-name-right">'+
								'<p>'+d.time+'</p>'+
							'</div>'+
						'</div>'+
					'</div>';
					$('#information').prepend(datadom);
				}

			});
		}
	},'json');
	setTimeout(function(){
        news();
    },2000);
}
//添加图片
function addslide() {
	$('.swiper-wrapper').html('');
	var sum = 0;
	$('.jm').each(function(){
		var src = $(this).attr('src');
		$(this).attr('data-id',sum);
		sum=sum+1;
		var datadom='';
		datadom='<div class="swiper-slide" >'+
			'<div class="swiper-zoom-container">'+
				'<img src="'+src+'">'+
			'</div>'+
		'</div>';

		$('.swiper-wrapper').append(datadom);
	});
}
function clickjm(obj){
	var index = $(obj).attr('data-id');
	var swiper = new Swiper('.swiper-container1', {
			zoom: true,
			zoomMax :2,
			initialSlide :index,
			observer:true,
		});
	$('.swiper-container1').show();
}
//添加好友
function opensearch(){
	$('.search').show();
}
function closesearch(){
	$('.search').hide();
	$('#user').html('');
	$('#searchuser').val('');
}
function search() {
	var value = $('#searchuser').val();
	if(value!=null && value!='') {
		$('#user').html('');
		var url ='plugin.php?id=aljol&act=search';
		var data={'searchkey':value};
		$.post(url,data,function(res){
			if(res.code == 200) {
				if(res.myfriend == 1) {
					var datadom = '<li onclick="friendtalk('+res.uid+');">';
				}else{
					var datadom ='<li>';
				}
				datadom+='<div onclick="friendtalk('+res.uid+');">'+res.head+
				'</div><span onclick="friendtalk('+res.uid+');" >'+
				res.username+
				'</span><p onclick="friendtalk('+res.uid+');">'+
				res.sightml+
				'</p>';
				if(res.myfriend == 3) {
					datadom+='<button class="layui-btn" onclick="addfriend('+res.uid+')">\u52a0\u4e3a\u597d\u53cb</button>';
				}//加为好友
				if(res.myfriend == 2) {
					datadom+='<button class="layui-btn">\u7b49\u5f85\u9a8c\u8bc1</button>';
				}//等待验证
				datadom+='</li>';
				$('#user').append(datadom);
			}
			if(res.code == 400){
				layer.open({
				    content: '\u8be5\u7528\u6237\u4e0d\u5b58\u5728'
				    ,skin: 'msg'
				    ,time: 2 //2秒后自动关闭
				 });//该用户不存在
			}
			if(res.code == 500) {
				layer.open({
				    content: '\u65e0\u6cd5\u641c\u7d22\u81ea\u5df1'
				    ,skin: 'msg'
				    ,time: 2 //2秒后自动关闭
				 });//无法搜索自己
			}
		},'json');
	}else{
		layer.open({
		    content: '\u4e0d\u80fd\u4e3a\u7a7a'
		    ,skin: 'msg'
		    ,time: 2 //2秒后自动关闭
		 });//不能为空
	}
}
function addfriend(id){
	console.log(id);
	var friendid=id;
	var url='plugin.php?id=aljol&act=addfriend';
	var date={'friendid':friendid};
	$.post(url,date,function(res){
		if(res.code == 200) {
			layer.open({
			    content: '\u8bf7\u6c42\u5df2\u53d1\u9001'
			    ,skin: 'msg'
			    ,time: 2 //2秒后自动关闭
			 });//请求已发送
		}else{
			layer.open({
			    content: '\u8be5\u7528\u6237\u5df2\u7ecf\u662f\u4f60\u7684\u597d\u53cb'
			    ,skin: 'msg'
			    ,time: 2 //2秒后自动关闭
			 });//该用户已经是你的好友
		}
		$('#user').html('');
	},'json');
}
function requestfriend() {
	location.href='plugin.php?id=aljol&act=requestfriendlist';
}
function sendKeyDown(id){
	if (event.keyCode == 13) {
		send(id, $('.layim-send'));
	}
}
function yesfriend(fid,stateid,obj){
		var url='plugin.php?id=aljol&act=yesandno';
		var data={'friendid':fid,'stateid':stateid};
		$.post(url,data,function(res){
			if(res.code == 200) {
				layer.open({
				   content: '\u5df2\u540c\u610f\u52a0\u4e3a\u597d\u53cb'
				   ,skin: 'msg'
				   ,time: 2 //2秒后自动关闭
				});//已同意加为好友
				$(obj).parent().parent().parent().remove();
			}else{
				layer.open({
				   content: '\u62d2\u7edd\u6210\u529f'
				   ,skin: 'msg'
				   ,time: 2 //2秒后自动关闭
				});//拒绝成功
				$(obj).parent().parent().parent().remove();
			}

		},'json');
	}
