<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{subtemplate home/spacecp_poke_type}-->
<!--{if !$_G[inajax]}-->
    <!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:40px;"><div class="comiis_scrollTop_box"><!--{/if}-->
	<div class="comiis_topnv bg_f b_b">
		<ul class="comiis_flex">
			<li class="flex{if $actives[poke]} f_0{/if}">{if $actives[poke]}<em class="bg_0"></em>{/if}<a href="home.php?mod=spacecp&ac=poke"{if !$actives[poke]} class="f_c"{/if}>{lang poke_received}</a></li>
			<li class="flex{if $actives[send]} f_0{/if}">{if $actives[send]}<em class="bg_0"></em>{/if}<a href="home.php?mod=spacecp&ac=poke&op=send"{if !$actives[send]} class="f_c"{/if}>{lang say_hi}</a></li>
		</ul>
	</div>
	<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
<!--{/if}-->
<!--{if $op == 'send' || $op == 'reply'}-->	
	<form method="post" autocomplete="off" id="pokeform_{$tospace[uid]}" name="pokeform_{$tospace[uid]}" action="home.php?mod=spacecp&ac=poke&op=$op&uid=$tospace[uid]" {if $_G[inajax]}onsubmit="ajaxpost(this.id, 'return_$_GET[handlekey]');"{/if}>
		<input type="hidden" name="referer" value="{echo dreferer()}">
		<input type="hidden" name="pokesubmit" value="true" />
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<input type="hidden" name="from" value="$_GET[from]" />
		<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
		<div class="comiis_wzpost bg_f b_t mt10 cl">
			<!--{if $tospace[uid] != ''}-->
				<li class="comiis_styli comiis_styli_ximg b_b">
					<a href="home.php?mod=space&uid=$tospace[uid]&do=profile"><!--{avatar($tospace[uid],small)}--></a>
					{lang to} <strong class="f_0">{$tospace[username]}</strong> {lang say_hi}:
				</li>
			<!--{else}-->
				<li class="comiis_styli comiis_flex b_b">
					<div class="styli_tit f_c">{lang username}</div>
					<div class="flex"><input type="text" name="username" value="" class="comiis_input" placeholder="({lang required})" /></div>
				</li>
			<!--{/if}-->
			<li class="comiis_styli comiis_input_style b_b cl">
			<!--{loop $icons $k $v}-->				
				<input type="radio" name="iconid" id="poke_$k" value="{$k}" {if $k==3}checked="checked"{/if} />
				<label for="poke_$k" class="kmsxp"><i class="comiis_font"></i>{$v}</label>				
			<!--{/loop}-->
			</li>
			<li class="comiis_stylitit b_b bg_e f_c">{lang max_text_poke_message}</li>	
			<li class="comiis_styli b_b">
				<input type="text" name="note" id="note" value="" class="comiis_input" placeholder="{$comiis_lang['tip14']}" />
			</li>
		</div>
		<div class="comiis_btnbox">
			<button type="submit" name="pokesubmit_btn" id="pokesubmit_btn" value="true" class="comiis_btn bg_c f_f">{lang send}</button>
		</div>
	</form>
<!--{else}-->
	<!--{if $list}-->
	<div class="comiis_friend mt12 bg_f b_t b_b cl">
		<ul>
			<!--{loop $list $key $value}-->
			<li id="comiis_friendbox_81" class="b_t cl">
				<div class="tx_img"><a href="home.php?mod=space&uid=$value[uid]&do=profile"><!--{avatar($value[uid],middle)}--></a></div>
				<h2>
					<span class="y f_d"><!--{date($value[dateline], 'n-j H:i')}--></span>
					<a href="home.php?mod=space&uid=$value[fromuid]&do=profile" class="xi2">{$value[fromusername]}</a>{$comiis_lang['post39']} <!--{if $value[iconid]}-->{$icons[$value[iconid]]}<!--{else}-->{lang say_hi}<!--{/if}--><!--{if $value[note]}-->, {lang say}: <!--{/if}-->
				</h2>
				<div class="friend_txt f_c"><!--{if $value[note]}-->$value[note]<!--{/if}--></div>
				<div class="friend_gl">											
					<a href="home.php?mod=spacecp&ac=poke&op=reply&uid=$value[uid]&handlekey=pokereply" id="a_p_r_$value[uid]" class="b_ok f_c">{lang back_to_say_hello}</a>
					<a href="home.php?mod=spacecp&ac=poke&op=ignore&uid=$value[uid]&handlekey=pokeignore" id="a_p_i_$value[uid]" class="dialog b_ok f_c">{lang ignore}</a>
					<!--{if !$value['isfriend']}--><a href="home.php?mod=spacecp&ac=friend&op=add&uid=$value[uid]&handlekey=addfriendhk_{$value[uid]}" id="a_friend_$value[uid]" class="dialog b_ok f_c">{lang add_friend}</a><!--{/if}-->
				</div>
			</li>
			<!--{/loop}-->	
		</ul>
	</div>
<!--{if $multi}--><div class="b_t cl">$multi</div><!--{/if}-->
	<!--{else}-->
		<div class="comiis_notip comiis_sofa bg_f b_t b_b mt10 cl">
			<i class="comiis_font f_e cl">&#xe613;</i>
			<span class="f_d">{lang no_new_poke}</span>
		</div>
	<!--{/if}-->
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->