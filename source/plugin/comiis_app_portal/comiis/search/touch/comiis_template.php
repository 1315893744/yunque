<?PHP exit('Access Denied');?>
<style>
.comiis_mh_search {padding:12px;overflow:hidden;}
.comiis_mh_search .ssbox {display:block;width:100%;padding:0 6px;height:30px;line-height:30px;font-size:14px;border-radius:3px;box-sizing:border-box;-webkit-appearance:none;-moz-appearance:none;-o-appearance:none;appearance:none;}
.comiis_mh_search .ssct {text-align:center;}
.comiis_mh_search .ssbox i {font-size:14px;}
.comiis_mh_search ul {position:relative;}
.comiis_mh_search ul a.ssclose {position:absolute;top:3px;right:57px;}
.comiis_mh_search .comiis_ssstyle {float:left;height:28px;line-height:28px;border-right:0px !important;overflow:hidden;border-radius:2px 0 0 2px;}
.comiis_mh_search .comiis_login_select {margin-top:3px;height:22px;line-height:22px;padding-right:6px;}
.comiis_mh_search .comiis_login_select .inner .z {margin:1px 5px 0 6px;font-size:14px;}
.comiis_mh_search .comiis_login_select .inner i {font-size:12px;padding-top:0;line-height:22px;}
.comiis_search_two .ssbtn {background:none;border:none;float:right;height:28px;line-height:28px;font-size:14px;margin-left:5px;padding:0 8px;overflow:hidden;border-radius:2px;}
</style>
<form id="searchform_{$data['id']}" class="searchform" method="post" autocomplete="off" action="search.php?mod=forum">
    <input type="hidden" name="formhash" value="{FORMHASH}">
    <input type="hidden" name="searchsubmit" value="yes">
    <div class="comiis_mh_search cl">
        <div id="comiis_search_noe_{$data['id']}" style="display: block;"><a href="javascript:comiis_search_show_{$data['id']}(1);" class="ssbox ssct b_ok bg_e f_d"><i class="comiis_mhfont f_d">&#xe622</i> {$comiis_portal['search_h']}</a></div>
        <div id="comiis_search_two_{$data['id']}" style="display: none;" class="comiis_search_two">
            <ul class="comiis_flex">
                <div class="comiis_ssstyle bg_e b_ok">
                    <div class="comiis_login_select comiis_input_style b_r">
                        <span class="inner">
                            <i class="comiis_mhfont f_d">&#xe620</i>
                            <span class="z"><span class="comiis_question f_c" id="comiis_ssbox_style_name">{$comiis_portal['search_b']}</span></span>					
                        </span>
                        <select id="comiis_ssbox_style" onchange="comiis_search_{$data['id']}()">
                        <!--{if $_G['setting']['search']['forum']['status']}-->
                            <option value="forum" selected="selected">{$comiis_portal['search_b']}</a></option>
                        <!--{/if}-->
                        <!--{if $_G['setting']['search']['portal']['status']}-->
                            <option value="portal">{$comiis_portal['search_c']}</a></option>
                        <!--{/if}-->
                        <!--{if $_G['setting']['search']['blog']['status']}-->
                            <option value="blog">{$comiis_portal['search_d']}</a></option>
                        <!--{/if}-->
                        <!--{if $_G['setting']['search']['album']['status']}-->
                            <option value="album">{$comiis_portal['search_e']}</a></option>
                        <!--{/if}-->
                        <!--{if $_G['setting']['search']['group']['status']}-->
                            <option value="group">{$comiis_portal['search_f']}</a></option>
                        <!--{/if}-->
                        <option value="user">{$comiis_portal['search_u']}</option>
                        </select>
                    </div>
                </div>
                <input value="" type="search" name="srchtxt" id="scform_srchtxt_{$data['id']}" placeholder="{$comiis_portal['search_i']}..." class="ssbox b_ok bg_e f_c flex" style="border-left:0px !important;border-radius:0 2px 2px 0;">
                <a href="javascript:comiis_search_show_{$data['id']}(0);" class="ssclose bg_e f_d"><i class="comiis_mhfont">&#xe647</i></a>
                <button type="submit" id="scform_submit" value="true" class="ssbtn bg_c f_f">{$comiis_portal['search_g']}</button>
            </ul>
        </div>
    </div>	
    <script>
    function comiis_search_show_{$data['id']}(a){
        if(a == 1){
            $('#comiis_search_noe_{$data['id']}').hide();
            $('#comiis_search_two_{$data['id']}').show()
            $('#scform_srchtxt_{$data['id']}').focus();
        }else{
            $('#comiis_search_two_{$data['id']}').hide();
            $('#comiis_search_noe_{$data['id']}').show();
        }
    }
    function comiis_search_{$data['id']}(){
        $('#searchform_{$data['id']}').attr('action', 'search.php?mod='+$('#comiis_ssbox_style').children('option:selected').val());
    }
    </script>
</form>