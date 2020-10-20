<?php echo '';exit;?>
<!--{template common/header}-->
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:41px;">
<!--{/if}-->
<div class="comiis_topnv bg_f b_b">
	<ul class="comiis_flex">
        <li class="flex"><a href="home.php?mod=space&do=friend&type=near" class="f_c">{$comiis_lang['tip337']}</a></li>
		<li class="flex f_0"><em class="bg_0"></em><a href="home.php?mod=spacecp&ac=search&op=sex">{lang search_friend}</a></li>
	</ul>
</div>
<div id="ct" class="ct2_a wp cl">
	<div class="mn">


			<!--{if !empty($_GET['searchsubmit'])}-->
				<!--{if empty($list)}-->
			<div class="comiis_notip comiis_sofa mt15 cl">
            <i class="comiis_font f_e mt15 cl">&#xe613;</i>
            <span class="f_d">没有找到相关用户</span>
            <a href="home.php?mod=spacecp&ac=search&op=sex" class="bg_c f_f">换个搜索条件试试</a>
        </div>
				<!--{else}-->
			<div class="mt10 comiis_pltit bg_f b_b f14 cl">
            <h3><i class="comiis_font z f18 f_d">&#xe66c;</i><span class="f_d"><span class="f_c">列表最多显示100个，您可以</span></span><a href="home.php?mod=spacecp&ac=search&op=sex" class="f_ok">换个搜索条件试试</a></h3>
        </div>
					<!--{template home/space_list}-->
				<!--{/if}-->
			<!--{else}-->
				<div class="ptm scf">
				<!--{if $_GET['op'] == 'sex'}-->
				
					<div id="s_sex" class="bm bmn">
						<form action="home.php" method="get" accept-charset=utf-8>
							<table cellpadding="0" cellspacing="0" class="tfm">
								<!--{loop array('affectivestatus','lookingfor','zodiac','constellation') $key}-->
								<!--{if $fields[$key]}-->
								<tr>
									<th>{$fields[$key][title]}</th>
									<td>{$fields[$key][html]}</td>
								</tr>
								<!--{/if}-->
								<!--{/loop}-->
						
								
								<div class="comiis_input_style mt10 bg_f b_t">
                                                                                                                        <li class="comiis_styli comiis_flex b_b">
                <div class="styli_tit f_c">帐号</div>					
                <div class="flex">
				<input type="text" name="username" value="" placeholder="输入搜索用户名" class="comiis_input kmshow">
				
				
				</div>
            </li>
            <li class="comiis_styli comiis_flex b_b">
                <div class="styli_tit f_c">头像</div>					
                <div class="flex">
                    <input type="checkbox" id="avatarstatus_1" name="avatarstatus" value="1">
                    <label for="avatarstatus_1" style="width:100%;margin-right:5px;"><i class="comiis_font f_d"></i>有头像</label>
                </div>
            </li>
            <li class="comiis_flex comiis_styli b_b">
                <div class="styli_tit f_c">性别</div>
                <div class="flex">
                    <div class="comiis_login_select">
                        <span class="inner">
                            <i class="comiis_font f_d"></i>
                            <span class="z">
                                <span class="comiis_question" id="gender_name">不限</span>
                            </span>					
                        </span>
                        <select id="gender" name="gender">
                            <option value="0">不限</option>
                            <option value="1">男</option>
                            <option value="2">女</option>
                        </select>
                    </div>
                </div>
            </li>
            <li class="comiis_flex comiis_styli b_b">
                <div class="styli_tit f_c">年龄</div>
                <div class="flex"><input type="text" name="startage" value="" placeholder="岁" class="comiis_input kmshow"></div>
                <div class="f_c" style="padding:0 10px;">~</div>
                <div class="flex"><input type="text" name="endage" value="" placeholder="岁" class="comiis_input kmshow"></div>
            </li>
        </div>
			
						
							
								<tr>
									<th>&nbsp;</th>
							
									
									
									<div class="comiis_btnbox cl">
            <input type="hidden" name="searchsubmit" value="true">
            <button type="submit" class="comiis_btn bg_c f_f">搜索</button>
        </div>
					
									
								</tr>
							</table>
							<input type="hidden" name="op" value="$_GET[op]" />
							<input type="hidden" name="mod" value="spacecp" />
							<input type="hidden" name="ac" value="search" />
							<input type="hidden" name="type" value="base" />
						</form>
					</div>
					
					<!--{elseif $_GET['op'] == 'reside' }-->
					<h2>{lang seek_same_city}</h2>
					<div id="s_reside" class="bm bmn">
						<form action="home.php" method="get">
							<table cellpadding="0" cellspacing="0" class="tfm">
								<tr>
									<th>{lang reside_city}</th>
									<td id="residecitybox">$residecityhtml</td>
								</tr>
								<tr>
									<th>{lang username}</th>
									<td><input type="text" name="username" value="" class="px" /></td>
								</tr>
								<tr>
									<th>&nbsp;</th>
									<td>
										<input type="hidden" name="searchsubmit" value="true" />
										<button type="submit" class="pn"><em>{lang seek}</em></button>
									</td>
								</tr>
							</table>
							<input type="hidden" name="op" value="$_GET[op]" />
							<input type="hidden" name="mod" value="spacecp">
							<input type="hidden" name="ac" value="search">
							<input type="hidden" name="type" value="base">
						</form>
					</div>
					<!--{elseif $_GET['op'] == 'birth' }-->
					<h2>{lang seek_same_city_people}</h2>
					<div id="s_birth" class="bm bmn">
						<form action="home.php" method="get">
							<table cellpadding="0" cellspacing="0" class="tfm">
								<tr>
									<th>{lang birth_city}</th>
									<td id="birthcitybox">$birthcityhtml</td>
								</tr>
								<tr>
									<th>{lang username}</th>
									<td><input type="text" name="username" value="" class="px" /></td>
								</tr>
								<tr>
									<th>&nbsp;</th>
									<td>
										<input type="hidden" name="searchsubmit" value="true" />
										<button type="submit" class="pn"><em>{lang seek}</em></button>
									</td>
								</tr>
							</table>
							<input type="hidden" name="op" value="$_GET[op]" />
							<input type="hidden" name="mod" value="spacecp" />
							<input type="hidden" name="ac" value="search" />
							<input type="hidden" name="type" value="base" />
						</form>
					</div>
					<!--{elseif $_GET['op'] == 'birthyear' }-->
					<h2>{lang seek_same_birthday}</h2>
					<div id="s_birthyear" class="bm bmn">
						<form action="home.php" method="get">
							<table cellpadding="0" cellspacing="0" class="tfm">
								<tr>
									<th>{lang birthday}</th>
									<td>
										<select id="birthyear" name="birthyear" onchange="showbirthday();" class="ps">
											<option value="0">&nbsp;</option>
											$birthyeayhtml
										</select> {lang year}
										<select id="birthmonth" name="birthmonth" onchange="showbirthday();" class="ps">
											<option value="0">&nbsp;</option>
											$birthmonthhtml
										</select> {lang month}
										<select id="birthday" name="birthday" class="ps">
											<option value="0">&nbsp;</option>
											$birthdayhtml
										</select> {lang day}
									</td>
								</tr>
								<tr>
									<th>{lang username}</th>
									<td><input type="text" name="username" value="" class="px" /></td>
								</tr>
								<tr>
									<th>&nbsp;</th>
									<td>
										<input type="hidden" name="searchsubmit" value="true" />
										<button type="submit" class="pn"><em>{lang seek}</em></button>
									</td>
								</tr>
							</table>
							<input type="hidden" name="op" value="$_GET[op]" />
							<input type="hidden" name="mod" value="spacecp" />
							<input type="hidden" name="ac" value="search" />
							<input type="hidden" name="type" value="base" />
						</form>
					</div>
					<!--{elseif $_GET['op'] == 'edu' }-->
					<!--{if $fields['graduateschool'] || $fields['education']}-->
					<h2>{lang seek_classmate}</h2>
					<div id="s_edu" class="bm bmn">
						<form action="home.php" method="get">
							<table cellpadding="0" cellspacing="0" class="tfm">
								<!--{loop array('graduateschool','education') $key}-->
								<!--{if $fields[$key]}-->
								<tr>
									<th>{$fields[$key][title]}</th>
									<td>{$fields[$key][html]}</td>
								</tr>
								<!--{/if}-->
								<!--{/loop}-->
								<tr>
									<th>{lang username}</th>
									<td><input type="text" name="username" value="" class="px"></td>
								</tr>
								<tr>
									<th>&nbsp;</th>
									<td>
										<input type="hidden" name="searchsubmit" value="true" />
										<button type="submit" class="pn"><em>{lang seek}</em></button>
									</td>
								</tr>
							</table>
							<input type="hidden" name="op" value="$_GET[op]" />
							<input type="hidden" name="mod" value="spacecp" />
							<input type="hidden" name="ac" value="search" />
							<input type="hidden" name="type" value="edu" />
						</form>
					</div>
					<!--{/if}-->
					<!--{elseif $_GET['op'] == 'work' }-->
					<!--{if $fields['occupation'] || $fields['title']}-->
					<h2>{lang seek_colleague}</h2>
					<div id="s_work" class="bm bmn">
						<form action="home.php" method="get">
							<table cellpadding="0" cellspacing="0" class="tfm">
								<!--{loop array('occupation','title') $key}-->
								<!--{if $fields[$key]}-->
								<tr>
									<th>{$fields[$key][title]}</th>
									<td>{$fields[$key][html]}</td>
								</tr>
								<!--{/if}-->
								<!--{/loop}-->
								<tr>
									<th>{lang username}</th>
									<td><input type="text" name="username" value="" class="px" /></td>
								</tr>
								<tr>
									<th>&nbsp;</th>
									<td>
										<input type="hidden" name="searchsubmit" value="true" />
										<button type="submit" class="pn"><em>{lang seek}</em></button>
									</td>
								</tr>
							</table>
							<input type="hidden" name="op" value="$_GET[op]" />
							<input type="hidden" name="mod" value="spacecp" />
							<input type="hidden" name="ac" value="search" />
							<input type="hidden" name="type" value="work" />
						</form>
					</div>
					<!--{/if}-->
				<!--{else}-->

	
				<!--{/if}-->
				</div>
			<!--{/if}-->
	
	</div>


<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->
