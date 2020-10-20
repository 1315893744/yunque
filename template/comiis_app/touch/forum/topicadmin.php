<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<div class="comiis_tip bg_f cl">
<form id="moderateform" method="post" autocomplete="off" action="forum.php?mod=topicadmin&action=moderate&optgroup=$optgroup&modsubmit=yes&mobile=2" >
	<input type="hidden" name="frommodcp" value="$frommodcp" />
	<input type="hidden" name="formhash" value="{FORMHASH}" />
	<input type="hidden" name="fid" value="$_G[fid]" />
	<input type="hidden" name="redirect" value="{echo dreferer()}" />
	<!--{loop $threadlist $thread}-->
		<input type="hidden" name="moderate[]" value="$thread[tid]" />
	<!--{/loop}-->	
	<input type="hidden" name="reason" value="{lang topicadmin_mobile_mod}" />
	<!--{if $_GET['optgroup'] == 1}-->
        <!--{eval comiis_load('PWNCy9sKnN6WNn8S8X', 'threadlist,defaultcheck,stickcheck,expirationstick,digestcheck,expirationdigest,stylecheck,colorcheck,highlight_bgcolor,expirationhighlight');}-->
        <!--{if $_G['group']['allowrecommendthread'] && !empty($_G['forum']['modrecommend']['open']) && $_G['forum']['modrecommend']['sort'] != 1}-->
            <div {if !$defaultcheck[recommend]}style="display:none;"{/if}>
                <div class="tip_tit bg_e f_b b_b">{lang recommend}</div>
                <dt class="tip_form comiis_input_style f_b" style="padding:5px 15px;">
                    <li class="tip_txt comiis_flex b_b cl">
                        <div class="flex">
                            <input id="isrecommendok" name="operations[]" onclick="if(this.checked) switchitemcp('itemcp_recommend')" value="recommend" $defaultcheck[recommend] type="checkbox" />
                            <label for="isrecommendok" style="text-align:left;"><i class="comiis_font"></i> {lang recommend}</label>
                        </div>
                        <div class="flex">
                            <input type="radio" id="isrecommenda" name="isrecommend" value="1" checked="checked" />
                            <label for="isrecommenda" style="text-align:left;"><i class="comiis_font"></i> {lang recommend}</label>
                        </div>
                        <div class="flex">
                            <input type="radio" id="isrecommendb" name="isrecommend" value="0" />
                            <label for="isrecommendb" style="text-align:left;"><i class="comiis_font"></i> {lang admin_unrecommend}</label>
                        </div>
                    </li>               
                    <li class="tip_txt comiis_flex">
                        <div class="styli_tit">{lang expire}</div>
                        <div class="flex"><input type="text" name="expirationrecommend" id="expirationrecommend" value="$expirationrecommend" autocomplete="off" value="" tabindex="1" class="comiis_dateshow kmshow comiis_inputs b_b f_c" /></div>
                        <div class="styli_r f_c"><a href="javascript:;" onclick="$('.comiis_dateshow').val('');"><i class="comiis_font f_g">&#xe647;</i></a></div>
                    </li>
                    <!--{if $defaultcheck[recommend] && count($threadlist) == 1}-->
                        <input type="hidden" name="position" value="1" />
                        <li class="tip_txt comiis_flex">
                            <div class="styli_tit">{lang forum_recommend_reducetitle}</div>
                            <div class="flex bg_e b_ok" style="padding:0 5px;">
                                <input type="text" name="reducetitle" id="reducetitle" class="comiis_px f_c kmshow" value="$thread[subject]" tabindex="2" />
                            </div>
                        </li>
                        <!--{if $imgattach}-->
                        <li class="tip_txt comiis_flex">
                            <div class="styli_tit">{lang forum_recommend_image}</div>
                            <div class="flex">
                                <div class="comiis_styli comiis_styli_select cl" id="threadtypes">
                                    <div class="comiis_login_select comiis_inner bg_e b_ok">
                                        <span class="inner">
                                            <i class="comiis_font f_d">&#xe60c</i>
                                            <span class="z">
                                                <span class="comiis_question f_c" id="selectattacha_name"></span>
                                            </span>					
                                        </span>
                                        <select id="selectattacha" name="selectattach" onchange="updateimginfo(this.value)">
                                            <option value="">{lang forum_recommend_noimage}</option>
                                            <!--{loop $imgattach $imginfo}-->
                                                <option value="$imginfo[aid]"{if $selectattach == $imginfo[aid]} selected="selected"{/if}>$imginfo[filename]</option>
                                            <!--{/loop}-->
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="tip_txt comiis_flex">
                            <div class="styli_tit">{$comiis_lang['tip275']}</div>
                            <div class="flex" style="text-align:left;">
                                <img id="selectimg" src="template/comiis_app/comiis/img/comiis_none.gif"  width="120" height="80" />
                                <script type="text/javascript" reload="1">
                                var imgk = new Array();
                                <!--{loop $imgattach $imginfo}-->
                                    <!--{eval $a = '\"\'\t\\""\\\''."\\\\";$k = getforumimg($imginfo['aid'], 1, 120, 80);}-->
                                    imgk[{$imginfo[aid]}] = '$k';
                                <!--{/loop}-->
                                function updateimginfo(aid) {
                                    if(aid) {
                                        $('#selectimg').attr('src', imgk[aid]);
                                    } else {
                                        $('#selectimg').attr('src', 'template/comiis_app/comiis/img/comiis_none.gif');
                                    }
                                }
                                <!--{if $selectattach}-->updateimginfo('$selectattach');<!--{/if}-->
                                </script>
                            </div>
                        </li>
                        <!--{/if}-->
                    <!--{/if}-->                    
                </dt>
            </div>
        <!--{/if}-->
	<!--{elseif $_GET['optgroup'] == 2}-->
		<!--{eval comiis_load('hJomcLmJoW6cC622pc', 'operation,forumselect,typeselect');}-->
	<!--{elseif $_GET['optgroup'] == 3}-->
		<!--{if $operation == 'delete'}-->
			<!--{if $_G['group']['allowdelpost']}-->
				<input name="operations[]" type="hidden" value="delete"/>
				<dt class="f_b"><p>{lang admin_delthread_confirm}</p></dt>
					<!--{if ($modpostsnum == 1 || $authorcount == 1) && $crimenum > 0}-->
						<dt class="f_b"><p>{lang topicadmin_crime_delpost_nums}</p></dt>
					<!--{/if}-->
			<!--{else}-->
				<dt class="f_b"><p>{lang admin_delthread_nopermission}</p></dt>
			<!--{/if}-->
		<!--{elseif $operation == 'down' || $operation='bump'}-->
			<div class="tip_tit bg_e mb5 f_b b_b">{lang modmenu_updown}</div>
			<dt class="comiis_input_style comiis_tip_radios kmlabs f_b">			
				<input type="radio" id="operations_bump" name="operations[]" value="bump" checked="checked" />
				<label for="operations_bump"><i class="comiis_font"></i>{lang admin_bump}</label>
				<div class="comiis_flex cl">
					<div class="styli_tit f_c">{lang expire}</div>
					<div class="flex"><input type="text" name="expirationbump" id="expirationbump" autocomplete="off" value="" tabindex="1" class="comiis_dateshow kmshow comiis_inputs b_b f_c" /></div>
					<div class="styli_r f_c"><a href="javascript:;" onclick="$('.comiis_dateshow').val('');"><i class="comiis_font f_g">&#xe647;</i></a></div>
				</div>
				<input type="radio" id="operations_down" name="operations[]" value="down" />
				<label for="operations_down" class="mt10"><i class="comiis_font"></i>{lang admin_down}</label>			
			</dt>
		<!--{/if}-->
	<!--{elseif $_GET['optgroup'] == 4}-->
			<div class="tip_tit bg_e mb5 f_b b_b"><!--{if $closecheck[0]}-->{lang modmenu_switch_off}<!--{else}-->{lang modmenu_switch_on}<!--{/if}--></div>
			<dt class="kmlabs f_b">
				<div class="comiis_flex cl">
					<div class="styli_tit f_c">{lang expire}</div>
					<div class="flex"><input type="text" name="expirationclose" id="expirationclose" class="comiis_dateshow kmshow comiis_inputs b_b f_c" autocomplete="off" value="$expirationclose" /></div>
					<div class="styli_r f_c"><a href="javascript:;" onclick="$('.comiis_dateshow').val('');"><i class="comiis_font f_g">&#xe647;</i></a></div>
				</div>
				<div class="comiis_input_style comiis_tip_radios mt10">			
					<input type="radio" name="operations[]" value="open" $closecheck[0] id="comiis_gbzt_1" />
					<label for="comiis_gbzt_1"><i class="comiis_font{if $closecheck[0]} f_0{else} f_d{/if}"><!--{if $closecheck[0]}-->&#xe645;<!--{else}-->&#xe646;<!--{/if}--></i>{lang admin_open}</label>					
					<input type="radio" name="operations[]" value="close" $closecheck[1] id="comiis_gbzt_2" />
					<label for="comiis_gbzt_2"><i class="comiis_font{if $closecheck[1]} f_0{else} f_d{/if}"><!--{if $closecheck[1]}-->&#xe645;<!--{else}-->&#xe646;<!--{/if}--></i>{lang admin_close}</label>
				</div>
			</dt>			
	<!--{/if}-->	
	<!--{if empty($hiddensubmit)}-->
		<dd class="b_t cl">
            <!--{if $comiis_app_switch['comiis_post_btnwz'] == 1}-->
                <a href="javascript:popup.close();" class="tip_btn bg_f f_b">{lang cancel}</a>		
                <button type="submit" name="modsubmit" id="modsubmit" value="{lang confirms}" class="formdialog tip_btn bg_f f_0"><span class="tip_lx">{lang confirms}</span></button>
			<!--{else}-->
                <button type="submit" name="modsubmit" id="modsubmit" value="{lang confirms}" class="formdialog tip_btn bg_f f_0">{lang confirms}</button>
                <a href="javascript:popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang cancel}</span></a>
			<!--{/if}-->		
		</dd>
	<!--{/if}-->
</form>
</div>
<script>
comiis_input_style();
function succeedhandle_mods(locationhref) {
	popup.open('{$comiis_lang['tip27']}', 'alert');
	setTimeout(function() {
	<!--{if !empty($_GET[from])}-->
		location.href = 'forum.php?mod=viewthread&tid=$_GET[from]&extra=$_GET[listextra]';
	<!--{else}-->
		location.href = locationhref;
	<!--{/if}-->
	}, 888);
}
function switchhl(obj, v) {
	if(parseInt($('.highlight_style_' + v).val())) {
		$('.highlight_style_' + v).val(0);
		obj.className = obj.className.replace(/ bg_del f_f/, '');
	} else {
		$('.highlight_style_' + v).val(1);
		obj.className += ' bg_del f_f';
	}
}
function set_color_style(k, c) {
	$('.highlight_color').val(k);
	$('.set_color_style').css('background-color', c);
}
</script>
<!--{template common/footer}-->