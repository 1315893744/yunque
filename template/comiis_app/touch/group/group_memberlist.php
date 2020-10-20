<?PHP exit('Access Denied');?>
<!--{if $op == 'alluser'}-->
	<!--{if $adminuserlist}-->
    <div class="comiis_uibox bg_f b_t b_b mt10 cl">
      <h2 class="f_c b_b">{$comiis_group_lang['007']}{$comiis_group_lang['016']}</h2>    
      <div class="comiis_userlist01 cl">
          <ul>
            <!--{loop $adminuserlist $user}-->
            <li class="b_t">
              <a href="home.php?mod=space&uid=$user[uid]&do=profile" class="block">
                <i class="comiis_font f_d">&#xe60c;</i>
                <span class="list01_limg bg_e"><!--{echo avatar($user[uid], 'middle')}--></span>
                <p class="tit">$user[username]</p>
                <p class="txt f_c"><span class="bg_c f_f">{if $user['level'] == 1}{lang group_moderator_title}{elseif $user['level'] == 2}{lang group_moderator_vice_title}{/if}</span>{if $user['online']}<span class="bg_0 f_f">{lang login_normal_mode}</span>{/if}</p>
              </a>
            </li>
            <!--{/loop}-->
          </ul>
      </div>
    </div>
	<!--{/if}-->
	<!--{if $staruserlist || $alluserlist}-->
    <div class="comiis_uibox bg_f b_t b_b mt10 cl">
      <h2 class="f_c b_b">{$comiis_group_lang['001']}{$comiis_group_lang['015']}</h2>
      <!--{if $staruserlist || $alluserlist}-->
      <div class="comiis_userlist01 cl">
          <ul>
            <!--{if $staruserlist}-->
              <!--{loop $staruserlist $user}-->
              <li class="b_t">
                <a href="home.php?mod=space&uid=$user[uid]&do=profile" class="block">
                  <i class="comiis_font f_d">&#xe60c;</i>
                  <span class="list01_limg bg_e"><!--{echo avatar($user[uid], 'middle')}--></span>
                  <p class="tit">$user[username]</p>
                  <p class="txt"><span class="bg_c f_f">{lang group_star_member_title}</span>{if $user['online']}<span class="bg_0 f_f">{lang login_normal_mode}</span>{/if}<span class="f_d">{$comiis_lang['view18']}{$comiis_lang['time']}: {echo date('Y-m-d', $user['joindateline']);}</span></p>
                </a>
              </li>
              <!--{/loop}-->
            <!--{/if}-->
            <!--{if $alluserlist}-->
              <!--{loop $alluserlist $user}-->
              <li class="b_t">
                <a href="home.php?mod=space&uid=$user[uid]&do=profile" class="block">
                  <i class="comiis_font f_d">&#xe60c;</i>
                  <span class="list01_limg bg_e"><!--{echo avatar($user[uid], 'middle')}--></span>
                  <p class="tit">$user[username]</p>
                  <p class="txt">{if $user['online']}<span class="bg_0 f_f">{lang login_normal_mode}</span>{/if}<span class="f_d">{$comiis_lang['view18']}{$comiis_lang['time']}: {echo date('Y-m-d', $user['joindateline']);}</span></p>
                </a>
              </li>
              <!--{/loop}-->
            <!--{/if}-->
          </ul>
      </div>
      <!--{/if}-->
    </div>
	<!--{/if}-->
	<!--{if $multipage}-->$multipage<!--{/if}-->
<!--{/if}-->