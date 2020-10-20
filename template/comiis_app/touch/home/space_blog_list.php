<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{if $_GET['from']=='space'}-->
	<!--{template home/space_header}-->
<!--{else}-->
    <!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:{if $category || ($_GET[view] == 'me' && $classarr)}80{elseif $userlist}83{else}40{/if}px;"><div class="comiis_scrollTop_box"><!--{/if}-->
	<div class="comiis_topnv bg_f b_b">
		<ul class="comiis_flex">
			<li class="flex{if $actives[me]} f_0{/if}">{if $actives[me]}<em class="bg_0"></em>{/if}<a href="{if $_G['uid']}home.php?mod=space&do=blog&view=me{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}"{if !$actives[me]} class="f_c"{/if}>{lang my_blog}</a></li>
			<li class="flex{if $actives[we]} f_0{/if}">{if $actives[we]}<em class="bg_0"></em>{/if}<a href="{if $_G['uid']}home.php?mod=space&do=blog&view=we{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}"{if !$actives[we]} class="f_c"{/if}>{lang friend_blog}</a></li>        
			<li class="flex{if $actives[all]} f_0{/if}">{if $actives[all]}<em class="bg_0"></em>{/if}<a href="home.php?mod=space&do=blog&view=all"{if !$actives[all]} class="f_c"{/if}>{lang view_all}</a></li>
		</ul>
	</div>
	<!--{if $_GET[view] == 'all' && $category}-->
	<div class="comiis_top_sub">
		<div id="comiis_top_box" class="bg_f b_b">
			<div id="comiis_sub_btn">
				<ul class="swiper-wrapper">
                    <li class="swiper-slide"><a href="home.php?mod=space&do=blog&view=all"{if !$_GET[catid] && !$orderactives[hot]} class="f_0"{else} class="f_c"{/if}>{$comiis_lang['tip309']}</a></li>
					<li class="swiper-slide"><span class="comiis_tm">/</span><a href="home.php?mod=space&do=blog&view=all&order=hot"{if $orderactives[hot]} class="f_0"{else} class="f_c"{/if}>{$comiis_lang['view56']}</a></li>
					<!--{loop $category $value}-->
							<li class="swiper-slide"><span class="comiis_tm">/</span><a href="home.php?mod=space&do=blog&catid=$value[catid]&view=all&order=$_GET[order]"{if $_GET[catid]==$value[catid]} class="f_0"{else} class="f_c"{/if}>$value[catname]</a></li>
					<!--{/loop}-->
				</ul>
			</div>
		</div>
	</div>
	<script>
		new Swiper('#comiis_sub_btn', {
			freeMode : true,
			slidesPerView : 'auto',
			onTouchMove: function(swiper){
				Comiis_Touch_on = 0;
			},
			onTouchEnd: function(swiper){
				Comiis_Touch_on = 1;
			},
		});
	</script>
	<!--{/if}-->
    <!--{if $userlist}-->
    <div class="comiis_styli comiis_flex bg_f b_b">
        <div class="styli_tit f_c">{lang filter_by_friend}</div>
        <div class="flex comiis_input_style">
            <div class="comiis_login_select">
                <span class="inner">
                    <i class="comiis_font f_d">&#xe60c;</i>
                    <span class="z">
                        <span class="comiis_question f_c" id="fuidsel_name">{lang all_friends}</span>
                    </span>					
                </span>
                <select id="fuidsel" name="comiis">
                    <option value="">{lang all_friends}</option>
                    <!--{loop $userlist $value}-->
                    <option value="$value[fuid]"{$fuid_actives[$value[fuid]]}>$value[fusername]</option>
                    <!--{/loop}-->
                </select>
            </div>
        </div>
    </div>
    <!--{/if}-->
	<!--{if $_GET[view] == 'me' && $classarr}-->
	<div class="comiis_top_sub">
		<div id="comiis_top_box" class="bg_f b_b">
			<div id="comiis_sub_btn">
				<ul class="swiper-wrapper">
					<!--{eval $nn = 0;}-->					
					<!--{loop $classarr $classid $classname}-->
						<!--{eval $nn++;}-->
							<li class="swiper-slide"><!--{if $nn !=1}--><span class="comiis_tm">/</span><!--{/if}--><a href="home.php?mod=space&uid=$space[uid]&do=blog&classid=$classid&view=me"{if $_GET[classid]==$classid} class="f_0"{else} class="f_c"{/if}>$classname</a></li>
					<!--{/loop}-->
				</ul>
			</div>
		</div>
	</div>
	<script>
		new Swiper('#comiis_sub_btn', {
			freeMode : true,
			slidesPerView : 'auto',
			onTouchMove: function(swiper){
				Comiis_Touch_on = 0;
			},
			onTouchEnd: function(swiper){
				Comiis_Touch_on = 1;
			},
		});
	</script>
	<!--{/if}-->	
	<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
<!--{/if}-->
<!--{if $count}-->
	<!--{eval comiis_load('zysbGCQMXuggYx913U', 'list,stickflag,space,diymode,multi');}-->
<!--{else}-->
	<div class="comiis_notip comiis_sofa mt15 cl">
		<i class="comiis_font f_e cl">&#xe613;</i>
		<span class="f_d">{lang no_related_blog}</span>
	</div>
<!--{/if}-->
<!--{if $_GET['from']=='space'}-->
	<!--{if $space[uid] == $_G[uid]}-->
	<div class="cl" style="height:40px;"></div>
	<div class="comiis_space_footfb bg_f b_t">
		<a href="home.php?mod=spacecp&ac=blog"><i class="comiis_font f_wb">&#xe62d;</i><span class="f_b">{lang publish}{lang blog}</span></a>
	</div>
	<!--{else}-->
	<!--{template home/space_footer}-->
	<!--{/if}-->
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->