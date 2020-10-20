<?php echo '';exit;?>
<!--{eval $is_follower = 0;}-->
<!--{if ($_GET['do'] == 'follower' || $_GET['do'] == 'following') && $_G['uid'] != $_GET['uid']}-->
	<!--{eval $is_follower = 1;$_G['comiis_close_header'] = 1;}-->
<!--{/if}-->
<!--{template common/header}-->
<!--{if $is_follower}-->
	<!--{template home/space_header}-->
<!--{/if}-->
<!--{if $do != 'feed'}-->
	<!--{if !$is_follower}-->
		<!--{template home/comiis_friend_nav}-->
	<!--{/if}-->
<!--{if in_array($do, array('following', 'follower'))}-->
	<script>
	<!--{if $do=='following'}-->
	function succeedhandle_following(a,b,c) {
		$('#comiis_friendbox_'+c['fuid']).remove();
		if($('.comiis_friend li').length < 1) {
			$('.comiis_notip').css('display','block');
			$('.comiis_friend').css('display','none');
		}
		popup.open('{$comiis_lang['tip2']}', 'alert');
	}
	function errorhandle_following(a,b) {
		popup.open(a, 'alert');
	}		
	function succeedhandle_specialfollow(a,b,c) {
	$('#a_specialfollow_'+c['fuid'] + ' i').html(c['special'] == 1 ? '&#xe617;' : '&#xe64c;');
	
		$('#a_specialfollow_'+c['fuid']).attr('href', 'home.php?mod=spacecp&ac=follow&op=add&handlekey=specialfollow&hash={FORMHASH}&special='+c['special']+'&fuid='+c['fuid']);
		popup.open((c['special'] == 1 ? '{$comiis_lang['tip185']}' : '{$comiis_lang['tip184']}') + '{$comiis_lang['tip188']}', 'alert');
	}
	<!--{/if}-->
	</script>
	<!--{if $list}-->	
        <div class="mt10 comiis_pltit bg_f b_b f14 f_d cl">
            <h3><!--{if $do=='following'}--><i class="comiis_font z f18">&#xe60e;</i>{if $is_follower}{$comiis_lang['tip339']}{/if}{$comiis_lang['all3']} $space['following']<!--{else}--><i class="comiis_font z f18">&#xe629;</i>{if $is_follower}{$comiis_lang['tip339']}{/if}{$comiis_lang['all73']} $space['follower']<!--{/if}--></h3>
        </div>
        <!--{eval comiis_load('OQP2vs1SJ1sdBa2s1v', 'list,do,viewself,memberinfo,fuser');}-->
		<!--{if !empty($multi)}--><div class="cl">$multi</div><!--{/if}-->		
		<div id="comiis_followmod" style="display:none;">
		<div class="comiis_tip bg_f cl">
			<dt class="f_b">
				<p>{$comiis_lang['all10']}?</p>
			</dt>	
			<dd class="b_t cl">
                <!--{if $comiis_app_switch['comiis_post_btnwz'] == 1}-->
                    <a href="javascript:popup.close();" class="tip_btn bg_f f_b">{$comiis_lang['all9']}</a>
                    <a href="javascript:comiis_list_followmod();" class="tip_btn bg_f f_0"><span class="tip_lx">{$comiis_lang['all8']}</span></a>
                <!--{else}-->
                    <a href="javascript:comiis_list_followmod();" class="tip_btn bg_f f_0">{$comiis_lang['all8']}</a>
                    <a href="javascript:popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{$comiis_lang['all9']}</span></a>
                <!--{/if}-->
			</dd>
		</div>
		</div>		
		<script>
		$(document).ready(function() {
			$('.user_gz').on('click', function() {
				comiis_list_follow_obj = $(this);
				if(comiis_list_follow_obj.attr('href').indexOf('op=del') > 0){
					popup.open($('#comiis_followmod'));
				}else{
					comiis_list_followmod();
				}
				return false;
			});
		});
		var comiis_list_follow_obj;
		function comiis_list_followmod() {
			var comiis_list_follow_url = comiis_list_follow_obj.attr('href'),
			comiis_list_follow_uid = comiis_list_follow_obj.attr('uid');
			$.ajax({
				type:'GET',
				url: comiis_list_follow_url + '&inajax=1' ,
				dataType:'xml',
			}).success(function(s) {
				var b;
				if(s.lastChild.firstChild.nodeValue.indexOf("'type':'add'") > 0){
					$('#comiis_friendtip_'+comiis_list_follow_uid).text('{$comiis_lang['tip186']}');
					$('#a_followmod_'+comiis_list_follow_uid).attr('href', 'home.php?mod=spacecp&ac=follow&op=del&fuid='+comiis_list_follow_uid+'&handlekey=follower');
					$('#a_followmod_'+comiis_list_follow_uid + ' i').html('&#xe79b;');
					$('#a_followmod_'+comiis_list_follow_uid + ' font').text('{$comiis_lang['all9']}');
					if(s.lastChild.firstChild.nodeValue.indexOf("{$comiis_lang['tip34']}") >= 0){
						b = '{$comiis_lang['tip1']}';
					}
				}else if(s.lastChild.firstChild.nodeValue.indexOf("'type':'del'") > 0){
					$('#comiis_friendtip_'+comiis_list_follow_uid).text('');
					$('#a_followmod_'+comiis_list_follow_uid).attr('href', 'home.php?mod=spacecp&ac=follow&op=add&hash={FORMHASH}&fuid='+comiis_list_follow_uid+'&handlekey=follower');
					$('#a_followmod_'+comiis_list_follow_uid + ' i').html('&#xe60e;');
					$('#a_followmod_'+comiis_list_follow_uid + ' font').text('{$comiis_lang['all3']}');
					if(s.lastChild.firstChild.nodeValue.indexOf("{$comiis_lang['tip35']}") >= 0){
						b = '{$comiis_lang['tip2']}';
					}
				}
				popup.open(b, 'alert');
			});
		}
		</script>
	<!--{/if}-->
		<div class="comiis_notip comiis_sofa mt12 bg_f b_t b_b cl"{if $list} style="display:none"{/if}>
			<i class="comiis_font f_e mt12 cl">&#xe613;</i>
			<span class="f_d">
                <!--{if $viewself}-->
                    <!--{if $do=='following'}-->
                        {$comiis_lang['tip340']}
                    <!--{else}-->
                        {$comiis_lang['tip341']}
                    <!--{/if}-->
                <!--{else}-->
                    <!--{if $do=='following'}-->
                        {$comiis_lang['tip342']}
                    <!--{else}-->
                        {$comiis_lang['tip343']}
                    <!--{/if}-->
                <!--{/if}-->
			</span>
		</div>
<!--{/if}-->
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->