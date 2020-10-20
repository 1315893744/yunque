<?PHP exit('Access Denied');?>
<!--{if !$tagname}--><!--{eval $comiis_bg = 1}--><!--{/if}-->
<!--{template common/header}-->
<!--{if $tagname}-->
<!--{if !$_GET['inajax']}-->
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:40px;"><div class="comiis_scrollTop_box"><!--{/if}-->
<div class="comiis_topnv bg_f b_b">
	<ul class="comiis_flex">
	<!--{if empty($showtype) && $bloglist && $threadlist}-->
		<li class="flex{if empty($showtype)} f_0{/if}">{if empty($showtype)}<em class="bg_0"></em>{/if}<a href="misc.php?mod=tag&id=$id"{if !empty($showtype)} class="f_c"{/if}>{lang all}</a></li>
	<!--{/if}-->
		<li class="flex{if $showtype == 'thread'} f_0{/if}">{if $showtype == 'thread'}<em class="bg_0"></em>{/if}<a href="misc.php?mod=tag&id=$id&type=thread"{if empty($showtype) || $showtype == 'thread'}{else} class="f_c"{/if}>{lang related_thread}</a></li>
		<li class="flex{if helper_access::check_module('blog') && $showtype == 'blog'} f_0{/if}">{if helper_access::check_module('blog') && $showtype == 'blog'}<em class="bg_0"></em>{/if}<a href="misc.php?mod=tag&id=$id&type=blog"{if helper_access::check_module('blog') && (empty($showtype) || $showtype == 'blog')}{else} class="f_c"{/if}>{lang related_blog}</a></li>
	</ul>
</div>
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
<!--{/if}-->
<!--{eval comiis_load('ySY1Zq0eDE1n9rfOd2', 'showtype,threadlist,id,count,tpp,multipage,page,comiis_page,comiis_app_list_num,bloglist');}-->
<!--{else}-->
<div class="comiis_topsearch bg_e b_b cl vzyj">	  
    <div id="comiis_search_noe"><a href="javascript:comiis_search_show(1);" class="ssbox ssct b_ok bg_f f_d"><i class="comiis_font f_d">&#xe622;</i> $comiis_group_lang['024']</a></div>
    <div id="comiis_search_two" style="display:none">            
        <form method="post" action="misc.php?mod=tag&type=thread">
            <ul class="comiis_flex">
            <input type="text" name="name" placeholder="{lang enter_content}..." class="ssbox b_ok bg_f f_d flex" value="$searchtagname" />
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
<!--{if $searchtagname}-->
comiis_search_show(1);
<!--{/if}-->
</script>
<div class="comiis_notip mt15 cl">
	<i class="comiis_font f_e cl">&#xe613;</i>
	{$comiis_lang['empty_tags']}
</div>
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->