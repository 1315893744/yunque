<?PHP exit('Access Denied');?>
<!--{block return}-->
<link rel="stylesheet" href="./source/plugin/comiis_poster/image/comiis.css" type="text/css" media="all">
<script src="./source/plugin/comiis_poster/image/html2canvas.min.js" type="text/javascript"></script>
<style>
.comiis_poster_fdico{{if $comiis_poster['point'] == 1}top:{$comiis_poster['tbnum']}px; right:{$comiis_poster['lrnum']}px;{elseif $comiis_poster['point'] == 2}top:{$comiis_poster['tbnum']}px; left:{$comiis_poster['lrnum']}px;{elseif $comiis_poster['point'] == 3}bottom:{$comiis_poster['tbnum']}px; left:{$comiis_poster['lrnum']}px;{else}bottom:{$comiis_poster['tbnum']}px; right:{$comiis_poster['lrnum']}px;{/if}}
.comiis_poster_a,.comiis_footer_scroll a.comiis_poster_a{background:{eval $color = comiis_poster_hex2rgba($comiis_poster['bgcolor']);}{$color};color:{$comiis_poster['color']};}
.comiis_poster_a span,.comiis_poster_a i{color:{$comiis_poster['color']};}
</style>
<!--{if $comiis_poster['showstyle'] == 0}-->
	<div class="comiis_poster_fdico">
		<a href="javascript:;" class="comiis_poster_a"><img src="./source/plugin/comiis_poster/image/comiis_poster_fdico.png" class="vm"><span>{$comiis_poster['name']}</span></a>
	</div>
<!--{/if}-->
<script>
var comiis_poster_start_ynho = 0;
var comiis_poster_time_gior;
$(document).ready(function(){
	<!--{if $comiis_poster['showstyle'] == 1 || $comiis_poster['showstyle'] == 3 || $comiis_poster['showstyle'] == 5}-->
		$(".comiis_footer_scroll:last").append('<a href="javascript:;" class="comiis_poster_a"><i class="comiis_font">&#xe663</i><span><em>{$comiis_poster['name']}</em></span></a>');
	<!--{/if}-->
	$(document).on('click', '.comiis_poster_a', function(e) {
		show_comiis_poster_fygl();
	});
});
function comiis_poster_ydbs(){
	setTimeout(function(){
		html2canvas(document.querySelector(".comiis_poster_box_img"), {scale:2}).then(canvas => {
			var img = canvas.toDataURL("image/jpeg", .9);
			document.getElementById('comiis_poster_images').src = img;
			$('.comiis_poster_load').hide();
			$('.comiis_poster_imgshow').show();
		});
	}, 100);
}
function show_comiis_poster_fygl(){
	if(comiis_poster_start_ynho == 0){
		comiis_poster_start_ynho = 1;
		popup.open('<img src="' + IMGDIR + '/imageloading.gif" class="comiis_loading">');
		$.ajax({
			type:'GET',
			url: window.location.href + (window.location.href.indexOf("?") != -1 ? '&' : '?') + 'comiis_poster=yes&inajax=1',
			dataType : 'xml',
		})
		.success(function(s) {
			var data_mtuu = s.lastChild.firstChild.nodeValue;
			if(data_mtuu.indexOf("comiis_poster") >= 0){
				comiis_poster_time_vwib = setTimeout(function(){
					comiis_poster_ydbs();
				}, 5000);			
				$('body').append(data_mtuu);
				$('#comiis_poster_image').load(function(){
					clearTimeout(comiis_poster_time_vwib);
					comiis_poster_ydbs();
				});
				popup.close();
				setTimeout(function() {
					$('.comiis_poster_box').addClass("comiis_poster_box_show");
					$('.comiis_poster_closekey').off().on('click', function(e) {
						$('.comiis_poster_box').removeClass("comiis_poster_box_show").on('webkitTransitionEnd transitionend', function() {
							$('#comiis_poster_box').remove();
							comiis_poster_start_ynho = 0;
						});;
						return false;
					});
				}, 60);
			}
		});
	}
}
<!--{if $comiis_poster['showstyle'] == 2 || $comiis_poster['showstyle'] == 3 || $comiis_poster['showstyle'] == 4 || $comiis_poster['showstyle'] == 5}-->
var new_comiis_user_share, is_comiis_user_share = 0;
<!--{if $comiis_poster['showstyle'] == 4 || $comiis_poster['showstyle'] == 5}-->
var as = navigator.appVersion.toLowerCase(), isqws = 0;
if (as.match(/MicroMessenger/i) == "micromessenger" || as.match(/qq\//i) == "qq/") {
	isqws = 1;
}
if(isqws == 1){
<!--{/if}-->
	if(typeof comiis_user_share === 'function'){
		new_comiis_user_share = comiis_user_share;
		is_comiis_user_share = 1;
	}
	var comiis_user_share = function(){
		if(is_comiis_user_share == 1){
			isusershare = 0;
			new_comiis_user_share();
			if(isusershare == 1){
				return false;
			}
		}
		isusershare = 1;
		show_comiis_poster_fygl();
		return false;
	}
<!--{if $comiis_poster['showstyle'] == 4 || $comiis_poster['showstyle'] == 5}-->
}
<!--{/if}-->	
<!--{/if}-->
</script>
<!--{/block}-->