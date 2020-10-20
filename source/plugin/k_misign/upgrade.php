<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
$fromversion = $_GET['fromversion'];

$sqls = <<<EOF
CREATE TABLE IF NOT EXISTS pre_plugin_k_misign_bq (
  bid int(11) NOT NULL AUTO_INCREMENT,
  uid int(11) NOT NULL,
  lasttime int(11) NOT NULL,
  thistime int(11) NOT NULL,
  bqdays int(11) NOT NULL,
  PRIMARY KEY (bid),
  KEY uid (uid,lasttime,bqdays)
) ENGINE=MyISAM;
EOF;
runquery($sqls);	

$finish = TRUE;
?>
