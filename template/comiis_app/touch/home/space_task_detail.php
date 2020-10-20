<?PHP exit('Access Denied');?>
<div class="comiis_notice_list comiis_task_list">
    <ul>
        <li class="cl">
            <span class="notice_img"><img src="$task[icon]" class="vm"></span>              
            <h2 class="f16">$task[name]</h2>
            <div class="ntc_bodys">
				<!--{if $task[period]}-->
					<p class="f_a f12">
					<!--{if $task[periodtype] == 0}-->
						{lang task_period_hour}
					<!--{elseif $task[periodtype] == 1}-->
						{lang task_period_day}
					<!--{elseif $task[periodtype] == 2}-->
						<!--{eval $periodweek = $_G['lang']['core']['weeks'][$task[period]];}-->
						{lang task_period_week}
					<!--{elseif $task[periodtype] == 3}-->
						{lang task_period_month}
					<!--{/if}-->
					</p>
				<!--{/if}-->
                <p class="f_c f14">$task[description]</p>
            </div>
        </li>        
    </ul>				
</div>
<div class="b_b cl">
    <div class="comiis_task_view b_t">
        <p class="f_a{if !$task['endtime']} mb5{/if}">
        <!--{if $task['reward'] == 'credit'}-->
            {lang task}{lang task_reward}: {lang credits} $_G['setting']['extcredits'][$task[prize]][title] $task[bonus] $_G['setting']['extcredits'][$task[prize]][unit]
        <!--{elseif $task['reward'] == 'magic'}-->
            {lang task}{lang task_reward}: {lang magics_title} $task[rewardtext] $task[bonus] {lang magics_unit}
        <!--{elseif $task['reward'] == 'medal'}-->
            {lang task}{lang task_reward}: {lang medals} $task[rewardtext] <!--{if $task['bonus']}-->{lang expire} $task[bonus] {lang days} <!--{/if}-->
        <!--{elseif $task['reward'] == 'invite'}-->
            {lang task}{lang task_reward}: {lang invite_code} $task[prize] {lang expire} $task[bonus] {lang days}
        <!--{elseif $task['reward'] == 'group'}-->
            {lang task}{lang task_reward}: {lang usergroup} $task[rewardtext] <!--{if $task['bonus']}--> $task[bonus] {lang days} <!--{/if}-->
        <!--{else}-->
            {lang task}{lang task_reward}: {lang nothing}
        <!--{/if}-->
        </p>
        <!--{if $task['endtime']}--><p class="f_g f12 mb10">{lang task_endtime}</p><!--{/if}-->
        <!--{if $task['viewmessage']}-->
            <div class="mb15">$task[viewmessage]</div>
        <!--{else}-->
            <p><strong>{lang task_complete_condition}</strong></p>
            <!--{if $taskvars['complete']}-->
                <!--{loop $taskvars['complete'] $taskvar}-->
                    <p>$taskvar[name] : $taskvar[value]</p>
                <!--{/loop}-->
            <!--{else}-->
                <p>{lang unlimited}</p>
            <!--{/if}-->
        <!--{/if}-->
        <p><strong>{lang task_apply_condition}</strong></p>
        <!--{if $task[applyperm] || $task[relatedtaskid] || $task[tasklimits] || $taskvars['apply']}-->
            <p><!--{if $task[grouprequired]}-->{lang usergroup}: $task[grouprequired] <!--{elseif $task['applyperm'] == 'member'}-->{lang task_general_users}<!--{elseif $task['applyperm'] == 'admin'}-->{lang task_admins}<!--{/if}--></p>
            <!--{if $task[relatedtaskid]}--><p>{lang task_relatedtask}: <a href="home.php?mod=task&do=view&id=$task[relatedtaskid]" class="f_0">$_G['taskrequired']</a></p><!--{/if}-->
            <!--{if $task[tasklimits]}--><p>{lang task_numlimit}: $task[tasklimits]</p><!--{/if}-->
            <!--{if $taskvars['apply']}-->
                <!--{loop $taskvars['apply'] $taskvar}-->
                    <p>$taskvar[name]: $taskvar[value]</p>
                <!--{/loop}-->
            <!--{/if}-->
        <!--{else}-->
            <p>{lang unlimited}</p>
        <!--{/if}-->              
        <!--{if $allowapply == '-1'}-->
            <div class="comiis_poll_list mt15 cl">
                <ul>
                    <li class="poll_ok kmnop cl">
                        <span class="bg_b f_f" style="width:100%;"><em class="bg_c" style="width:{if $task[csc]}$task[csc]%{else}2%{/if};"></em><font class="{if $task[csc] > 2}f_f{else}f_c{/if}">{lang task_complete} {$task[csc]}%</font></span>                    
                    </li>
                </ul>
            </div>
            <p class="mt12 cl">
                <a href="home.php?mod=task&do=draw&id=$task[taskid]" class="comiis_task_btns{if $task[csc] >=100} bg_a f_f{else} bg_b f_c{/if}">{$comiis_lang['tip272']}</a>
                <!--{if $task[csc] < 100}--><a href="home.php?mod=task&do=delete&id=$task[taskid]" class="dialog comiis_task_btns bg_0 f_f">{lang task_quit}</a><!--{/if}-->   
            </p>
        <!--{elseif $allowapply == '-2'}-->
            <p class="f_a mt10">{lang task_group_nopermission}</p>
            <p class="mt12 cl">
                <a href="javascript:;" onclick="popup.open('{lang task_group_nopermission}','alert');" class="comiis_task_btns bg_0 f_f">{lang task_group_nopermission}</a>
            </p>
        <!--{elseif $allowapply == '-3'}-->
            <p class="f_a mt10">{lang task_applies_full}</p>
            <p class="mt12 cl">
                <a href="javascript:;" onclick="popup.open('{lang task_applies_full}','alert');" class="comiis_task_btns bg_0 f_f">{lang task_applies_full}</a>
            </p>
        <!--{elseif $allowapply == '-4'}-->
            <p class="f_a mt10">{lang task_lose_on}$task[dateline]</p>
        <!--{elseif $allowapply == '-5'}-->
            <p class="f_a mt10">{lang task_complete_on}$task[dateline]</p>
        <!--{elseif $allowapply == '-6'}-->
            <p class="f_a mt10">{lang task_complete_on}$task[dateline] &nbsp; {$task[t]}{lang task_applyagain}</p>
            <p class="mt12 cl">
                <a href="javascript:;" onclick="popup.open('{$task[t]}{lang task_applyagain}','alert');" class="comiis_task_btns bg_0 f_f">{lang task_applies_full}</a>
            </p>
        <!--{elseif $allowapply == '-7'}-->
            <p class="f_a mt10">{lang task_lose_on}$task[dateline] &nbsp; {$task[t]}{lang task_reapply}</p>
            <p class="mt12 cl">
                <a href="javascript:;" onclick="popup.open('{$task[t]}{lang task_reapply}','alert');" class="comiis_task_btns bg_0 f_f">{lang task_applies_full}</a>
            </p>
        <!--{elseif $allowapply == '2'}-->
            <p class="f_a mt10">{lang task_complete_on}$task[dateline] &nbsp; {lang task_applyagain_now}</p>
        <!--{elseif $allowapply == '3'}-->
            <p class="f_a mt10">{lang task_lose_on}$task[dateline] &nbsp; {lang task_reapply_now}</p>
        <!--{/if}-->
        <!--{if $allowapply > '0'}-->
            <p class="mt12 cl">
                <a href="home.php?mod=task&do=apply&id=$task[taskid]" class="dialog comiis_task_btns bg_0 f_f">{lang task_newbie_apply}</a>
            </p>
        <!--{/if}-->
    </div>
</div>
<!--{if $task[applicants]}-->
<div class="styli_h10 bg_e b_b"></div>
<div class="comiis_uibox cl">
    <h2 class="b_b"><i class="comiis_font f_d">&#xe629;</i>{lang task_applicants}</h2>
    <div id="ajaxparter"></div>
    <script type="text/javascript">ajaxget('home.php?mod=task&do=parter&id=$task[taskid]', 'ajaxparter');</script>
</div>
<!--{/if}-->