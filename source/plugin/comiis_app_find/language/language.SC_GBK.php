<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
$comiis_app_find_lang = array(
	'01' => '新发现名称',
	'02' => '删除',
	'03' => '新栏目名称',
	'04' => '注意: 请把栏目图标上传到 <font color=red>source/plugin/comiis_app_find/ico/</font> 目录下，然后在下方图标输入处直接输入图标文件名即可',
	'05' => '使用说明',
	'06' => '图标',
	'07' => '简要说明',
	'08' => '首页显示',
	'09' => '四格横排样式',
	'10' => '单列竖排样式',
	'11' => '增加发现',
	'12' => '增加栏目',
	'13' => '更新成功',
);
$comiis_app_find_install_lang = "
insert into `pre_comiis_app_find` (`id`,`cid`,`displayor`,`name`,`url`,`icon`,`show`,`data`) values('18','10','11','查快递','http://m.kuaidi100.com','001.png','1','');
insert into `pre_comiis_app_find` (`id`,`cid`,`displayor`,`name`,`url`,`icon`,`show`,`data`) values('17','10','12','查天气','http://mse.360.cn/service/weather.html','036.png','1','');
insert into `pre_comiis_app_find` (`id`,`cid`,`displayor`,`name`,`url`,`icon`,`show`,`data`) values('16','10','9','114电话','#','072.png','1','');
insert into `pre_comiis_app_find` (`id`,`cid`,`displayor`,`name`,`url`,`icon`,`show`,`data`) values('15','10','4','积分商城','#','084.png','1','');
insert into `pre_comiis_app_find` (`id`,`cid`,`displayor`,`name`,`url`,`icon`,`show`,`data`) values('14','10','3','活动','#','041.png','1','');
insert into `pre_comiis_app_find` (`id`,`cid`,`displayor`,`name`,`url`,`icon`,`show`,`data`) values('13','10','2','新闻','#','033.png','1','');
insert into `pre_comiis_app_find` (`id`,`cid`,`displayor`,`name`,`url`,`icon`,`show`,`data`) values('12','10','1','签到','#','068.png','1','');
insert into `pre_comiis_app_find` (`id`,`cid`,`displayor`,`name`,`url`,`icon`,`show`,`data`) values('11','0','2','热点推荐','','','1','');
insert into `pre_comiis_app_find` (`id`,`cid`,`displayor`,`name`,`url`,`icon`,`show`,`data`) values('10','0','1','生活服务','','','0','');
insert into `pre_comiis_app_find` (`id`,`cid`,`displayor`,`name`,`url`,`icon`,`show`,`data`) values('19','10','5','房屋信息','#','087.png','1','');
insert into `pre_comiis_app_find` (`id`,`cid`,`displayor`,`name`,`url`,`icon`,`show`,`data`) values('20','10','7','招聘求职','#','085.png','1','');
insert into `pre_comiis_app_find` (`id`,`cid`,`displayor`,`name`,`url`,`icon`,`show`,`data`) values('21','10','6','二手闲置','#','091.png','1','');
insert into `pre_comiis_app_find` (`id`,`cid`,`displayor`,`name`,`url`,`icon`,`show`,`data`) values('22','10','8','聚划算','http://m.zhe800.com/m/list/baoyou?url_name=baoyou&category_name=9%E5%9D%979%E5%8C%85%E9%82%AE','054.png','0','');
insert into `pre_comiis_app_find` (`id`,`cid`,`displayor`,`name`,`url`,`icon`,`show`,`data`) values('23','10','10','查违章','http://chaweizhang.eclicks.cn/webapp/index?appid=10&sid=4hQKAQpRC5QE','035.png','1','');
insert into `pre_comiis_app_find` (`id`,`cid`,`displayor`,`name`,`url`,`icon`,`show`,`data`) values('24','11','15','随手拍','#','080.png','1','随手记录生活点滴');
insert into `pre_comiis_app_find` (`id`,`cid`,`displayor`,`name`,`url`,`icon`,`show`,`data`) values('25','11','13','找对象','#','097.png','1','七夕派对, 跟单身Say No!');
insert into `pre_comiis_app_find` (`id`,`cid`,`displayor`,`name`,`url`,`icon`,`show`,`data`) values('26','11','16','汽车','#','035.png','1','最全面的汽车资讯');
insert into `pre_comiis_app_find` (`id`,`cid`,`displayor`,`name`,`url`,`icon`,`show`,`data`) values('27','11','17','美食厨房','#','006.png','1','寻找大街小巷的美食');
insert into `pre_comiis_app_find` (`id`,`cid`,`displayor`,`name`,`url`,`icon`,`show`,`data`) values('28','11','14','情感','#','053.png','1','情感小树洞');
";