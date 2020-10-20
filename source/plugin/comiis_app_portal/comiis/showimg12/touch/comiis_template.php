<?PHP exit('Access Denied');?>
<style>
.comiis_showimg12 {display:none;position:fixed;top:-100%;left:0;z-index:200}
.comiis_showimg12 span {position:absolute;right:0;top:-35px;width:26px;height:26px;line-height:26px;text-align:center;background:rgba(0, 0, 0, 0.6);box-shadow:0 0 3px #888;border-radius:50%;}
.comiis_showimg12 span i {font-size:12px;}
.comiis_showimg12 img {box-shadow:0 0 5px #888;border-radius:4px;width:260px;}
</style>
<div class="comiis_showimg12 comiis_showimg12_{$data['id']}">
    <span class="f_f"><i class="comiis_mhfont">&#xe639;</i></span>
    {$comiis['summary']}
</div>
<script>
	$(document).ready(function() {
		if (getcookie('comiis_showimg12_{$data['id']}') != 1) {
			var comiis_showimg12_{$data['id']}_id = $('.comiis_showimg12_{$data['id']}');
			comiis_showimg12_{$data['id']}_id.css({'left' : (($(window).width() - comiis_showimg12_{$data['id']}_id.outerWidth()) / 2), 'display' : 'block'}).animate({"top" : (($(window).height() - comiis_showimg12_{$data['id']}_id.outerHeight()) / 2)}, 800);
			$('.comiis_showimg12_{$data['id']} i.comiis_mhfont').click(function(){
				comiis_showimg12_{$data['id']}_id.fadeOut(400);
				setcookie('comiis_showimg12_{$data['id']}', '1', comiis_showimg12_time, '', '', '');
			});
			
		}
	});
</script>
