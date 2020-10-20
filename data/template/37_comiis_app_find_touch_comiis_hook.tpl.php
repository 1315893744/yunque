<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?><?php
$return = <<<EOF

<link rel="stylesheet" href="source/plugin/comiis_app_find/style/comiis.css" type="text/css" media="all">

EOF;
 if($_G['cache']['plugin']['comiis_app_find']['comiis_app_find_css'] || $comiis_app_find['comiis_app_find_index'] == 1) { 
$return .= <<<EOF

<style>

EOF;
 if($_G['cache']['plugin']['comiis_app_find']['comiis_app_find_css']) { echo strip_tags($_G['cache']['plugin']['comiis_app_find']['comiis_app_find_css']);; } if($comiis_app_find['comiis_app_find_index'] == 1) { 
$return .= <<<EOF

.comiis_fx_homeico {margin-bottom:10px;}

EOF;
 } 
$return .= <<<EOF

</style>

EOF;
 } if($comiis_app_find['comiis_app_find_style'] == 1) { 
$return .= <<<EOF

<div class="comiis_fx_homeico iksh comiis_fx_homeicos fxbg_f fxb_b bg_f
EOF;
 if($comiis_app_find['comiis_app_find_index'] == 1) { 
$return .= <<<EOF
 fxb_t b_t
EOF;
 } 
$return .= <<<EOF
 b_b cl">

EOF;
 if($comiis_app_find['comiis_app_find_title_open']) { 
$return .= <<<EOF
<h2 class="fxbg_f fxb_b bg_f b_b"><span class="fxf_c f_c"><a href="plugin.php?id=comiis_app_find">More...</a></span>{$comiis_app_find['comiis_app_find_title']}</h2>
EOF;
 } 
$return .= <<<EOF

<div id="comiis_fx_homeicosoohp">
<ul class="swiper-wrapper xaqr">
EOF;
 if(is_array($comiis_app_find_data)) foreach($comiis_app_find_data as $temp) { if($temp['show'] == 1 && $temp['cid']) { 
$return .= <<<EOF

<li class="swiper-slide gmud"><a href="{$temp['url']}" title="{$temp['name']}"><img class="vm" src="source/plugin/comiis_app_find/ico/
EOF;
 if($temp['icon']) { 
$return .= <<<EOF
{$temp['icon']}
EOF;
 } else { 
$return .= <<<EOF
noicon.png
EOF;
 } 
$return .= <<<EOF
"><p>{$temp['name']}</p></a></li>

EOF;
 } } 
$return .= <<<EOF

</ul>
</div>
</div>

EOF;
 } elseif($comiis_app_find['comiis_app_find_style'] == 2) { 
$return .= <<<EOF

<div class="comiis_fx_homeico iksh fxbg_f fxb_b bg_f
EOF;
 if($comiis_app_find['comiis_app_find_index'] == 1) { 
$return .= <<<EOF
 fxb_t b_t
EOF;
 } 
$return .= <<<EOF
 b_b cl">

EOF;
 if($comiis_app_find['comiis_app_find_title_open']) { 
$return .= <<<EOF
<h2 class="fxbg_f fxb_b bg_f b_b"><span class="fxf_c f_c"><a href="plugin.php?id=comiis_app_find">More...</a></span>{$comiis_app_find['comiis_app_find_title']}</h2>
EOF;
 } 
$return .= <<<EOF

<div id="comiis_fx_homeicosoohp">
<div class="swiper-wrapper xaqr">
<ul class="swiper-slide">
<ul class="comiis_fx_two">
EOF;
 $comiis_app_find_nn = $comiis_app_find_nns = 0;
$return .= <<<EOF

EOF;
 if(is_array($comiis_app_find_data)) foreach($comiis_app_find_data as $temp) { if($temp['show'] == 1 && $temp['cid']) { $comiis_app_find_nn++;$comiis_app_find_nns++;
$return .= <<<EOF

EOF;
 if($comiis_app_find_nns > 8) { $comiis_app_find_nns = 1;$comiis_app_find_nn = 1;
$return .= <<<EOF
</ul></ul><ul class="swiper-slide"><ul class="comiis_fx_two">

EOF;
 } if($comiis_app_find_nn > 2) { $comiis_app_find_nn = 1;
$return .= <<<EOF
</ul><ul class="comiis_fx_two">

EOF;
 } 
$return .= <<<EOF

<li class="gmud"><a href="{$temp['url']}" title="{$temp['name']}"><img class="vm" src="source/plugin/comiis_app_find/ico/
EOF;
 if($temp['icon']) { 
$return .= <<<EOF
{$temp['icon']}
EOF;
 } else { 
$return .= <<<EOF
noicon.png
EOF;
 } 
$return .= <<<EOF
"><p>{$temp['name']}</p></a></li>

EOF;
 } } 
$return .= <<<EOF

</ul>
</ul>
</div>
</div>
<div class="comiis_fx_roll cl"></div>
</div>

EOF;
 } 
$return .= <<<EOF

<script>
if(typeof(Swiper) == 'undefined') {
$.getScript("./source/plugin/comiis_app_find/style/comiis_swiper.min.js").done(function(){
comiis_app_find_swiperfuii();
});
}else{
comiis_app_find_swiperfuii();
}
function comiis_app_find_swiperfuii(){
var comiis_find_mySwiper = new Swiper('#comiis_fx_homeicosoohp', {
slidesPerView : 'auto',

EOF;
 if($comiis_app_find['comiis_app_find_style'] == 1) { 
$return .= <<<EOF

slidesPerView: 5,

EOF;
 } elseif($comiis_app_find['comiis_app_find_style'] == 2) { 
$return .= <<<EOF

        pagination: '.comiis_fx_roll',

EOF;
 } 
$return .= <<<EOF

onTouchMove: function(swiper){
Comiis_Touch_on = 0;
},
onTouchEnd: function(swiper){
Comiis_Touch_on = 1;
},
});
}
</script>

EOF;
?>