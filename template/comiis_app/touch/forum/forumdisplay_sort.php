<?PHP exit('Access Denied');?>
<!--{if ($comiis_app_switch[comiis_flxx_list] == 1 || $comiis_app_switch[comiis_flxx_view] == 1) && $comiis_app_switch[comiis_flxx_css]}-->
<style>
  {echo strip_tags($comiis_app_switch[comiis_flxx_css]);}
</style>
<!--{/if}-->
<!--{eval comiis_load('e5UBArHMXahUX31H32', 'sorttemplate,var,comiis_flxx_color_n');}-->