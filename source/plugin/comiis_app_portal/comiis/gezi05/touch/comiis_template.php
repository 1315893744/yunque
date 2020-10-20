<?PHP exit('Access Denied');?>
<style>
.comiis_mhico {padding-bottom:15px;overflow:hidden;position:relative;}
.comiis_mhico_roll {position:absolute;left:0;bottom:0;margin-bottom:6px;height:18px;width:100%;text-align:center;color:#fff;z-index:9;overflow:hidden;}
.comiis_mhico_roll .swiper-pagination-bullet {display:inline-block;width:4px;height:4px;margin:0 2px;background-color:rgba(0, 0, 0, 0.2);border-radius:6px;}
.comiis_mhico_roll .swiper-pagination-bullet-active {background-color:#f90;width:10px;}
.comiis_mh_hdico5 {width:100%;padding:5px 6px;border-collapse:inherit;box-sizing:border-box;overflow:hidden;}
.comiis_mh_hdico5 li {float:left;text-align:center;width:20%;box-sizing:border-box;}
.comiis_mh_hdico5 li a {display:block;padding:8px 10px 6px;}
.comiis_mh_hdico5 li img {width:46px;height:46px;margin-bottom:8px;border-radius:3px;}
.comiis_mh_hdico5 li p {height:14px;line-height:14px;}
</style>
<div class="comiis_mhico comiis_mhico{$data['id']}">
	<ul class="swiper-wrapper">
        {$comiis['summary']}
	</ul>
	<div class="comiis_mhico_roll comiis_mhico_roll{$data['id']}"></div>
</div>
<script>
	comiis_app_portal_swiper('.comiis_mhico{$data['id']}', {
        pagination: '.comiis_mhico_roll{$data['id']}',
        autoplayDisableOnInteraction: false,
		onTouchMove: function(swiper){
			Comiis_Touch_on = 0;
		},
		onTouchEnd: function(swiper){
			Comiis_Touch_on = 1;
		},
	});
</script>