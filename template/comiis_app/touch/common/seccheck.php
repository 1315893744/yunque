<?PHP exit('Access Denied');?>
{eval
	$sechash = 'S'.random(4);
	$sectpl = !empty($sectpl) ? explode("<sec>", $sectpl) : array('<br />',': ','<br />','');	
	$ran = random(5, 1);
}
<!--{if $secqaacheck}-->
<!--{eval
	$message = '';
	$question = make_secqaa();
	$secqaa = lang('core', 'secqaa_tips').$question;
}-->
<!--{/if}-->
<!--{if $sectpl}-->
	<!--{if $secqaacheck}-->
		<div class="comiis_sec_txt b_b f_c cl">
		{lang secqaa}:
        $secqaa
		<input name="secqaahash" type="hidden" value="$sechash" />
        &nbsp;<input name="secanswer" id="secqaaverify_$sechash" type="text" class="comiis_px b_ok" />
        </div>
	<!--{/if}-->
	<!--{if $seccodecheck}-->
		<div class="comiis_sec_code b_t cl">
			<input name="seccodehash" type="hidden" value="$sechash" class="sechash" />
			<img src="misc.php?mod=seccode&update={$ran}&idhash={$sechash}&mobile=2" class="sec_code_img" />
			<input type="text" class="comiis_px vm" style="ime-mode:disabled;" autocomplete="off" value="" id="seccodeverify_$sechash" name="seccodeverify" placeholder="{lang seccode}" fwin="seccode">        
		</div>
	<!--{/if}-->
<!--{/if}-->
<script type="text/javascript">
	(function() {
		$('.sec_code_img').on('click', function() {
			$('#seccodeverify_$sechash').attr('value', '');
			var tmprandom = 'S' + Math.floor(Math.random() * 1000);
			$('.sechash').attr('value', tmprandom);
			$(this).attr('src', 'misc.php?mod=seccode&update={$ran}&idhash='+ tmprandom +'&mobile=2');
		});
	})();
</script>