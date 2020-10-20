<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<style>
.comiis_mhswfa {background:#000;overflow:hidden;position:relative;}
.comiis_mhswfa .swiper-slide span {position:absolute;left:0;bottom:36px;float:left;color:#fff;width:auto;padding:2px 10px;font-size:14px;max-height:60px;line-height:30px;background:rgba(0,0,0,0.7);overflow:hidden;}
.comiis_mhswfa_roll {position:absolute;left:0;bottom:0;margin-bottom:18px;height:18px;width:100%;text-align:center;color:#fff;z-index:9;overflow:hidden;}
.comiis_mhswfa_roll .swiper-pagination-bullet {display:inline-block;width:4px;height:4px;margin:0 2px;background-color:rgba(0, 0, 0, 0.35);border-radius:6px;}
.comiis_mhswfa_roll .swiper-pagination-bullet-active {background-color:#fff;width:10px;}
</style>
<div class="comiis_mhswfa comiis_mhswfa<?php echo $data['id'];?>">
<ul class="swiper-wrapper">
    <?php if(is_array($comiis['itemlist'])) foreach($comiis['itemlist'] as $temp) { ?><li class="swiper-slide">
            <a href="<?php echo $temp['url'];?>" title="<?php echo $temp['fields']['fulltitle'];?>">
<img <?php if($comiis_app_switch['comiis_loadimg']) { ?>src="./template/comiis_app/pic/none.png" comiis_loadimages=<?php } else { ?>src=<?php } ?>"<?php if($temp['picflag'] == 0) { ?><?php echo $temp['pic'];?><?php } else { if($temp['picflag'] == 2) { ?><?php echo $_G['setting']['ftp']['attachurl'];?><?php } else { ?><?php echo $_G['setting']['attachurl'];?><?php } if($temp['makethumb'] == 1) { ?><?php echo $temp['thumbpath'];?><?php } else { ?><?php echo $temp['pic'];?><?php } } ?>" width="100%" class="vm comiis_mhswfa_whb<?php echo $data['id'];?><?php if($comiis_app_switch['comiis_loadimg']) { ?> comiis_loadimages<?php } ?>" alt="<?php echo $temp['fields']['fulltitle'];?>">
<?php if($comiis['summary'] != 'none') { ?><span><?php echo $temp['title'];?></span><?php } ?>
</a>
</li>
<?php } ?>
</ul>
<div class="comiis_mhswfa_roll comiis_mhswfa_roll<?php echo $data['id'];?>"></div>
<div class="comiis_svg_box"><div class="comiis_svg_a"></div><div class="comiis_svg_b"></div></div>
</div>
<script>
  $('.comiis_mhswfa_whb<?php echo $data['id'];?>').css('height', ($('.comiis_mhswfa_whb<?php echo $data['id'];?>').width() * <?php echo $comiis['picheight'] / $comiis['picwidth'];; ?>) + 'px');
comiis_app_portal_swiper('.comiis_mhswfa<?php echo $data['id'];?>', {
slidesPerView : 'auto',
        pagination: '.comiis_mhswfa_roll<?php echo $data['id'];?>',
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
</script>