<?PHP exit('Access Denied');?>
<!--{if $tasklist}-->
    <div class="comiis_notice_list comiis_task_list">
        <ul>
            <!--{loop $tasklist $task}-->
            <li class="b_b cl">
                <a href="home.php?mod=task&do=view&id=$task[taskid]" class="notice_img"><img src="$task[icon]" width="64" height="64" alt="$task[name]" /></a>
                <!--{if $_GET['item'] == 'new'}-->
                    <!--{if $task['noperm']}-->
                        <a href="javascript:;" onclick="popup.open('{lang task_group_nopermission}','alert');" class="comiis_block"><span class="comiis_task_btn bg_0 f_f">{$comiis_lang['tip274']}</span></a>
                    <!--{elseif $task['appliesfull']}-->
                        <a href="javascript:;" onclick="popup.open('{lang task_applies_full}','alert');" class="comiis_block"><span class="comiis_task_btn bg_0 f_f">{$comiis_lang['tip274']}</span></a>
                    <!--{else}-->
                        <a href="home.php?mod=task&do=apply&id=$task[taskid]" class="dialog comiis_block"><span class="comiis_task_btn bg_0 f_f">{$comiis_lang['tip274']}</span></a>
                    <!--{/if}-->
                <!--{elseif $_GET['item'] == 'doing'}-->
                    <a href="home.php?mod=task&do=draw&id=$task[taskid]" class="comiis_block"><span class="comiis_task_btn{if $task[csc] >=100} bg_a f_f{else} bg_b f_c{/if}">{$comiis_lang['tip272']}</span></a>
                <!--{/if}-->
                <!--{if $actives[done]}--><a href="home.php?mod=task&do=view&id=$task[taskid]" class="comiis_block"><span class="comiis_task_btn bg_0 f_f">{$comiis_lang['all19']}</span></a><!--{/if}-->
                <h2 class="f16"><a href="home.php?mod=task&do=view&id=$task[taskid]" class="comiis_block">$task[name]</a></h2>
                <div class="ntc_bodys">                       
                    <!--{if $_GET['item'] == 'new' && $task['noperm']}-->
                        <p class="f_a f13">{lang task_group_nopermission}</p>
                    <!--{else}-->
                        <p class="f_a f13">        
                        <!--{if $task['reward'] == 'credit'}-->
                            {$comiis_lang['tip273']}{lang credits} $_G['setting']['extcredits'][$task[prize]][title] $task[bonus] $_G['setting']['extcredits'][$task[prize]][unit]
                        <!--{elseif $task['reward'] == 'magic'}-->
                            {$comiis_lang['tip273']}{lang magics_title} $listdata[$task[prize]] $task[bonus] {lang magics_unit}
                        <!--{elseif $task['reward'] == 'medal'}-->
                            {$comiis_lang['tip273']}{lang medals} $listdata[$task[prize]] <!--{if $task['bonus']}-->{lang expire} $task[bonus] {lang days} <!--{/if}-->
                        <!--{elseif $task['reward'] == 'invite'}-->
                            {lang invite_code} $task[prize] {lang expire} $task[bonus] {lang days}
                        <!--{elseif $task['reward'] == 'group'}-->
                            {$comiis_lang['tip273']}{lang usergroup} $listdata[$task[prize]] <!--{if $task['bonus']}--> $task[bonus] {lang days} <!--{/if}-->
                        <!--{/if}-->
                        </p>
                    <!--{/if}-->      
                    <!--{if $actives[done]}--><p class="f_d f13">{lang task_complete_on} $task[dateline]</p><!--{else}--><p class="f_d f13">$task[description]</p><!--{/if}-->              
                    <!--{if $_GET['item'] == 'doing'}-->
                    <div class="comiis_poll_list mb5 cl">
                        <ul>
                            <li class="poll_ok kmnop cl">
                               <span class="bg_b f_f" style="width:100%;"><em class="bg_c" style="width:{if $task[csc]}$task[csc]%{else}2%{/if};"></em><font class="{if $task[csc] > 2}f_f{else}f_c{/if}">{lang task_complete} {$task[csc]}%</font></span>
                            </li>
                        </ul>
                    </div>
                    <!--{/if}-->
                </div>
            </li>
            <!--{/loop}-->
        </ul>					
    </div>
<!--{else}-->
    <div class="comiis_notip comiis_sofa cl">
        <i class="comiis_font f_e mt15 cl">&#xe613;</i>
        <span class="f_d"><!--{if $_GET['item'] == 'new'}-->{lang task_nonew}<!--{elseif $_GET['item'] == 'doing'}-->{lang task_nodoing}<!--{else}-->{lang data_nonexistence}<!--{/if}--></span>
    </div>
<!--{/if}-->