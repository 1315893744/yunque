<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_plugin_k_misign_level extends discuz_table{
	public function __construct() {

		$this->_table = 'plugin_k_misign_level';
		$this->_pk    = 'lid';

		parent::__construct();
	}
	
	public function fetch_all_cp($start = 0, $limit = 30) {
		return DB::fetch_all('SELECT * FROM %t ORDER BY leveldays ASC LIMIT %d, %d', array($this->table, $start, $limit), $this->_pk);
	}
	
	public function fetch_all($start = 0, $limit = 30) {
		return DB::fetch_all('SELECT * FROM %t WHERE status=1 ORDER BY leveldays ASC LIMIT %d, %d', array($this->table, $start, $limit));
	}
	
	public function fetch_by_days($days) {
		return DB::fetch_first('SELECT * FROM %t WHERE days < %d ORDER BY leveldays DESC', array($this->table, $days));
	}
}

?>