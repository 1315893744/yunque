<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<div class="comiis_tip comiis_tip_form comiis_input_style bg_f cl">
	<form method="post" autocomplete="off" id="postform" action="forum.php?mod=misc&action=debateumpire&tid=$_G[tid]&umpiresubmit=yes&infloat=yes{if !empty($_GET['from'])}&from=$_GET['from']{/if}">
	<input type="hidden" name="formhash" id="formhash" value="{FORMHASH}" />
	<input type="hidden" name="handlekey" value="comiis" />
		<div class="tip_tit bg_e f_b b_b" id="return_$_GET['handlekey']">{lang debate_umpirecomment}</div>
		<dt>						
			<div class="tip_form">
				<li class="comiis_tip_radio f_c cl">
					<span>{lang debate_winner}{$comiis_lang['view32']}: </span>
					<input type="radio" name="winner" value="1" $winnerchecked[1] id="winner1" />
					<label for="winner1"><i class="comiis_font{if $winnerchecked[1]} f_0{else} f_d{/if}"><!--{if $winnerchecked[1]}-->&#xe645;<!--{else}-->&#xe646;<!--{/if}--></i>{lang debate_square}</label>					
					<input type="radio" name="winner" value="3" $winnerchecked[3] id="winner3" />
					<label for="winner3"><i class="comiis_font{if $winnerchecked[3]} f_0{else} f_d{/if}"><!--{if $winnerchecked[3]}-->&#xe645;<!--{else}-->&#xe646;<!--{/if}--></i>{lang debate_draw}</label>	
					<input type="radio" name="winner" value="2" $winnerchecked[2] id="winner2" />
					<label for="winner2"><i class="comiis_font{if $winnerchecked[2]} f_0{else} f_d{/if}"><!--{if $winnerchecked[2]}-->&#xe645;<!--{else}-->&#xe646;<!--{/if}--></i>{lang debate_opponent}</label>
				</li>
				<li class="b_t comiis_login_select cl">
					<span class="inner kmhai">
						<i class="comiis_font f_d">&#xe60c;</i>
						<span class="z">
							<span class="comiis_question f_c" id="comiis_xzbs_name">{$comiis_lang['view33']}{lang debate_bestdebater}</span>
						</span>					
					</span>
					<select onchange="$('#bestdebater').val(this.options[this.options.selectedIndex].value)" id="comiis_xzbs" class="cl">
						<option value=""><strong>{$comiis_lang['view33']}{lang debate_bestdebater}</strong></option>
						<!--{loop $candidates $candidate}-->
							<option value="$candidate[username]"{if $candidate[username] == $debate[bestdebater]} selected="selected"{/if}>$candidate[username] ( $candidate[voters] {lang debate_poll}, <!--{if $candidate[stand] == 1}-->{lang debate_square}<!--{elseif $candidate[stand] == 2}-->{lang debate_opponent}<!--{/if}-->)</option>
						<!--{/loop}-->
					</select>	
				</li>
				<li class="tip_txt b_t f_c">{$comiis_lang['view39']}</li>
				<li class="nop b_ok f_c"><input type="text" name="bestdebater" id="bestdebater" class="comiis_px f_c kmshow" value="$debate[bestdebater]" /></li>
				<li class="nop b_ok f_c mt10 cl"><textarea name="umpirepoint" class="comiis_pt f_c" placeholder="{lang debate_umpirepoint}">$debate[umpirepoint]</textarea></li>
			</div>
		</dt>
		<dd class="b_t cl">
            <!--{if $comiis_app_switch['comiis_post_btnwz'] == 1}-->
                <a href="javascript:popup.close();" class="tip_btn bg_f f_b">{lang close}</a>
                <button type="submit" name="umpiresubmit" id="umpiresubmit" class="formdialog tip_btn bg_f f_0" value="true"><span class="tip_lx">{lang submit}</span></button>
			<!--{else}-->
                <button type="submit" name="umpiresubmit" id="umpiresubmit" class="formdialog tip_btn bg_f f_0" value="true">{lang submit}</button>
                <a href="javascript:popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang close}</span></a>
			<!--{/if}-->
		</dd>
	</form>
</div>
<script>comiis_input_style();</script>
<!--{template common/footer}-->