var nativeShare = function (elementNode, config) {
    if (!document.getElementById(elementNode)) {
        return false;
    }
    var qApiSrc = {
        lower: "https://3gimg.qq.com/html5/js/qb.js",
        higher: "https://jsapi.qq.com/get?api=app.share"
    };
    var bLevel = {
        qq: {forbid: 0, lower: 1, higher: 2},
        uc: {forbid: 0, allow: 1}
    };
    var UA = navigator.appVersion;
    var isqqBrowser = (UA.split("MQQBrowser/").length > 1) ? bLevel.qq.higher : bLevel.qq.forbid;
    var isucBrowser = (UA.split("UCBrowser/").length > 1) ? bLevel.uc.allow : bLevel.uc.forbid;
    var version = {
        uc: "",
        qq: ""
    };
    var isWeixin = false;
    config = config || {};
    this.elementNode = elementNode;
    this.url = config.url || document.location.href || '';
    this.title = config.title || document.title || '';
    this.desc = config.desc || document.title || '';
    this.img = config.img || (document.getElementsByTagName('img').length > 2 && document.getElementsByTagName('img')[2].src) || ''; // comiis_messages
    this.img_title = config.img_title || document.title || '';
    this.from = config.from || window.location.host || '';
    this.ucAppList = {
        sinaWeibo: ['kSinaWeibo', 'SinaWeibo', 11, '新浪微博'],
        weixin: ['kWeixin', 'WechatFriends', 1, '微信好友'],
        weixinFriend: ['kWeixinFriend', 'WechatTimeline', '8', '微信朋友圈'],
        QQ: ['kQQ', 'QQ', '4', 'QQ好友'],
        QZone: ['kQZone', 'QZone', '3', 'QQ空间']
    };
    this.share = function (to_app) {
        var title = this.title, url = this.url, desc = this.desc, img = this.img, img_title = this.img_title, from = this.from;
        if (isucBrowser) {
            to_app = to_app == '' ? '' : (platform_os == 'iPhone' ? this.ucAppList[to_app][0] : this.ucAppList[to_app][1]);
            if (to_app == 'QZone') {
                B = "mqqapi://share/to_qzone?src_type=web&version=1&file_type=news&req_type=1&image_url="+img+"&title="+title+"&description="+desc+"&url="+url+"&app_name="+from;
                k = document.createElement("div"), k.style.visibility = "hidden", k.innerHTML = '<iframe src="' + B + '" scrolling="no" width="1" height="1"></iframe>', document.body.appendChild(k), setTimeout(function () {
                    k && k.parentNode && k.parentNode.removeChild(k)
                }, 5E3);
            }
            if (typeof(ucweb) != "undefined") {
                ucweb.startRequest("shell.page_share", [title, title, url, to_app, "", "@" + from, ""])
            } else {
                if (typeof(ucbrowser) != "undefined") {
                    ucbrowser.web_share(title, title, url, to_app, "", "@" + from, '')
                } else {
                }
            }
        } else {
            if (isqqBrowser && !isWeixin) {
                to_app = to_app == '' ? '' : this.ucAppList[to_app][2];
                var ah = {
                    title: title,
                    description: desc,
                    url: url,
                    img_url: img,
                    from: '',
                    to_app: to_app,  //微信好友1,腾讯微博2,QQ空间3,QQ好友4,生成二维码7,微信朋友圈8,啾啾分享9,复制网址10,分享到微博11,创意分享13
                };
                ah = platform_os == "Android" ? ah : '';
                if (typeof(browser) != "undefined") {
                    if (typeof(browser.app) != "undefined" && isqqBrowser == bLevel.qq.higher) {
                         browser.app.share(ah)
                    }
                } else {
                    if (typeof(window.qb) != "undefined" && isqqBrowser == bLevel.qq.lower) {
                        window.qb.share(ah)
                    }
                }
            } else {
            }
        }
    };
    this.html = function() {
        var position = document.getElementById(this.elementNode);
		if ((isqqBrowser || isucBrowser) && !isWeixin) {
			var html = '<a href="javascript:;" class="kmnoz nativeShare" data-app="weixinFriend" ttname="wap_detail_wxpyq"><span class="fx_wxpyq"></span>微信朋友圈</a>'+
				'<a href="javascript:;" class="nativeShare" data-app="weixin" ttname="wap_detail_wx"><span class="fx_weixin"></span>微信好友</a>'+
				'<a href="javascript:;" class="nativeShare" data-app="QQ" ttname="wap_detail_qq"><span class="fx_qq"></span>QQ好友</a>'+
				'<a href="javascript:;" class="kmnoz nativeShare" data-app="QZone" ttname="wap_detail_qzone"><span class="fx_qzone"></span>QQ空间</a>'+
				'<a href="javascript:;" class="nativeShare" data-app="sinaWeibo" ttname="wap_detail_weibo"><span class="fx_weibo"></span>新浪微博</a>'+
				'<a href="javascript:;" class="nativeShare" data-app=""><span class="fx_more"></span>更多</a>';
        }else{
			var html = '<a href="javascript:;" data-cmd="sqq" class="kmnoz" style="width:23%"><span class="fx_qq"></span>QQ好友</a>'+
				'<a href="javascript:;" data-cmd="qzone" style="width:23%"><span class="fx_qzone"></span>QQ空间</a>'+
				'<a href="javascript:;" data-cmd="tsina" style="width:23%"><span class="fx_weibo"></span>新浪微博</a>'+
				'<a href="javascript:;" class="comiis_more_key" style="width:23%"><span class="fx_more"></span>更多</a>';
        }
        position.innerHTML = html;
    };
    this.isloadqqApi = function () {
        if (isqqBrowser) {
            var b = (version.qq < 5.4) ? qApiSrc.lower : qApiSrc.higher;
            var d = document.createElement("script");
            var a = document.getElementsByTagName("body")[0];
            d.setAttribute("src", b);
            a.appendChild(d)
        }
    };
    this.getPlantform = function () {
        ua = navigator.userAgent;
        if ((ua.indexOf("iPhone") > -1 || ua.indexOf("iPod") > -1)) {
            return "iPhone"
        }
        return "Android"
    };
    this.is_weixin = function () {
        var a = UA.toLowerCase();
        if (a.match(/MicroMessenger/i) == "micromessenger" || a.match(/qq\//i) == "qq/") {
            return true
        } else {
            return false
        }
    };
    this.getVersion = function (c) {
        var a = c.split("."), b = parseFloat(a[0] + "." + a[1]);
        return b
    };
    this.init = function () {
        platform_os = this.getPlantform();
        version.qq = isqqBrowser ? this.getVersion(UA.split("MQQBrowser/")[1]) : 0;
        version.uc = isucBrowser ? this.getVersion(UA.split("UCBrowser/")[1]) : 0;
        isWeixin = this.is_weixin();
        if ((isqqBrowser && version.qq < 5.4 && platform_os == "iPhone") || (isqqBrowser && version.qq < 5.3 && platform_os == "Android")) {
            isqqBrowser = bLevel.qq.forbid
        } else {
            if (isqqBrowser && version.qq < 5.4 && platform_os == "Android") {
                isqqBrowser = bLevel.qq.lower
            } else {
                if (isucBrowser && ((version.uc < 10.2 && platform_os == "iPhone") || (version.uc < 9.7 && platform_os == "Android"))) {
                    isucBrowser = bLevel.uc.forbid
                }
            }
        }
        this.isloadqqApi();
        this.html();
        if (!isqqBrowser && !isucBrowser) {
			$(document).on('click', '.bdsharebuttonbox a', function() {
				var obj = $(this);
				if(obj.attr('data-cmd') == 'sqq'){
					window.open('https://connect.qq.com/widget/shareqq/index.html?url='+encodeURIComponent(share.url)+'&desc='+comiis_UrlEncode(share.desc)+'&title='+comiis_UrlEncode(share.title)+'&pics='+encodeURIComponent(share.img));
				}else if(obj.attr('data-cmd') == 'qzone'){
					window.open('https://h5.qzone.qq.com/q/qzs/open/connect/widget/mobile/qzshare/index.html?page=qzshare.html&loginpage=loginindex.html&logintype=qzone&title='+comiis_UrlEncode(share.title)+'&summary='+comiis_UrlEncode(share.desc)+'&url='+encodeURIComponent(share.url)+'&desc='+comiis_UrlEncode(share.desc)+'&imageUrl='+encodeURIComponent(share.img)+'&site='+encodeURIComponent(share.from)+'&sid=&referer='+encodeURIComponent(share.url));
				}else if(obj.attr('data-cmd') == 'tsina'){
					window.open('http://service.weibo.com/share/share.php?url='+encodeURIComponent(share.url)+'&appkey=&title='+comiis_UrlEncode(share.title)+'&pic='+encodeURIComponent(share.img)+'&language=zh_cn');
				}
			});
		}
    };
    this.init();
    var share = this;
    var items = document.getElementsByClassName('nativeShare');
    for (var i=0;i<items.length;i++) {
        items[i].onclick = function(){
			var share_key = this;
			comiis_share_box_close();
			setTimeout(function(){
				share.share(share_key.getAttribute('data-app'));
			}, 500);
        }
    }
    return this;
};
var a = navigator.appVersion.toLowerCase(), isqw = 0, isusershare = 0;
if (a.match(/MicroMessenger/i) == "micromessenger" || a.match(/qq\//i) == "qq/") {
	isqw = 1;
}
function comiis_UrlEncode(str){  
    str = (str + '').toString();   
    return encodeURIComponent(str).replace(/!/g, '%21').replace(/'/g, '%27').replace(/\(/g, '%28').replace(/\)/g, '%29').replace(/\*/g, '%2A').replace(/%20/g, '+');  
} 
function comiis_share_box_close() {
	if (isqw) {
		$('#comiis_bgbox,.comiis_share_tip').css('display', 'none');
	}else{
		if($('.comiis_share_tip').hasClass("comiis_share_tip_bottom")){
			$('.comiis_share_tip').removeClass("comiis_share_tip_bottom").css('display', 'none');
			$('#comiis_bgbox').css('display', 'none');
			$('.comiis_share_box').removeClass("comiis_share_box_show").off().css('display', 'none');
		}else{
			$('.comiis_share_box').removeClass("comiis_share_box_show").on('webkitTransitionEnd transitionend', function() {
				$(this).off().css('display', 'none');
				$('#comiis_bgbox').css('display', 'none');
			});
		}
	}
}
$(document).ready(function() {
	$('.comiis_share_box_close').on('click', function() {
		comiis_share_box_close();
	});
	$('.comiis_share_key').on('click', function() {
		comiis_menu_hide();
		if(typeof comiis_user_share === 'function'){
			comiis_user_share();
		}
		if(isusershare == 0){
			var isqqBrowser = (navigator.appVersion.split("MQQBrowser/").length > 1) ? 1 : 0;
			var isucBrowser = (navigator.appVersion.split("UCBrowser/").length > 1) ? 1 : 0;
			if ((isqqBrowser || isucBrowser) && !isqw) {
				share_obj.share('');
			}else{
				Comiis_MENU_on == 1;
				$('#comiis_bgbox').off().on('click', function() {
					comiis_share_box_close();
					return false;
				}).css({
					'display':'block',
					'width':'100%',
					'height':'100%',
					'position':'fixed',
					'top':'0',
					'left':'0',
					'background':'#000',
					'opacity' : '.7',
					'z-index':'101'
				});
				if (isqw) {
					$('.comiis_share_tip').css({'display':'block'}).off().on('click', function() {
						comiis_share_box_close();
						return false;
					});
				}else{
					$('.comiis_share_box').css('display', 'block');
					setTimeout(function() {
						$('.comiis_share_box').addClass("comiis_share_box_show");
					}, 20);
					$('.comiis_more_key').off().on('click', function() {
						$('.comiis_share_box').css('display', 'none');
						$('.comiis_share_tip').css({'display':'block'}).addClass("comiis_share_tip_bottom").off().on('click', function() {
							comiis_share_box_close();
						});				
					});
				}
			}
		}
	});
});
