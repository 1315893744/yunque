<?PHP exit('Access Denied');?>
<style>
.comiis_mh_tip01 {position:fixed;top:0px;background:rgba(0,0,0,0.8);width:100%;height:50px;padding:5px 0;color:#fff !important;z-index:1000;}
.comiis_mh_tip01 a {color:#fff !important;}
.comiis_mh_tip01 .wx_btn_bg {height:30px;line-height:30px;margin-top:10px;margin-right:13px;padding:0 12px;font-size:14px;border-radius:2px;}
.comiis_mh_tip01 .kmico {float:left;width:38px;height:38px;margin:6px 8px 0 0;border-radius:4px;}
.comiis_mh_tip01 h2 {margin-top:6px;height:20px;line-height:20px;font-size:16px;font-weight:100;overflow:hidden;}
.comiis_mh_tip01 p {font-size:12px;height:20px;line-height:20px;filter:alpha(opacity=60);-moz-opacity:0.6;-khtml-opacity:0.6;opacity:0.6;overflow:hidden;}
.comiis_mh_tip01 .gzgzh_ico {float:left;width:18px;height:18px;line-height:18px;font-size:18px;padding:12px;margin-top:2px;overflow:hidden;}
</style>
<div class="comiis_mh_tip01" id="comiis_mh_tip01_{$data['id']}" style="display:none;">
    {$comiis['summary']}
</div>
<script>
var comiis_mh_gzwx = $("#comiis_mh_tip01_{$data['id']}");
if (!getcookie("comiis_tip01hide_{$data['id']}")) {
	comiis_mh_gzwx.slideDown(400);
	$("#comiis_mh_tip01_{$data['id']} .gzgzh_ico").click(function () {
		comiis_mh_gzwx.fadeOut(400);
		setcookie("comiis_tip01hide_{$data['id']}", 1, "43200");
	});
}
</script>