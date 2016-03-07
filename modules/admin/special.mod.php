<?php
/**
 * @copyright (C)2014 Cenwor Inc.
 * @author Cenwor <www.cenwor.com>
 * @package php
 * @name special.mod.php
 * @date 2015-04-21 16:43:55
 */
 


class ModuleObject extends MasterObject {

	public function ModuleObject( $config ) {
		$this->MasterObject($config);
		$runCode = Load::moduleCode($this);
		$this->$runCode();
	}

	public function Main() {
		$this->CheckAdminPrivs('special');

		$list = logic('special')->get_all(false);

		include handler('template')->file('@admin/special');
	}

	public function add() {
		$this->CheckAdminPrivs('special');
		
		$name = post('name', 'txt');
		if(empty($name)) {
			$name = get('name', 'txt');
		}
		if(empty($name)) {
			$this->Messager('专题名称不能为空');
		}
		$ret = logic('special')->add($name);
		if(is_numeric($ret) && $ret > 0) {
			$this->Messager('专题添加成功，现在为您转入编辑页面', 'admin.php?mod=special&code=set&id=' . $ret);
		} else {
			$this->Messager($ret);
		}
	}

	public function del() {
		$this->CheckAdminPrivs('special');

		$id = get('id', 'int');
		if($id < 1) {
			$this->Messager('请指定一个专题ID');
		}
		logic('special')->del($id);
		$this->Messager('删除成功', 'admin.php?mod=special');
	}

	public function set() {
		$this->CheckAdminPrivs('special');

		$id = get('id', 'int');
		if($id < 1) {
			$id = post('id', 'int');
		}
		if($id < 1) {
			$this->Messager('请指定一个专题ID');
		}
		$one = logic('special')->get_one($id);
		if(false == $one) {
			$this->Messager('专题已经不存在了');
		}
		if(post('dosubmit')) {
			$data = post('one');
			if('product' == $data['type']) {
				$data['settings']['product'] = $this->_product_reorder($data['settings']['product']);
			}
			if(isset($_FILES['picfile']) && is_array($_FILES['picfile']) && $_FILES['picfile']['name']) {
				$data['pic'] = UPLOAD_PATH . 'special/'.$id.'.{$EXT}';
				$r = logic('upload')->save('picfile', $data['pic']);
				if($r['error']) {
					$this->Messager($r['msg']);
				} else {
					$data['pic'] = $r['path'];
				}
			}
			logic('special')->set($data, $id);
			$this->Messager('设置成功了', 'admin.php?mod=special');
		}

		include handler('template')->file('@admin/special_set');
	}

	public function product_Ajax() {
		$this->CheckAdminPrivs('special');

		$id = post('id', 'int');
		if($id < 1) {
			exit('专题ID不能为空');
		}
		$one = logic('special')->get_one($id);
		if(false == $one) {
			exit('专题已经不存在了');
		}
		$act = post('act', 'txt');
		$method = '_product_' . $act;
		if($act && method_exists($this, $method)) {
			echo $this->$method($one);
		} else {
			exit('act is invalid');
		}
		exit;
	}
	private function _product_search($one) {
		$name = post('name', 'txt');
		if(empty($name)) {
			return '请输入搜索关键词';
		}
		$time = time();
		$query = dbc()->query("select `id`, `name`, `intro`, `flag` from ".table('product')." 
			where 
				saveHandler = 'normal' AND 
				begintime < $time AND overtime > $time AND 
				(`name` like '%{$name}%' OR `intro` like '%{$name}%' OR `flag` like '%{$name}%') 
			order by `order` DESC, `id` desc limit 50");
		$html = '';
		while(false != ($row = $query->GetRow())) {
			$html .= "<div><label><input onclick=\"product_search_onclick('{$row[id]}')\" type=\"checkbox\" id=\"product_search_{$row[id]}\" value=\"{$row[id]}\" /> &nbsp; <span id=\"product_search_name_{$row[id]}\">{$row['name']}</span></label></div>";
		}
		return ($html ? $html : '没有搜索到任何产品信息，请换个关键词重新进行搜索！');
	}
	private function _product_add($one) {
		$pid = post('pid', 'int');
		$order = post('order', 'int');
		$this->_product_settings($one, $pid, $order, 'add');
	}
	private function _product_del($one) {
		$pid = post('pid', 'int');
		$this->_product_settings($one, $pid, 0, 'del');
	}
	private function _product_edit($one) {		
		$pid = post('pid', 'int');
		$order = post('order', 'int');
		$this->_product_settings($one, $pid, $order, 'edit');
	}
	private function _product_settings($one, $pid, $order, $act) {
		$product = $one['settings']['product'];
		$pn = logic('product')->GetOne($pid);
		if(false == $pn) {
			return ;
		}
		settype($product, 'array');
		foreach($product as $k=>$row) {
			if($pid == $row['id']) {
				unset($product[$k]);
			}
		}
		if('del' != $act) {
			$product[] = array('id'=>$pid, 'order'=>$order, 'name'=>$pn['name']);
		}
		$one['settings']['product'] = $this->_product_reorder($product);
		logic('special')->set(array('settings'=>$one['settings']), $one['id']);
	}
	private function _product_reorder($product) {
		usort($product, create_function('$a,$b', 'return ($a[order]==$b[order]?0:($a[order]<$b[order]?1:-1));'));
		return $product;
	}

}