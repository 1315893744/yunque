<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$comiis_app_homestyle_lang = array(
	'124' => '<li>您可以通過 FTP 在 <font color=red>source/plugin/comiis_app_homestyle/image/home_bg/</font> 目錄中創建背景分類目錄並上傳背景圖片，然後刷新本頁。</li><li>注意: 背景圖片分類目錄名只允許數字、26 個英文字母及下劃線</li><li>推薦: 勾選推薦的圖片將會在背景設置頁面推薦欄目顯示</li>',
	'125' => '使用說明',
	'126' => '背景圖片設置 &nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;" onclick="show_all()">全部展開</a> | <a href="javascript:;" onclick="hide_all()">全部折疊</a>',
	'127' => '圖標',
	'128' => '推薦',
	'129' => '更新',
	'130' => '新增',
	'64' => '更新成功',
	'65' => '更新出錯',
	'66' => '請先登錄再進行設置',
	'67' => '保存',
	'201' => '請登錄再進行設置',
);
$comiis_app_homestyle_install_lang = "
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('1','1','風景','fengjing','0','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('2','1','華爾街','fengjing','fj001.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('3','2','城市余暉','fengjing','fj002.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('4','3','江城光彩','fengjing','fj003.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('5','4','清新早晨','fengjing','fj004.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('6','5','理想港灣','fengjing','fj005.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('7','6','晚霞','fengjing','fj006.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('8','7','都市節奏','fengjing','fj007.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('9','8','雄鷹展翅','fengjing','fj008.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('10','9','金色麗都','fengjing','fj009.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('11','10','熱帶風情','fengjing','fj010.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('12','11','孤橋','fengjing','fj011.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('13','12','夕陽佛塔','fengjing','fj012.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('14','13','微州古居','fengjing','fj013.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('15','14','晨霧漁家','fengjing','fj014.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('16','15','旭日東升','fengjing','fj015.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('17','3','靜物','jingwu','0','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('18','25','傾听心聲','jingwu','jw001.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('19','26','草莓','jingwu','jw002.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('20','27','品位酸甜','jingwu','jw003.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('21','28','游樂場','jingwu','jw004.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('22','29','香濃甜飲','jingwu','jw005.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('23','30','清淡如茶','jingwu','jw006.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('24','31','往事如煙','jingwu','jw007.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('25','32','倒影','jingwu','jw008.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('26','33','唯美','jingwu','jw009.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('27','6','卡通','katong','0','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('28','52','小黃鴨','katong','kt001.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('29','53','魚躍','katong','kt002.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('68','57','紅帽子','katong','kt006.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('66','56','飛翔','katong','kt005.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('65','55','星空','katong','kt004.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('64','54','小花蕩秋千','katong','kt003.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('34','4','萌','meng','0','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('35','34','童年夢想','meng','m001.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('36','35','童話奇遇','meng','m002.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('37','36','花粟鼠','meng','m003.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('38','37','童年回憶','meng','m004.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('39','38','眷戀夕陽','meng','m005.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('40','39','風雨無阻','meng','m006.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('41','40','小浣熊','meng','m007.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('42','41','大象司機','meng','m008.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('43','42','新生','meng','m009.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('44','2','時尚','shishang','0','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('45','16','假面女孩','shishang','ss001.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('46','17','紅唇','shishang','ss002.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('47','18','日光傾城','shishang','ss003.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('48','19','紅唇誘惑','shishang','ss004.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('49','20','酒吧旋律','shishang','ss005.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('50','21','糖果女孩','shishang','ss006.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('51','22','絢麗街景','shishang','ss007.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('52','23','點綴','shishang','ss008.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('53','24','光影殿堂','shishang','ss009.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('54','5','田園','tianyuan','0','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('55','43','淡雅花香','tianyuan','ty001.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('56','44','清涼小調','tianyuan','ty002.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('57','45','白色飛羽','tianyuan','ty003.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('58','46','花間漫步','tianyuan','ty004.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('59','47','向日花叢','tianyuan','ty005.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('60','48','燻衣香草','tianyuan','ty006.jpg','1');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('61','49','雨露微涼','tianyuan','ty007.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('62','50','清新淡雅','tianyuan','ty008.jpg','0');
insert  into `pre_comiis_app_home`(`id`,`displayorder`,`name`,`dir`,`img`,`recommend`) values ('63','51','春晨曙光','tianyuan','ty009.jpg','0');
";