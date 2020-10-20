<?PHP exit('Access Denied');?>
<!--{if $comiis_app_switch['comiis_view_cnxh_style'] == 1}-->
  <!--{eval $redata = comiis_relateitem($post['relateitem']);$comiis_pic_list = $redata['comiis_pic_list'];}-->
  <div class="comiis_pltit bg_f b_b{if $comiis_app_switch['comiis_view_cnxh_wz'] == 1} b_t{/if} cl"><h2><!--{if $comiis_app_switch['comiis_view_cnxh_name']}-->{$comiis_app_switch['comiis_view_cnxh_name']}<!--{else}-->{lang related_thread}<!--{/if}--></h2></div>
  <div class="comiis_forumlist cl"{if $comiis_app_switch['comiis_view_cnxh_wz'] == 1} style="margin-bottom:0;"{/if}>
    <ul>
      <!--{eval $n=0;$comiis_app_switch['comiis_view_cnxh_num'] = ($comiis_app_switch['comiis_view_cnxh_num'] ? $comiis_app_switch['comiis_view_cnxh_num'] : 5)}-->
      <!--{loop $post['relateitem'] $thread_s}-->
      <!--{eval $n++;}-->
      <!--{if $n <= $comiis_app_switch['comiis_view_cnxh_num']}-->
        <li class="forumlist_li comiis_wzlists bg_f b_b">
          <div class="{if !$comiis_pic_list[$thread_s['tid']]['num']}wzlist_noimg{elseif $comiis_pic_list[$thread_s['tid']]['num'] < 3}wzlist_one{else}wzlist_imgs{/if}">
            <a href="forum.php?mod=viewthread&tid=$thread_s[tid]">
            <!--{if $thread_s['attachment'] == 2 && ($comiis_pic_list[$thread_s['tid']]['num'] == 1 || $comiis_pic_list[$thread_s['tid']]['num'] == 2)}-->
              <div class="wzlist_imga"><img {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}"{echo getforumimg($comiis_pic_list[$thread_s['tid']]['aid'][0], '0', '200', '160')}"{if $comiis_app_switch['comiis_loadimg']} class="comiis_loadimages"{/if}></div>
            <!--{/if}-->
            <!--{if $thread_s['attachment'] == 2 && $comiis_pic_list[$thread_s['tid']]['num'] >= 3}-->
              <h2>{$thread_s[subject]}</h2>
              <div class="listimgs">
                <ul>
                <!--{loop $comiis_pic_list[$thread_s['tid']]['aid'] $temp}-->
                  <li><img {if $comiis_app_switch['comiis_loadimg']}src="./template/comiis_app/pic/none.png" comiis_loadimages={else}src={/if}"{echo getforumimg($temp, '0', '200', '160')}"{if $comiis_app_switch['comiis_loadimg']} class="comiis_loadimages"{/if}></li>
                <!--{/loop}-->
                </ul>
              </div>
            <!--{else}-->
              <div class="wzlist_info<!--{if $thread_s['attachment'] == 2}--> wzlist_infoa<!--{else}--> wzlist_infob<!--{/if}-->">
                <h2>{$thread_s[subject]}</h2>
              </div>
            <!--{/if}-->
            <div class="wzlist_bottom f_d"><em class="y">{$thread_s[views]}{$comiis_lang['view47']}</em><!--{if in_array($thread_s['displayorder'], array(1, 2, 3, 4))}--><span class="f_g">{$comiis_lang['thread_stick']}</span><!--{/if}--><!--{if $thread_s['digest'] > 0}--><span class="f_ok">{$comiis_lang['view42']}</span><!--{/if}-->{echo dgmdate($thread_s['dateline'], 'u')}</div>
            </a>
          </div>	
        </li>
      <!--{/if}-->
      <!--{/loop}-->          
    </ul>
  </div>
<!--{else}-->
  <div class="comiis_cnxh bg_f b_t b_b cl">
    <h2><!--{if $comiis_app_switch['comiis_view_cnxh_name']}-->{$comiis_app_switch['comiis_view_cnxh_name']}<!--{else}-->{lang related_thread}<!--{/if}--></h2>
      <ul class="cl">
      <!--{eval $n=0;$comiis_app_switch['comiis_view_cnxh_num'] = ($comiis_app_switch['comiis_view_cnxh_num'] ? $comiis_app_switch['comiis_view_cnxh_num'] : 5)}-->		  
      <!--{loop $post['relateitem'] $var}-->
      <!--{eval $n++;}-->
      <!--{if $n <= $comiis_app_switch['comiis_view_cnxh_num']}-->
      <li class="b_t"><a href="forum.php?mod=viewthread&tid=$var[tid]" title="$var[subject]"><i class="comiis_font f_d">&#xe60c;</i>$var[subject]</a></li>
      <!--{/if}-->
      <!--{/loop}-->
      </ul>
  </div>
<!--{/if}--> 