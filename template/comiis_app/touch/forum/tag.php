<?PHP exit('Access Denied');?>
<!--{eval $comiis_bg = 1;}-->
<!--{template common/header}-->
<!--{if $op == 'manage'}-->
<div class="comiis_tip comiis_input_style bg_f cl">
	<div class="tip_tit bg_e mb5 f_b b_b">{lang post_tag}</div>
	<dt class="kmlabs sdxt">
		<p class="f_c" style="font-size:14px;">{lang posttag_comment}</p>
		<input type="hidden" name="tid" id="tid" value="$_GET[tid]" />	
		<input type="text" name="tags" id="tags" class="comiis_px kmshow bg_e b_ok mb5" value="$tags" />	
		<!--{if $recent_use_tag}-->
		<p style="font-size:14px;"><span class="f_c">{lang recent_use_tag}<br></span>
			<!--{eval $tagi = 0;}-->
			<!--{loop $recent_use_tag $var}-->
				<!--{if $tagi}--><span class="f_c">, </span><!--{/if}--><a href="javascript:;" class="f_ok" onclick="document.getElementById('tags').value == '' ? document.getElementById('tags').value += '$var' : document.getElementById('tags').value += ',$var';">$var</a>
				<!--{eval $tagi++;}-->
			<!--{/loop}-->
		</p>
		<!--{/if}-->
	</dt>
	<dd class="b_t cl">
        <!--{if $comiis_app_switch['comiis_post_btnwz'] == 1}-->
            <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b">{lang cancel}</a>
            <button type="submit" name="modsubmit" id="modsubmit" value="{lang confirms}" onclick="tagset();" class="tip_btn bg_f f_0"><span class="tip_lx">{lang confirms}</span></button>	
        <!--{else}-->
            <button type="submit" name="modsubmit" id="modsubmit" value="{lang confirms}" onclick="tagset();" class="tip_btn bg_f f_0">{lang confirms}</button>	
            <a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang cancel}</span></a>
        <!--{/if}-->	
	</dd>
</div>
<script type="text/javascript">
	function tagset() {
		var tags = document.getElementById('tags').value;
		var tid = document.getElementById('tid').value;
		var url = 'forum.php?mod=tag&op=set&inajax=1&tid='+tid+'&formhash={FORMHASH}';
		$.ajax({
			type:'POST',
			url: url,
			data: "tags=" + tags,
			dataType:'xml',
		}).success(function(s) {
			popup.open('{$comiis_lang['tip68']}', 'alert');
			comiis_break();
		});		
	}
</script>
<!--{else}-->
	<div class="comiis_jump">
		<h2>{lang notice}</h2>
		<p class="f_b">{lang admin_threadtopicadmin_error}</p>
		<p><a href="javascript:history.back();" class="bg_0 f_f">{lang goback}</a></p>
	</div>
<!--{/if}-->
<!--{template common/footer}-->