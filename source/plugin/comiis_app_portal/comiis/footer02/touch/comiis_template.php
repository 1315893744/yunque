<?PHP exit('Access Denied');?>
<style>
.comiis_mh_foot_h {display:block;height:48px;overflow:hidden}
.comiis_mh_foot_m {position:fixed;display:block;z-index:211;left:0;right:0;bottom:0;width:100%;height:48px}
.comiis_mh_foot_m li {float:left;height:48px;text-align:center;overflow:hidden}
.comiis_mh_foot_m li a {display:block;height:48px;margin:0 auto;overflow:hidden}
.comiis_mh_foot_m li a i {display:block;width:24px;height:24px;line-height:24px;font-size:24px;margin:4px auto 0;position:relative}
.comiis_mh_foot_m li a i.foot_btn {width:48px;padding:5px 0;text-align:center;height:24px;line-height:24px;font-size:24px;margin:7px auto 0;border-radius:2px}
.comiis_mh_foot_m li a i.foot_btns {width:48px;padding:5px 0;text-align:center;height:24px;line-height:24px;font-size:24px;margin:7px auto 0}
.comiis_mh_foot_m li a span {display:block;height:16px;line-height:16px;font-size:calc(21px/2);overflow:hidden;font-weight: 300}
.comiis_mh_foot_m li a span.icon_msgs {position:absolute;display:block;width:8px;height:8px;top:-1px;right:-3px;z-index:105;border:1px solid #ffffff;border-radius:50%}
.comiis_mh_foot_m li.comiis_fbigbtn {overflow:visible;position:relative}
.comiis_mh_foot_m li.comiis_fbigbtn a {position:absolute;bottom:0px;left:calc(50% - 30px);width:60px;height:60px;border-radius:50%;overflow:visible}
.comiis_mh_foot_m li.comiis_fbigbtn a em {display:block;position:absolute;bottom:0px;left:calc(50% - 30px);z-index:100;width:60px;height:60px;border-radius:50%}
.comiis_mh_foot_m li.comiis_fbigbtn a span {display:block;position:absolute;bottom:-1px;left:calc(50% - 30px);z-index:110;width:44px;height:62px;line-height:62px;padding:0 9px;border-radius:50%}
.comiis_mh_foot_m li.comiis_fbigbtn a span i.foot_btn {width:44px;height:44px;line-height:44px;border-radius:50%;padding:0;margin-top:8px}
</style>
<div class="comiis_mh_foot_h"></div>
<div id="comiis_mh_foot_box">
    <div id="comiis_mh_foot_m" class="comiis_mh_foot_m bg_f b_t">
        <ul class="comiis_flex">
            {$comiis['summary']}
        </ul>
    </div>
</div>