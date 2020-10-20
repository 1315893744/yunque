<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{if empty($_GET['showratetip']) && $_GET[action] == 'rate'}-->
<div class="comiis_tip comiis_input_style bg_f cl">
	<form id="rateform" method="post" autocomplete="off" action="forum.php?mod=misc&action=rate&ratesubmit=yes&infloat=yes" onsubmit="ajaxpost('rateform', 'return_rate', 'return_rate', 'onerror');">
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<input type="hidden" name="tid" value="$_G[tid]" />
		<input type="hidden" name="pid" value="$_GET[pid]" />
		<input type="hidden" name="referer" value="$referer" />
		<input type="hidden" name="handlekey" value="rate">
		<!--{if count($ratelist) < 4}-->
		<div class="comiis_ratetop comiis_p5 bg_e b_b cl">
			<a href="javascript:;" onclick="popup.close();" class="ratetop_close f_d"><i class="comiis_font">&#xe639;</i></a>
			<a href="home.php?mod=space&uid=$post[authorid]&do=profile" class="ratetop_tx"><img src="<!--{avatar($post[authorid], middle, true)}-->">$post[author]</a>
			<p class="f_c"><!--{if !$post['first'] && $_G['group']['raterange'] && $post['authorid']}-->{$comiis_lang['view64']}<!--{else}-->{$comiis_lang['view52']}<!--{/if}--></p>
		</div>
		<!--{else}-->
		<div class="tip_tit txt_l bg_e b_b" style="padding:0 17px;"><a href="javascript:;" onclick="popup.close();" class="y f_d"><i class="comiis_font">&#xe639;</i></a>{$comiis_lang['view50']}</div>
		<!--{/if}-->
		<ul class="comiis_p5 cl">
			<!--{eval $rateselfflag = 0;}-->
			<!--{loop $ratelist $id $options}-->
			<li class="comiis_styli comiis_flex" style="padding-bottom:0;">
				<div class="styli_tit f_c">{$_G['setting']['extcredits'][$id][img]} {$_G['setting']['extcredits'][$id][title]}</div>
				<div class="flex"><input type="text" name="score$id" id="score$id" value="0" for="comiis_rate{$id}_change" class="comiis_input kmshow f_a b_b" style="padding:4px 0;" /></div>
				<div class="styli_r">
					<div class="comiis_login_select comiis_inner b_ok">
						<span class="inner">&nbsp;<i class="comiis_font f_d" style="float:none;">&#xe620;</i>&nbsp;</span>
						<select class="comiis_select_change" id="comiis_rate$id"><option>0</option>{echo str_replace(array('<li>','</li>'), array('<option>','</option>'), $options)}</select>
					</div>
				</div>
			</li>
			<!--{/loop}-->			
			<li class="comiis_styli comiis_flex">
				<div class="flex"><input type="text" name="reason" id="reason" for="comiis_reason_change" placeholder="{$comiis_lang['view51']}" class="comiis_input kmshow f_c b_b" style="padding:4px 0;" /></div>
				<div class="styli_r">
					<div class="comiis_login_select comiis_inner b_ok">
						<span class="inner">&nbsp;<i class="comiis_font f_d" style="float:none;">&#xe620;</i>&nbsp;</span>
						<!--{eval $selectreason = modreasonselect(1, 'userreasons')}-->
						<!--{if $selectreason}-->
							<select class="comiis_select_change" id="comiis_reason">$selectreason</select>
						<!--{/if}-->
					</div>
				</div>
			</li>	
			<li class="comiis_stylino comiis_flex">
				<div class="styli_tit f_c">{lang admin_pm}</div>
				<div class="flex"></div>
				<div class="styli_r">
					<input type="checkbox" name="sendreasonpm" id="sendreasonpm" {if $_G['group']['reasonpm'] == 2 || $_G['group']['reasonpm'] == 3} checked="checked" disabled="disabled"{/if} class="comiis_checkbox_key" />
					<label for="sendreasonpm"><code class="bg_f b_ok mt4 comiis_checkbox comiis_checkbox_close"></code></label>
				</div>
			</li>			
			<li class="comiis_stylino mt10 mb12">
				<button type="submit" name="ratesubmit" class="formdialog comiis_btn bg_c f_f">{$comiis_lang['view50']}</button>
			</li>
			<!--{if $comiis_app_switch['comiis_jifenurl']}-->
            <li class="comiis_stylino mt10 mb12">
                <a href="{$comiis_app_switch['comiis_jifenurl']}" class="comiis_btn bg_a f_f">{$comiis_lang['all48']}{$comiis_lang['tip307']}</a>
            </li>
			<!--{/if}-->
		</ul>
		<script>
			comiis_input_style();
			$(document).on('change', '.comiis_select_change', function(){
				$('[for="' + $(this).attr('id')+'_change"]').val($(this).find('option:selected').text());
			});
		</script>
	</form>
</div>
<!--{else}-->
<div class="comiis_tip bg_f cl">
	<dt class="f_b">
		<p>{$comiis_lang['tip7']}</p>
	</dt>
	<dd class="b_t cl"><a class="tip_btn tip_all bg_f f_b" onclick="popup.close();" href="javascript:;"><span>{lang cancel}</span></a></dd>
</div>
<!--{/if}-->
<!--{template common/footer}-->