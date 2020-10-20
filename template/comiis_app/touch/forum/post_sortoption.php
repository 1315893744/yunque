<?PHP exit('Access Denied');?>
<!--{eval comiis_load('ZTZ8h7397r7Z0hRfi8', 'forum_optionlist');}-->
<div class="comiis_input_style">
<input type="hidden" name="selectsortid" size="45" value="$_G['forum_selectsortid']" />
<!--{if $_G['forum']['threadsorts']['expiration'][$_G['forum_selectsortid']]}-->
	<li class="comiis_styli comiis_flex b_b">
		<div class="styli_tit f_c">{lang threadtype_expiration}</div>
		<div class="flex">
			<div class="comiis_login_select">
				<span class="inner">
					<i class="comiis_font f_d">&#xe60c;</i>
					<span class="z">
						<span class="comiis_question" id="typeexpiration_name"></span>
					</span>					
				</span>
				<select name="typeexpiration" tabindex="1" id="typeexpiration">
					<option value="259200">{lang three_days}</option>
					<option value="432000">{lang five_days}</option>
					<option value="604800">{lang seven_days}</option>
					<option value="2592000">{lang one_month}</option>
					<option value="7776000">{lang three_months}</option>
					<option value="15552000">{lang half_year}</option>
					<option value="31536000">{lang one_year}</option>
				</select>
			</div>	
		</div>
		<!--{if $_G['forum_optiondata']['expiration']}--><div class="styli_r f_d" style="font-size:12px;">{lang valid_before}: $_G[forum_optiondata][expiration]</div><!--{/if}-->
	</li>
<!--{/if}-->
<!--{eval comiis_load('ygkht5KTd0HBcMG8Cp', 'swfconfig,member_profile');}-->
</div>