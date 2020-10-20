<?PHP exit('Access Denied');?>
<input type="hidden" name="polls" value="yes" />
<input type="hidden" name="fid" value="$_G[fid]" />
<!--{if $_GET[action] == 'newthread'}-->
	<input type="hidden" name="tpolloption" value="1" />
	<!--{eval comiis_load('TkGSNnV5p8V124KY1Y', '');}-->	
<!--{else}-->
	<!--{eval comiis_load('rCLCElzuEuV8uqyhvp', 'poll');}-->
<!--{/if}-->
	<li class="styli_h bg_e b_b"></li>
	<li class="comiis_styli comiis_flex b_b">
		<div class="styli_tit f_c">{lang post_poll_allowmultiple}</div>
		<div class="flex"><input type="text" name="maxchoices" id="maxchoices" class="comiis_input f_a kmshow" value="{if $_GET[action] == 'edit' && $poll[maxchoices]}$poll[maxchoices]{else}1{/if}" /></div>
		<div class="styli_r">{lang post_option}</div>
	</li>
	<li class="comiis_styli comiis_flex b_b">
		<div class="styli_tit f_c">{lang post_poll_expiration}</div>
		<div class="flex"><input type="text" name="expiration" id="polldatas" class="comiis_input f_a kmshow" value="{if $_GET[action] == 'edit'}{if !$poll[expiration]}0{elseif $poll[expiration] < 0}{lang poll_close}{elseif $poll[expiration] < TIMESTAMP}{lang poll_finish}{else}{echo (round(($poll[expiration] - TIMESTAMP) / 86400))}{/if}{/if}" /></div>
		<div class="styli_r">{lang days}</div>
	</li>
	<li class="comiis_styli comiis_flex b_b f_c">
		<div class="flex f_c">{lang poll_after_result}</div>
		<div class="styli_r">
			<input type="checkbox" name="visibilitypoll" id="visibilitypoll" value="1" class="comiis_checkbox_key"{if $_GET[action] == 'edit' && !$poll[visible]} checked{/if} />
			<label for="visibilitypoll" class="wauto"><code class="bg_f b_ok comiis_checkbox comiis_checkbox_close"></code></label>
		</div>		
	</li>
	<li class="comiis_styli comiis_flex b_b f_c">
		<div class="flex f_c">{lang post_poll_overt}</div>
		<div class="styli_r">
			<input type="checkbox" name="overt" id="overt" value="1" class="comiis_checkbox_key"{if $_GET[action] == 'edit' && $poll[overt]} checked{/if} />
			<label for="overt" class="wauto"><code class="bg_f b_ok comiis_checkbox comiis_checkbox_close"></code></label>
		</div>		
	</li>
<!--{hook/post_poll_extra}-->
<script type="text/javascript" reload="1">
var maxoptions = parseInt('$_G[setting][maxpolloptions]');
<!--{if $_GET[action] == 'newthread'}-->
	var curoptions = 0;
	var curnumber = 1;
	addpolloption();
	addpolloption();
	addpolloption();
<!--{else}-->
	var curnumber = curoptions = <!--{echo count($poll['polloption'])}-->;
<!--{/if}-->
function comiis_shpicbox(a) {
	var obj = $('#comiis_newpicbox' + a);
	var dis = obj.css("display");
	$('.tebie_poll_img').css("display", "none");
	if(dis == "none"){ 
		obj.css("display", "block"); 
	}else{ 
		obj.css("display", "none"); 
	} 
}
function addpolloption() {
	if(curoptions < maxoptions) {
		$('.comiis_polloption_add').append($('#comiis_polloption_new').html().replace(/_comiis_id_/g, curnumber).replace('_comiis_name_', 'polloption'));
		curoptions++;
		curnumber++;
	} else {
		popup.open('{$comiis_lang['post9']}'+maxoptions + '!', 'alert');
	}
}
function delpolloption(obj) {
	obj.parentNode.parentNode.parentNode.removeChild(obj.parentNode.parentNode);
	curoptions--;
}
function switchpollm(swt) {
	t = document.getElementById('pollchecked').checked && swt ? 2 : 1;
	var v = '', q = 0;
	for(var i = 0; i < document.getElementById('postform').elements.length; i++) {
		var e = document.getElementById('postform').elements[i];
		if(!isUndefined(e.name)) {
			if(e.name.match('^polloption')) {
				if(t == 2 && e.tagName == 'INPUT' && e.value) {
					v += (q > 0 ? "\n" : '') + e.value;
					q++;
				} else if(t == 1 && e.tagName == 'TEXTAREA' && e.value) {
					v += e.value;
				}
			}
		}
	}
	if(t == 1) {
		var a = v.split('\n');
		var pcount = 0;
		for(var i = 0; i < document.getElementById('postform').elements.length; i++) {
			var e = document.getElementById('postform').elements[i];
			if(!isUndefined(e.name)) {
				if(e.name.match('^polloption')) {
					pcount++;
					if(e.tagName == 'INPUT') e.value = '';
				}
			}
		}
		for(var i = 0; i < a.length - pcount + 1; i++) {
			addpolloption();
		}
		var ii = 0;
		for(var i = 0; i < document.getElementById('postform').elements.length; i++) {
			var e = document.getElementById('postform').elements[i];
			if(!isUndefined(e.name)) {
				if(e.name.match('^polloption') && e.tagName == 'INPUT' && a[ii]) {
					e.value = a[ii++];
				}
			}
		}
	} else if(t == 2) {
		document.getElementById('postform').polloptions.value = trim(v);
	}
	document.getElementById('postform').tpolloption.value = t;
	if(swt) {
		display('pollm_c_1');
		display('pollm_c_2');
	}
}
function trim(str) {
	return str.replace(/^\s*(.*?)[\s\n]*$/g, '$1');
}
function display(id) {
	var obj = document.getElementById(id);
	if(obj.style.visibility) {
		obj.style.visibility = obj.style.visibility == 'visible' ? 'hidden' : 'visible';
	} else {
		obj.style.display = obj.style.display == '' ? 'none' : '';
	}
}
	$(document).on('change', '.comiis_file_key', function() {
			var upkey_id = $(this).attr('comiis_index');
			var comiis_input = $(this).attr('comiis_input');
			popup.open('<img src="' + IMGDIR + '/imageloading.gif" class="comiis_loading">');
			uploadsuccess = function(data) {
				if(data == '') {
					popup.open('{lang uploadpicfailed}', 'alert');
				}
				var comiis_redata = eval("("+data+")");
				if(comiis_redata.errorcode == 0 && comiis_redata.aid) {
					popup.close();
					$('#comiis_newpicbox' + upkey_id).html('<img src="' + comiis_redata.bigimg + '" width="100%"><input type="hidden" name="pollimage[]" value="' + comiis_redata.aid + '">');
					$('#comiis_showpic' + upkey_id).css('display','');
				} else {
					popup.open(STATUSMSG[comiis_redata.errorcode], 'alert');
				}
			};
			if(typeof FileReader != 'undefined' && this.files[0]) {
				
				$.buildfileupload({
					uploadurl:'misc.php?mod=swfupload&action=swfupload&operation=poll&fid={$_G[fid]}',
					files:this.files,
					uploadformdata:{uid:"$_G[uid]", hash:"<!--{eval echo md5(substr(md5($_G[config][security][authkey]), 8).$_G[uid])}-->"},
					uploadinputname:'Filedata',
					maxfilesize:"$swfconfig[max]",
					success:uploadsuccess,
					error:function() {
						popup.open('{lang uploadpicfailed}', 'alert');
					}
				});
			} else {
				$.ajaxfileupload({
					url:'misc.php?mod=swfupload&action=swfupload&operation=poll&fid={$_G[fid]}',
					data:{uid:"$_G[uid]", hash:"<!--{eval echo md5(substr(md5($_G[config][security][authkey]), 8).$_G[uid])}-->"},
					dataType:'text',
					fileElementId:'filedata',
					success:uploadsuccess,
					error: function() {
						popup.open('{lang uploadpicfailed}', 'alert');
					}
				});
			}
	});
</script>