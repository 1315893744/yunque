<?PHP exit('Access Denied');?>
<div class="comiis_topnv bg_f b_b">
    <ul class="comiis_flex">
        <li><a href="forum.php?mod=forumdisplay&action=list&fid=$_G[fid]" class="f_c b_r" style="padding:0 12px;"><i class="comiis_font" style="font-size:18px;">&#xe662;</i></a></li>
        <li class="flex{if $_GET['op'] == 'group'} f_0{/if}">{if $_GET['op'] == 'group'}<em class="bg_0"></em>{/if}<a href="forum.php?mod=group&action=manage&op=group&fid=$_G[fid]"{if $_GET['op'] != 'group'} class="f_c"{/if}>{lang setup}</a></li>
        <!--{if !empty($groupmanagers[$_G[uid]]) || $_G['adminid'] == 1}-->
        <li class="flex{if $_GET['op'] == 'checkuser'} f_0{/if}">{if $_GET['op'] == 'checkuser'}<em class="bg_0"></em>{/if}<a href="forum.php?mod=group&action=manage&op=checkuser&fid=$_G[fid]"{if $_GET['op'] != 'checkuser'} class="f_c"{/if}>{$comiis_group_lang['006']}</a></li>
        <li class="flex{if $_GET['op'] == 'manageuser'} f_0{/if}">{if $_GET['op'] == 'manageuser'}<em class="bg_0"></em>{/if}<a href="forum.php?mod=group&action=manage&op=manageuser&fid=$_G[fid]"{if $_GET['op'] != 'manageuser'} class="f_c"{/if}>{$comiis_group_lang['007']}</a></li>
        <!--{/if}-->
        <!--{if $_G['forum']['founderuid'] == $_G['uid'] || $_G['adminid'] == 1}-->
        <li class="flex{if $_GET['op'] == 'threadtype'} f_0{/if}">{if $_GET['op'] == 'threadtype'}<em class="bg_0"></em>{/if}<a href="forum.php?mod=group&action=manage&op=threadtype&fid=$_G[fid]"{if $_GET['op'] != 'threadtype'} class="f_c"{/if}>{$comiis_lang['types']}</a></li>
        <li class="flex{if $_GET['op'] == 'demise'} f_0{/if}">{if $_GET['op'] == 'demise'}<em class="bg_0"></em>{/if}<a href="forum.php?mod=group&action=manage&op=demise&fid=$_G[fid]&handlekey=comiis_group_handle" comiis='handle'{if $_GET['op'] != 'demise'} class="{if (count($groupmanagers) <= 1) || !((!empty($_G['forum']['founderuid']) && $_G['forum']['founderuid'] == $_G['uid']) || $_G['adminid'] == 1)}dialog {/if}f_c"{/if}>{$comiis_group_lang['008']}</a></li>
        <!--{/if}-->
    </ul>
</div>
<!--{if $_GET['op'] == 'group'}-->
<style type="text/css">
  #returnmessage4 {display:none;}
  #returnmessage4.onerror {display:block;}
</style>
<form enctype="multipart/form-data" action="forum.php?mod=group&action=manage&op=group&fid=$_G[fid]&inajax=1" name="manage" method="post" autocomplete="off" target="comiis_group_updata">
<input type="hidden" value="{FORMHASH}" name="formhash" />
<input type="hidden" value="comiis_group_handle" name="handlekey" />
<!--{eval comiis_load('srEeIIiM3Xw9XWIXI5', 'comiis_group_lang,specialswitch,groupselect,gviewpermselect,jointypeselect,domainlength');}-->
<input type="hidden" value="1" name="groupmanage" />
<div class="comiis_btnbox">
    <button type="submit" class="comiis_btn bg_c f_f" onclick="popup.open('<img src=\'template/comiis_app/comiis/img/imageloading.gif\' class=\'comiis_loading\'>');">{lang submit}</button>
</div>
</form>
<script>
function comiis_parentid(url) {
	$.ajax({
		type:'GET',
		url: url + '&inajax=1' ,
		dataType:'xml',
	}).success(function(s) {
		$('#fup_div').html(s.lastChild.firstChild.nodeValue);
		comiis_input_style();
	});
}
function comiis_group_updatas() {
	var str = $("#comiis_group_updata").contents().text();
	if(str != ''){comiis_ishandle(str);}
}
</script>
<iframe name="comiis_group_updata" id="comiis_group_updata" style="display: none;" onload="comiis_group_updatas()"></iframe>
<!--{elseif $_GET['op'] == 'checkuser'}-->
	<!--{if $checkusers}-->
    <div class="comiis_top_sub">
      <div id="comiis_top_box">
        <div id="comiis_sub_btn">
          <ul class="y">
            <li><a href="forum.php?mod=group&action=manage&op=checkuser&fid=$_G[fid]&checkall=2&handlekey=comiis_group_handle" class="dialog f_0" comiis='handle'>{lang ignore_all}</a></li>
            <li><span class="comiis_tm f_d">/</span><a href="forum.php?mod=group&action=manage&op=checkuser&fid=$_G[fid]&checkall=1&handlekey=comiis_group_handle" class="dialog f_0" comiis='handle'>{lang pass_all}</a></li>
          </ul>
        </div>
      </div>
    </div>    
    <div class="comiis_uibox bg_f b_t b_b cl">
      <div class="comiis_userlist01 cl">
          <ul>
            <!--{loop $checkusers $uid $user}-->
            <li class="b_t">
                <p class="ybtn">
                  <a href="forum.php?mod=group&action=manage&op=checkuser&fid=$_G[fid]&uid=$user[uid]&checktype=1&handlekey=comiis_group_handle" class="dialog comiis_sendbtn bg_0 f_f" style="display: inline-block;" comiis='handle'>{lang pass}</a>
                  <a href="forum.php?mod=group&action=manage&op=checkuser&fid=$_G[fid]&uid=$user[uid]&checktype=2&handlekey=comiis_group_handle" class="dialog comiis_sendbtn bg_b f_c" style="display: inline-block;" comiis='handle'>{lang ignore}</a>
                </p>
                <a href="home.php?mod=space&uid=$user[uid]&do=profile" class="list01_limg bg_e"><!--{echo avatar($user[uid], 'middle')}--></a>
                <p class="tit"><a href="home.php?mod=space&uid=$user[uid]&do=profile">$user[username]</a></p>
                <p class="txt f_d">$user['joindateline']</p>
            </li>
            <!--{/loop}-->
          </ul>
      </div>
    </div>
	<!--{if $multipage}-->$multipage<!--{/if}-->
	<!--{else}-->
    <div class="comiis_notip comiis_sofa mt15 cl">
      <i class="comiis_font f_e cl">&#xe613;</i>
      <span class="f_d">{lang group_no_member_moderated}</span>
    </div>
	<!--{/if}-->
<!--{elseif $_GET['op'] == 'manageuser'}-->
    <style>.comiis_footer_scroll {bottom:60px;}</style>
	<script type="text/javascript">
		function groupManageUser(targetlevel_val) {
			$('#targetlevel').val(targetlevel_val);
			$('#comiis_group_edit_submit').trigger("click");
		}
	</script>	
	<!--{if $_G['forum']['membernum'] > 30}-->
        <div class="comiis_wzpost comiis_input_style bg_f cl">
            <form action="forum.php?mod=group&action=manage&op=manageuser&fid=$_G[fid]" method="post">
            <ul>
                <li class="comiis_styli comiis_flex b_b">                    
                    <div class="flex"><input type="text" value="{if $_GET['srchuser']}$_GET[srchuser]{else}{lang enter_member_user}{/if}" class="comiis_input kmshow f_c" id="groupsearch" name="srchuser"></div>
                    <div class="styli_r"><button class="comiis_sendbtn bg_0 f_f" type="submit">{lang search}</button></div>                    
                </li>
            <ul>
            </form>
        </div>
	<!--{/if}-->	
	<form action="forum.php?mod=group&action=manage&op=manageuser&fid=$_G[fid]&manageuser=true" name="manageuser" id="manageuser" method="post" autocomplete="off" class="ptm">
		<input type="hidden" value="{FORMHASH}" name="formhash" />
		<input type="hidden" name="manageuser" value="true" />
		<input type="hidden" name="handlekey" value="comiis_group_handle" />
        <input type="hidden" value="0" name="targetlevel" id="targetlevel" />
        <!--{eval comiis_load('fqj56j5jUFAh554FjZ', 'adminuserlist,groupuser,comiis_group_lang,staruserlist,userlist');}-->	
        <!--{if $multipage}-->$multipage<!--{/if}-->
        <div class="comiis_roll_foot bg_f b_t">
          <div id="comiis_roll_footbox">
            <ul class="swiper-wrapper">
            <!--{loop $mtype $key $name}-->
              <!--{if $_G['forum']['founderuid'] == $_G['uid'] || $key > $groupuser['level'] || $_G['adminid'] == 1}-->
                <li class="swiper-slide"><button type="button" class="bg_0 f_f" onclick="groupManageUser('{$key}')">{echo str_replace(array($comiis_lang['post46'], $comiis_lang['post47']), array($comiis_group_lang['022'], $comiis_group_lang['001']), $name);}</button></li>
               <!--{/if}-->
            <!--{/loop}-->
            </ul>
          </div>
        </div>
        <button type="submit" style="display:none" id="comiis_group_edit_submit" class="formdialog"  comiis='handle'></button>    
        <script src="template/comiis_app/comiis/js/comiis_swiper.min.js?{VERHASH}"></script>
        <script>
          if($("#comiis_roll_footbox li").length > 0) {
            var comiis_index = $("#comiis_roll_footbox li").offset().left + $("#comiis_roll_footbox li").width() >= $(window).width() ? $("#comiis_roll_footbox li").index() : 0;
          }else{
            var comiis_index = 0;
          }
          mySwiper = new Swiper('#comiis_roll_footbox', {
            freeMode : true,
            slidesPerView : 'auto',
            initialSlide : comiis_index,
            onTouchMove: function(swiper){
              Comiis_Touch_on = 0;
            },
            onTouchEnd: function(swiper){
              Comiis_Touch_on = 1;
            },
          });
        </script>
    </form>
    <div style="height:48px;"></div>
<!--{elseif $_GET['op'] == 'threadtype'}-->
    <!--{if empty($specialswitch['allowthreadtype'])}-->
    <div class="comiis_notip comiis_sofa mt15 cl">
        <i class="comiis_font f_e cl">&#xe613;</i>
        <span class="f_d">{lang group_level_cannot_do}</span>
    </div>
    <!--{else}-->
        <!--{eval comiis_load('E7CT7mEBu9LCm9Z1b2', 'typenumlimit,comiis_group_lang,checkeds,threadtypes');}-->
    <!--{/if}-->
<!--{elseif $_GET['op'] == 'demise'}-->
  <!--{if $groupmanagers}-->
    <div class="comiis_p12 bg_f b_b cl">
      <div class="comiis_quote bg_h f_a cl" style="margin:0;font-size:13px;">
        <h2>{$comiis_group_lang['019']}</h2>
        <p>{$comiis_group_lang['020']}</p>
      </div>
    </div>
    <form action="forum.php?mod=group&action=manage&op=demise&fid=$_G[fid]" name="groupdemise" method="post" class="exfm">
      <input type="hidden" value="{FORMHASH}" name="formhash" />
      <input type="hidden" value="1" name="groupdemise" />
      <input type="hidden" name="handlekey" value="comiis_group_handle" />
      <div class="comiis_uibox comiis_input_style bg_f b_t b_b mt10 cl">
        <h2 class="f_c b_b">{$comiis_group_lang['021']}</h2>
        <div class="comiis_userlist01 cl">
            <ul>
              <!--{loop $groupmanagers $user}-->
                <li class="b_t">
                  <!--{if $user['uid'] != $_G['uid']}-->
                     <input type="radio" id="comiis_s{$user[uid]}" name="suid" value="$user[uid]" />
                     <label for="comiis_s{$user[uid]}" class="l_label"><i class="comiis_font"></i></label>
                  <!--{else}-->
                     <label class="l_label"><i class="comiis_font">&nbsp;</i></label>
                  <!--{/if}-->                  
                  <a href="home.php?mod=space&uid=$user[uid]&do=profile" class="block">
                    <i class="comiis_font f_d">&#xe60c;</i>
                    <span class="list01_limg bg_e"><!--{echo avatar($user[uid], 'middle')}--></span>
                    <p class="tit">$user[username]</p>
                    <p class="txt"><span class="bg_a f_f">{if $comiis_app_switch['comiis_lev_txt']}{$comiis_app_switch['comiis_lev_txt']}{else}Lv.{/if}{$user['level']}</span></p>
                  </a>
                </li>
              <!--{/loop}-->
            </ul>
        </div>
      </div>
      <div class="comiis_wzpost bg_f cl">	
        <li class="comiis_styli b_b">
          <input type="password" name="grouppwd" class="comiis_input kmshow" placeholder="{lang group_input_password}" />
        </li>
      </div>
      <div class="comiis_btnbox">
        <button type="submit" class="comiis_btn bg_c f_f formdialog">{lang submit}</button>
      </div>
    </form>
  <!--{else}-->
    <div class="comiis_notip comiis_sofa mt15 cl">
      <i class="comiis_font f_e cl">&#xe613;</i>
      <span class="f_d">{$comiis_group_lang['018']}</span>
    </div>
  <!--{/if}-->
<!--{/if}-->
<!--{eval $comiis_foot = 'no';$comiis_open_footer = 0;}-->