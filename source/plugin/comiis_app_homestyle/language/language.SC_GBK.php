<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$comiis_app_homestyle_lang = array(
	'124' => '<li>您可以通过 FTP 在 <font color=red>source/plugin/comiis_app_homestyle/image/home_bg/</font> 目录中创建背景分类目录并上传背景图片，然后刷新本页。</li><li>注意: 背景图片分类目录名只允许数字、26 个英文字母及下划线</li><li>推荐: 勾选推荐的图片将会在背景设置页面推荐栏目显示</li>',
	'125' => '使用说明',
	'126' => '背景图片设置 &nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;" onclick="show_all()">全部展开</a> | <a href="javascript:;" onclick="hide_all()">全部折叠</a>',
	'127' => '图标',
	'128' => '推荐',
	'129' => '更新',
	'130' => '新增',
	'64' => '更新成功',
	'65' => '更新出错',
	'66' => '请先登录再进行设置',
	'67' => '保存',
	'201' => '请登录再进行设置',
);
$comiis_app_homestyle_install_lang = "
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('1','1','风景','fengjing','0','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('2','1','华尔街','fengjing','fj001.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('3','2','城市余晖','fengjing','fj002.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('4','3','江城光彩','fengjing','fj003.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('5','4','清新早晨','fengjing','fj004.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('6','5','理想港湾','fengjing','fj005.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('7','6','晚霞','fengjing','fj006.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('8','7','都市节奏','fengjing','fj007.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('9','8','雄鹰展翅','fengjing','fj008.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('10','9','金色丽都','fengjing','fj009.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('11','10','热带风情','fengjing','fj010.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('12','11','孤桥','fengjing','fj011.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('13','12','夕阳佛塔','fengjing','fj012.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('14','13','微州古居','fengjing','fj013.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('15','14','晨雾渔家','fengjing','fj014.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('16','15','旭日东升','fengjing','fj015.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('17','3','静物','jingwu','0','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('18','25','倾听心声','jingwu','jw001.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('19','26','草莓','jingwu','jw002.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('20','27','品位酸甜','jingwu','jw003.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('21','28','游乐场','jingwu','jw004.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('22','29','香浓甜饮','jingwu','jw005.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('23','30','清淡如茶','jingwu','jw006.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('24','31','往事如烟','jingwu','jw007.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('25','32','倒影','jingwu','jw008.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('26','33','唯美','jingwu','jw009.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('27','6','卡通','katong','0','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('28','52','小黄鸭','katong','kt001.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('29','53','鱼跃','katong','kt002.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('68','57','红帽子','katong','kt006.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('66','56','飞翔','katong','kt005.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('65','55','星空','katong','kt004.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('64','54','小花荡秋千','katong','kt003.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('34','4','萌','meng','0','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('35','34','童年梦想','meng','m001.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('36','35','童话奇遇','meng','m002.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('37','36','花粟鼠','meng','m003.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('38','37','童年回忆','meng','m004.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('39','38','眷恋夕阳','meng','m005.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('40','39','风雨无阻','meng','m006.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('41','40','小浣熊','meng','m007.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('42','41','大象司机','meng','m008.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('43','42','新生','meng','m009.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('44','2','时尚','shishang','0','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('45','16','假面女孩','shishang','ss001.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('46','17','红唇','shishang','ss002.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('47','18','日光倾城','shishang','ss003.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('48','19','红唇诱惑','shishang','ss004.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('49','20','酒吧旋律','shishang','ss005.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('50','21','糖果女孩','shishang','ss006.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('51','22','绚丽街景','shishang','ss007.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('52','23','点缀','shishang','ss008.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('53','24','光影殿堂','shishang','ss009.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('54','5','田园','tianyuan','0','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('55','43','淡雅花香','tianyuan','ty001.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('56','44','清凉小调','tianyuan','ty002.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('57','45','白色飞羽','tianyuan','ty003.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('58','46','花间漫步','tianyuan','ty004.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('59','47','向日花丛','tianyuan','ty005.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('60','48','熏衣香草','tianyuan','ty006.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('61','49','雨露微凉','tianyuan','ty007.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('62','50','清新淡雅','tianyuan','ty008.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('63','51','春晨曙光','tianyuan','ty009.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('69','7','喜庆','xiqing','0','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('70','58','喜庆舞狮','xiqing','xq001.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('71','59','金猪贺岁','xiqing','xq002.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('72','60','2019贺岁','xiqing','xq003.jpg','1');
";