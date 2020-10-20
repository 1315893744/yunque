<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<div class="comiis_act_yqtit bg_f b_b f_c cl">
	<span>{$comiis_lang['view34']} <em id="comiis_frienda">20</em> {$comiis_lang['view35']}</span>
	{$comiis_lang['view36']} (<em id="comiis_friendy">0</em>) 
	{$comiis_lang['view37']} (<em id="comiis_friendn">0</em>) 	
</div>
<div class="cl">
	<ul id="comiis_friend_list">		
	</ul>
</div>
<form method="post" autocomplete="off" name="invite" id="inviteform" action="misc.php?mod=invite&action=$_GET[action]&id=$id{if $_GET['activity']}&activity=1{/if}&invitesubmit=yes">
	<input type="hidden" name="formhash" value="{FORMHASH}" />
	<input type="hidden" name="referer" value="{echo dreferer()}" />
	<div class="comiis_act_yqbtn cl">
		<button type="submit" class="formdialog comiis_bigbtn bg_c f_f" name="invitesubmit" value="yes" comiis="handle">{lang invite_send}</button>
	</div>
</form>
<script>
var comiis_friend_page = 0, comiis_exit = 0, comiis_friend_num = 0, comiis_friend_allnum = 0;
function comiis_friend_loadpage(){
	comiis_friend_page++;
	if(comiis_friend_page < 5  && comiis_exit == 0){
		$.ajax({
			type:'GET',
			url: 'home.php?mod=spacecp&ac=friend&op=getinviteuser&inajax=1&page=' + comiis_friend_page + '&gid=1&at=0',
			dataType:'xml',
		}).success(function(s) {
			if(s.lastChild.firstChild.nodeValue.length){
				var comiis_friend_data = eval('('+ s.lastChild.firstChild.nodeValue +')');
				var singlenum = parseInt(comiis_friend_data['singlenum']);
				var maxfriendnum = parseInt(comiis_friend_data['maxfriendnum']);
				$('#comiis_friendn').text(maxfriendnum);
				for(i in comiis_friend_data['userdata']) {
					$('#comiis_friend_list').append('<li uid="'+comiis_friend_data['userdata'][i]['uid']+'"><div class="friend_li"><a haref="javascript:;" class="bg_f b_ok f_b"><img src="{$_G['setting']['ucenterurl']}/avatar.php?uid='+comiis_friend_data['userdata'][i]['uid']+'&size=middle"><h2>'+comiis_friend_data['userdata'][i]['username']+'</h2></a></div></li>');
				}
				comiis_friend_allnum += singlenum;
				if(comiis_friend_allnum >= maxfriendnum){
					setTimeout(function(){
						$('#comiis_friend_list li').on('click', function() {
							comiis_friend_list_li = $(this);
							if(comiis_friend_list_li.attr('class') == 'kmon'){
								$('#comiis_friend_list_' + comiis_friend_list_li.attr('uid')).remove();
								comiis_friend_list_li.removeClass('kmon').find('a').removeClass('bg_h b_a f_a').addClass('bg_f b_ok f_b');
								comiis_friend_num--;
								$('#comiis_friendy').text(parseInt($('#comiis_friendy').text())-1);
								$('#comiis_frienda').text(parseInt($('#comiis_frienda').text())+1);
								$('#comiis_friendn').text(parseInt($('#comiis_friendn').text())+1);
							}else{
								if(comiis_friend_num >= 20){
									popup.open('{$comiis_lang['view38']}', 'alert');
									return false;
								}
								$('#inviteform').append('<input value="'+ comiis_friend_list_li.attr('uid') +'" name="uids[]" id="comiis_friend_list_'+ comiis_friend_list_li.attr('uid') +'" type="hidden">');
								comiis_friend_list_li.addClass('kmon').find('a').removeClass('bg_f b_ok f_b').addClass('bg_h b_a f_a');
								comiis_friend_num++;
								$('#comiis_friendy').text(parseInt($('#comiis_friendy').text())+1);
								$('#comiis_frienda').text(parseInt($('#comiis_frienda').text())-1);
								$('#comiis_friendn').text(parseInt($('#comiis_friendn').text())-1);
							}
						});
					}, 500);
					comiis_exit = 1;
				}else{
					comiis_friend_loadpage();
				}
			}else{
				comiis_exit = 1;
			}
		}).error(function() {
			popup.open('{$comiis_lang['all23']}', 'alert');
			comiis_exit = 1;
		});
	}
}
comiis_friend_loadpage();
function succeedhandle_inviteform(a, b, c){
	if(b.indexOf("{$comiis_lang['all24']}") > 0){
		popup.open(b, 'alerts');
	}else{
		popup.open(b, 'alert');
	}
}
</script>
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->