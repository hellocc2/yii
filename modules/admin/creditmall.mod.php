<?php
/**
 * @copyright (C)2014 Cenwor Inc.
 * @author Cenwor <www.cenwor.com>
 * @package php
 * @name creditmall.mod.php
 * @date 2015-01-26 15:00:47
 */
 


class ModuleObject extends MasterObject {

	public function ModuleObject( $config ) {
		$this->MasterObject($config);

		if($config['api_version'] < 1 || false == file_exists(INCLUDE_PATH . 'api/func/loader.php')) {
			$this->Messager('该功能仅对企业永久版（企业金牌套餐、企业至尊套餐）用户开放，如需使用，可联系客服咨询升级套餐版本事宜。客服QQ：800058566', null);
		}
		
		$runCode = Load::moduleCode($this);
		$this->CheckAdminPrivs('creditmall');
		$this->$runCode();
	}

	public function Main() {
		if(false != ($conf = post('conf'))) {
			ini('creditmall', $conf);
			$this->Messager('设置成功', 'admin.php?mod=creditmall');
		}

		$conf = ini('creditmall');

		include handler('template')->file('@admin/creditmall');
	}

	public function goods_list() {
		$list = logic('creditmall')->goods()->get_list($params);

		include handler('template')->file('@admin/creditmall_goods_list');
	}

	public function goods_info() {
		$id = (int) $_REQUEST['id'];
		if($id > 0) {
			$info = logic('creditmall')->goods()->get_one($id);
			if($info['expire']) {
				$info['expire'] = date('Y-m-d', $info['expire']);
			}
			if(false == $info) {
				$this->Messager('商品已经不存在了');
			}
		}

		if(false != ($data = post('info'))) {
			if($_FILES['imagefile']['name']) {
				$data['image'] = UPLOAD_PATH . 'creditmall/{$Y}-{$M}/{$HASH}.{$EXT}';
				$r = logic('upload')->save('imagefile', $data['pic']);
				if($r['error']) {
					$this->Messager($r['msg']);
				} else {
					$data['image'] = $r['path'];
				}
			}

			$data['total'] = (int) $data['total'];
			if($data['total'] < 1) {
				$this->Messager('请设置商品的库存数');
			}
			$data['price'] = round($data['price']);
			if($data['price'] <= 0) {
				$this->Messager('请设置商品兑换所需要的积分');
			}
			$data['expire'] = ($data['expire'] ? strtotime($data['expire']) : 0);
			$data['dateline'] = time();
			if($id > 0) {
				logic('creditmall')->goods()->update($data, $id);
			} else {
				logic('creditmall')->goods()->save($data);
			}

			$this->Messager('操作成功了', 'admin.php?mod=creditmall&code=goods&op=list');
		}


		include handler('template')->file('@admin/creditmall_goods_info');
	}

	public function goods_delete() {
		$id = get('id', 'int');
		if($id < 1) {
			$this->Messager('请指定一个要删除的商品ID');
		}

		logic('creditmall')->goods()->delete($id);

		$this->Messager('删除成功');
	}

	public function order_list() {
		$list = logic('creditmall')->order()->get_list($params);

		include handler('template')->file('@admin/creditmall_order_list');
	}

	public function order_status() {
		$id = post('id', 'int');
		$status = post('status', 'int');
		if($id < 1) {
			exit('order id is empty');
		}
		$one = logic('creditmall')->order()->get_one($id);
		if(false == $one) {
			exit('order id is invalid');
		}
		if(false == in_array($status, array(0, 1, 2))) {
			exit('order status is invalid');
		}
		if($status != $one['status']) {
			logic('creditmall')->order()->status($status, $id);
		}
	}

}