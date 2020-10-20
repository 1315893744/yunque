<?PHP exit('Access Denied');?>
<!--{eval $comiis_bg = 1}-->
<!--{template common/header}-->
<!--{if $type != 'countitem'}-->
<div class="comiis_topsearch bg_e b_b cl vzyj">	  
    <div id="comiis_search_noe"><a href="javascript:comiis_search_show(1);" class="ssbox ssct b_ok bg_f f_d"><i class="comiis_font f_d">&#xe622;</i> $comiis_group_lang['024']</a></div>
    <div id="comiis_search_two" style="display:none">            
        <form method="post" action="misc.php?mod=tag&type=thread">
            <input type="hidden" name="searchsubmit" value="yes">
            <ul class="comiis_flex">
            <input type="text" name="name" placeholder="{lang enter_content}..." class="ssbox b_ok bg_f f_d flex" />
            <a href="javascript:comiis_search_show(0);" class="ssclose bg_f f_e"><i class="comiis_font">&#xe647;</i></a>
            <button type="submit" value="true" class="ssbtn bg_c f_f">{$comiis_lang['tip129']}</button>
            </ul>			
        </form>
    </div>
</div>	
<script>
function comiis_search_show(a){
    if(a == 1){
        $('#comiis_search_noe').hide();
        $('#comiis_search_two').show()
        $('#scform_srchtxt').focus();
    }else{
        $('#comiis_search_two').hide();
        $('#comiis_search_noe').show();
    }
}
</script>
<!--{if $comiis_app_switch['comiis_tagtimgs']}-->$comiis_app_switch['comiis_tagtimgs']<!--{/if}-->
<div class="comiis_tagtit b_b f_c">{$comiis_lang['tip313']}</div>
<div class="comiis_search_hot cl">
<!--{if $tagarray}-->
	<!--{eval $color = array(' ', 'color1', 'color2', 'color3', 'color4', 'color5');}-->
	<div class="comiis_search_hot_a cl">	
	<!--{loop $tagarray $tag}-->
		<a href="misc.php?mod=tag&id=$tag[tagid]&type=thread" title="$tag[tagname]" class="comiis_xifont {echo $color[array_rand($color,1)];}"><span class="f_b">$tag[tagname]</span></a>
	<!--{/loop}-->
	</div>
<!--{else}-->
	<div class="comiis_notip cl">
		<i class="comiis_font f_e cl">&#xe613;</i>
		<span class="f_d">{lang no_tag}</span>
	</div>
<!--{/if}-->	
</div>
<!--{else}-->
$num
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->