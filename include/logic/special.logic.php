<?php
/**
 * @copyright (C)2014 Cenwor Inc.
 * @author Cenwor <www.cenwor.com>
 * @package php
 * @name special.logic.php
 * @date 2015-01-26 15:00:47
 */
 




class SpecialLogic {

	public function add($name) {
		if(false != ($one = self::get_one($name, 1))) {
			return $one['id'];
		}
		$data = array('name'=>$name, 'time'=>time(), 'display_order'=>'99', 'status'=>'0');
		$id = dbc(DBCMax)->insert('special')->data($data)->done();
		$this->_list_cache_clean();
		return $id;
	}

	public function del($id) {
		$id = (int) $id;
		if($id < 1) {
			return ;
		}
		$one = self::get_one($id);
		if(false == $one) {
			return ;
		}
		dbc(DBCMax)->delete('special')->where(array('id' => $id))->done();
		$this->_list_cache_clean();
	}

	public function set($data, $id = 0) {
		$id = ($id ? $id : $data['id']);
		$id = (int) $id;
		if($id < 1) {
			return ;
		}
		$one = self::get_one($id);
		if(false == $one) {
			return ;
		}
		if(isset($data['settings'])) {
			$data['settings'] = serialize($data['settings']);
		}
		unset($data['link'], $data['product_count']);
		if($data) {
			dbc(DBCMax)->update('special')->data($data)->where(array('id'=>$id))->done();
		}
		$this->_list_cache_clean();
	}

	public function get_one($id, $is_name = false) {
		$key = '';
		$val = '';
		if($is_name) {
			$key = 'name';
			$val = strip_tags($id);
		} else {
			$key = 'id';
			$val = max(0, (int) $id);
		}
		if($key && $val) {
			$one = dbc(DBCMax)->select('special')->where(array($key=>$val))->limit(1)->done();
			if($one) {
				$one['settings'] = unserialize($one['settings']);
				$one['link'] = $one['settings']['link'];
				$one['product_count'] = count($one['settings']['product']);				
				if($one['pic']) {
					$one['pic'] = ini('settings.site_url').str_replace('./', '/', $one['pic']);
				} else {
					$one['pic'] = ini('settings.site_url').'/static/images/special.png';
				}
			}
			return $one;
		} else {
			return false;
		}
	}

	public function get_all($filter = true, $limit = 0) {
		$rets = array();
		$key = "special/list_all";
		if(false === ($rets = fcache($key, 3600))) {
			$rets = dbc(DBCMax)->select('special')->order(' `display_order` DESC, `id` DESC ')->done();
			fcache($key, $rets);
		}
		if(true == $filter) {
			foreach($rets as $rk=>$r) {
				if(false == $r['status']) {
					unset($rets[$rk]);
				} else {
					$rets[$rk]['settings'] = unserialize($r['settings']);
					$rets[$rk]['link'] = $rets[$rk]['settings']['link'];
					if($rets[$rk]['pic']) {
						$rets[$rk]['pic'] = ini('settings.site_url').str_replace('./', '/', $rets[$rk]['pic']);
					} else {
						$rets[$rk]['pic'] = ini('settings.site_url').'/static/images/special.png';
					}
				}
			}
		}
		if($limit > 0 && $limit < count($_rets)) {
			$_rets = array();
			foreach($rets as $rk=>$r) {
				if(count($_rets) < $limit) {
					$_rets[] = $r;
				}
			}
			$rets = $_rets;
			unset($_rets);
		}
		return array_values($rets);
	}

	public function get_product($one, $offset=0, $length=0) {
		if(is_numeric($one)) {
			$one = self::get_one($one);
		}
		if($one['id'] < 1) {
			return array();
		}
		if('product' != $one['type']) {
			return array();
		}
		if(is_array($one['settings']['product'])) {
			$key = 'special/list_' . $one['id'];
			if(false === ($list = fcache($key, 600))) {
				foreach($one['settings']['product'] as $row) {
					$list[] = logic('product')->GetOne($row['id']);
				}
				fcache($key, $list);
			}
		}
		if($list) {
			if($length > 0) {
				return array_slice($list, $offset, $length);
			} else {
				return $list;
			}
		} else {
			return array();
		}
	}

	private function _list_cache_clean($id = 0) {
		fcache("special/list_all", 0);
		fcache("special/list_{$id}", 0);
		handler('io')->ClearDir(CACHE_PATH . 'fcache/special/');
	}

}