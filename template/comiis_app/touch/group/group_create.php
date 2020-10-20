<?PHP exit('Access Denied');?>
<!--{if $_G['setting']['groupmod'] || $_G['group']['buildgroupcredits']}-->
<div class="comiis_p12 bg_f b_b cl">
  <div class="comiis_quote bg_h f_a cl" style="margin:0;">
  {$comiis_group_lang['005']}{$comiis_group_lang['001']}, {$comiis_lang['post50']}<br>
  <!--{if $_G['setting']['groupmod']}-->{$comiis_group_lang['004']}{$comiis_group_lang['005']}{$comiis_group_lang['001']}, {lang group_create_mod}<!--{/if}-->
  <!--{if $_G['group']['buildgroupcredits']}--><!--{if $_G['setting']['groupmod']}-->, <!--{else}-->{$comiis_group_lang['004']}{$comiis_group_lang['001']}<!--{/if}-->{$comiis_lang['post48']} $_G['group']['buildgroupcredits'] $_G['setting']['extcredits'][$creditstransextra]['unit']{$_G['setting']['extcredits'][$creditstransextra]['title']}<!--{/if}-->
  </div>
</div>
<!--{/if}-->
<form method="post" autocomplete="off" name="groupform" id="groupform" action="forum.php?mod=group&action=create">
  <input type="hidden" name="formhash" value="{FORMHASH}" />
  <input type="hidden" name="referer" value="{echo dreferer()}" />
  <input type="hidden" name="handlekey" value="creategroup" />
  <input type="hidden" value="comiis_group_handles" name="handlekey" />
  <style type="text/css">
    #returnmessage4 {display:none;}
    #returnmessage4.onerror {display:block;}
  </style>
  <!--{eval comiis_load('eabZvAjmHBbIQ333Sq', 'comiis_group_lang,groupselect');}-->
  <div class="comiis_btnbox">
    <input type="hidden" name="createsubmit" value="true">
    <button type="submit"  class="formdialog comiis_btn bg_c f_f" vcomiis='handle'>{lang create}</button>
  </div>
</form>
<!--{eval comiis_load('PeHzhxrZhC3VeaECBA', 'comiis_group_lang');}-->
<!--{eval $comiis_foot = 'no';}-->