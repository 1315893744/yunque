<style></style>
				<script>
				function comiis_app_portal_loop(h, speed, delay, sid) {
					var t = null;
					var o = document.getElementById(sid);
					o.innerHTML += o.innerHTML;
					o.scrollTop = 0;
					function start() {
						t = setInterval(scrolling, speed);
						o.scrollTop += 2;
					}
					function scrolling() {
						if(o.scrollTop % h != 0) {
							o.scrollTop += 2;
							if(o.scrollTop >= o.scrollHeight / 2) o.scrollTop = 0;
						} else {
							clearInterval(t);
							setTimeout(start, delay);
						}
					}
					setTimeout(start, delay);
				}
				function comiis_app_portal_swiper(a, b){
					if(typeof(Swiper) == 'undefined') {
						$.getScript("./source/plugin/comiis_app_portal/image/comiis.js").done(function(){
							new Swiper(a, b);
						});
					}else{
						new Swiper(a, b);
					}
				}
				</script><div id="comiis_app_block_4" class="bg_f cl"><style>
.comiis_mhswfa {background:#000;overflow:hidden;position:relative;}
.comiis_mhswfa .swiper-slide span {position:absolute;left:0;bottom:36px;float:left;color:#fff;width:auto;padding:2px 10px;font-size:14px;max-height:60px;line-height:30px;background:rgba(0,0,0,0.7);overflow:hidden;}
.comiis_mhswfa_roll {position:absolute;left:0;bottom:0;margin-bottom:18px;height:18px;width:100%;text-align:center;color:#fff;z-index:9;overflow:hidden;}
.comiis_mhswfa_roll .swiper-pagination-bullet {display:inline-block;width:4px;height:4px;margin:0 2px;background-color:rgba(0, 0, 0, 0.35);border-radius:6px;}
.comiis_mhswfa_roll .swiper-pagination-bullet-active {background-color:#fff;width:10px;}
</style>
<div class="comiis_mhswfa comiis_mhswfa4">
<ul class="swiper-wrapper">
    <li class="swiper-slide">
            <a href="forum.php?mod=viewthread&tid=21" title="随手拍">
<img src="data/attachment/block/8c/8cb5b225d4e2bab7c8ccd81c661cb9b7.jpg" width="100%" class="vm comiis_mhswfa_whb4" alt="随手拍">
</a>
</li>
<li class="swiper-slide">
            <a href="forum.php?mod=viewthread&tid=14" title="jttqzmy">
<img src="data/attachment/block/c2/c23f580cb9bd97d204ebc0f4d58571ca.jpg" width="100%" class="vm comiis_mhswfa_whb4" alt="jttqzmy">
</a>
</li>
</ul>
<div class="comiis_mhswfa_roll comiis_mhswfa_roll4"></div>
<div class="comiis_svg_box"><div class="comiis_svg_a"></div><div class="comiis_svg_b"></div></div>
</div>
<script>
  $('.comiis_mhswfa_whb4').css('height', ($('.comiis_mhswfa_whb4').width() * 0.5) + 'px');
comiis_app_portal_swiper('.comiis_mhswfa4', {
slidesPerView : 'auto',
        pagination: '.comiis_mhswfa_roll4',
loop: true,
autoplay: 5000,
        autoplayDisableOnInteraction: false,
onTouchMove: function(swiper){
Comiis_Touch_on = 0;
},
onTouchEnd: function(swiper){
Comiis_Touch_on = 1;
},
});
</script></div><div id="comiis_app_block_2" class="bg_f b_b cl"><style>
.comiis_mh_gz02 {overflow:hidden;}
.comiis_mh_gz02 a {float:left;width:33.33%;line-height:20px;padding:10px 12px;font-size:13px;text-align:center;box-sizing:border-box;overflow:hidden;}
.comiis_mh_gz02 a h2 {height:24px;line-height:24px;font-size:18px;font-weight:400;margin-top:2px;overflow:hidden;}
</style>
<div class="comiis_mh_gz02 cl">
<a href="forum.php?mod=forumdisplay&fid=2&mobile=2"><h2 style="color:#ff9900">林大资讯</h2><span class="f_c">快速知晓校内大事</span></a>
<a href="forum.php?mod=forumdisplay&fid=39&mobile=2" class="b_r"><h2 style="color:#20b4ff">活动通知</h2><span class="f_c">不要错过每一次挑战</span></a>
<a href="forum.php?mod=forumdisplay&fid=114&mobile=2"><h2 style="color:#FF5F45">找资料</h2><span class="f_c">快速查找各类资源</span></a>
</div></div><div id="comiis_app_block_1" class="bg_f b_b cl"><style>
.comiis_mh_kxtxt {padding:10px 12px;height:22px;line-height:22px;overflow:hidden;}
.comiis_mh_kxtxt span.kxtit {float:left;height:18px;line-height:18px;padding:0 3px;margin-top:2px;margin-right:8px;overflow:hidden;border-radius:1.5px;}
.comiis_mh_kxtxt li, .comiis_mh_kxtxt li a {display:block;font-size:14px;height:22px;line-height:22px;overflow:hidden;}
</style>
<div class="comiis_mh_kxtxt cl">
  <span class="kxtit bg_del f_f">曝光台</span>
<div id="comiis_mh_kxtxt1" style="height:22px;line-height:22px;overflow:hidden;">
<ul>
    <li><a href="forum.php?mod=viewthread&tid=22" title="中国生物新冠疫苗很可能年底上市，两针肯定比 1000 元低">中国生物新冠疫苗很可能年底上市，两针肯定比 1000 元低</a></li>
    <li><a href="forum.php?mod=viewthread&tid=11" title="学校网站选课登不进去，建议学校优化一下服务器">学校网站选课登不进去，建议学校优化一下服务器</a></li>
    <li><a href="forum.php?mod=viewthread&tid=2" title="多国对中国提供物资和分享经验表示感谢">多国对中国提供物资和分享经验表示感谢</a></li>
    <li><a href="forum.php?mod=viewthread&tid=21" title="随手拍">随手拍</a></li>
    <li><a href="forum.php?mod=viewthread&tid=20" title="2020年5月11日签到记录贴">2020年5月11日签到记录贴</a></li>
    </ul>
</div>
</div>
<script>comiis_app_portal_loop(22, 30, 5000, 'comiis_mh_kxtxt1');</script></div><div id="comiis_app_block_12" class="bg_f mt10 b_t b_b cl"><style>
.comiis_mh_tit {overflow:hidden;position:relative;}
.comiis_mh_tit_more {position:absolute;right:12px;top:8px;width:16px;height:22px;z-index:50;overflow:hidden;}
.comiis_mh_tit .mh_tit_morea {display:block;position:absolute;right:5px;top:8px;width:40px;height:22px;z-index:60;text-indent:-999px;overflow:hidden;}
.comiis_mh_tit h2 {height:18px;line-height:18px;margin:0 12px;padding-top:12px;font-size:16px;font-weight:400;overflow:hidden;}
</style>
<div class="comiis_mh_tit cl">
    <i class="comiis_mhfont comiis_mh_tit_more f_d">&#xe601;</i>
    <a href="#" class="mh_tit_morea">更多</a><h2 class="pb12">微播报</h2></div></div><div id="comiis_app_block_13" class="bg_f b_b cl"><style>
.comiis_mh_txtlist_bk li {margin:0 12px;height:40px;line-height:40px;font-size:15px;overflow:hidden;}
.comiis_mh_txtlist_bk li:first-child {border-top:none !important;}
.comiis_mh_txtlist_bk li a {display:block;}
.comiis_mh_txtlist_bk li span {font-size:13px;padding-left:8px;}
</style>
<div class="comiis_mh_txtlist_bk cl">
<ul>
    <li class="b_t"><a href="forum.php?mod=viewthread&tid=22" title="中国生物新冠疫苗很可能年底上市，两针肯定比 1000 元低"><span class="f_d y">08-24</span><font class="f_0">新鲜事 |</font> 中国生物新冠疫苗很可能年底上市，两针肯定</a></li>
<li class="b_t"><a href="forum.php?mod=viewthread&tid=21" title="随手拍"><span class="f_d y">05-11</span><font class="f_0">活动通知 |</font> 随手拍</a></li>
<li class="b_t"><a href="forum.php?mod=viewthread&tid=20" title="2020年5月11日签到记录贴"><span class="f_d y">05-11</span><font class="f_0">新鲜事 |</font> 2020年5月11日签到记录贴</a></li>
<li class="b_t"><a href="forum.php?mod=viewthread&tid=19" title="2020年5月10日签到记录贴"><span class="f_d y">05-10</span><font class="f_0">新鲜事 |</font> 2020年5月10日签到记录贴</a></li>
<li class="b_t"><a href="forum.php?mod=viewthread&tid=18" title="2020年5月9日签到记录贴"><span class="f_d y">05-09</span><font class="f_0">新鲜事 |</font> 2020年5月9日签到记录贴</a></li>
</ul>
</div></div><div id="comiis_app_block_17" class="bg_f mt10 b_t b_b cl"><style>
.comiis_mh_tit {overflow:hidden;position:relative;}
.comiis_mh_tit_more {position:absolute;right:12px;top:8px;width:16px;height:22px;z-index:50;overflow:hidden;}
.comiis_mh_tit .mh_tit_morea {display:block;position:absolute;right:5px;top:8px;width:40px;height:22px;z-index:60;text-indent:-999px;overflow:hidden;}
.comiis_mh_tit h2 {height:18px;line-height:18px;margin:0 12px;padding-top:12px;font-size:16px;font-weight:400;overflow:hidden;}
</style>
<div class="comiis_mh_tit cl">
    <i class="comiis_mhfont comiis_mh_tit_more f_d">&#xe601;</i>
    <a href="#" class="mh_tit_morea">更多</a><h2 class="pb12">排行榜</h2></div></div><div id="comiis_app_block_18" class="bg_f b_b cl"><style>
.comiis_mh_txtlist_phb li {margin:0 12px;height:40px;line-height:40px;font-size:15px;overflow:hidden;}
.comiis_mh_txtlist_phb li:first-child {border-top:none !important;}
.comiis_mh_txtlist_phb li a {display:block;}
.comiis_mh_txtlist_phb li i {font-size:12px;margin-right:4px;}
.comiis_mh_txtlist_phb li span {font-size:13px;padding-left:8px;}
.comiis_mh_txtlist_phb li em {float:left;margin-top:11px;margin-right:8px;font-size:12px;width:18px;height:18px;line-height:18px;text-align:center;border-radius:0 4px 4px 4px;}
.comiis_mh_txtlist_phb li em.ibg01 {background:#FF705E;}
.comiis_mh_txtlist_phb li em.ibg02 {background:#FFB900;}
.comiis_mh_txtlist_phb li em.ibg03 {background:#A8C500;}
</style>
<div class="comiis_mh_txtlist_phb cl">
<ul>
            <li class="b_t"><a href="forum.php?mod=viewthread&tid=2" title="多国对中国提供物资和分享经验表示感谢"><em class="ibg01 f_f">1</em>多国对中国提供物资和分享经验表示感谢</a></li>
    <li class="b_t"><a href="forum.php?mod=viewthread&tid=10" title="社区还有许多功能未完善，下面公告新功能"><em class="ibg02 f_f">2</em>社区还有许多功能未完善，下面公告新功能</a></li>
    <li class="b_t"><a href="forum.php?mod=viewthread&tid=3" title="二手交易版规"><em class="ibg03 f_f">3</em>二手交易版规</a></li>
    <li class="b_t"><a href="forum.php?mod=viewthread&tid=21" title="随手拍"><em class="bg_hs f_f">4</em>随手拍</a></li>
    <li class="b_t"><a href="forum.php?mod=viewthread&tid=6" title="我还是那个少年"><em class="bg_hs f_f">5</em>我还是那个少年</a></li>
    <li class="b_t"><a href="forum.php?mod=viewthread&tid=11" title="学校网站选课登不进去，建议学校优化一下服务器"><em class="bg_hs f_f">6</em>学校网站选课登不进去，建议学校优化一下服务器</a></li>
</ul>
</div></div>