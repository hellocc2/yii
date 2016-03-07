<?php
/**
 * @copyright (C)2014 Cenwor Inc.
 * @author Cenwor <www.cenwor.com>
 * @package php
 * @name hongbao.mod.php
 * @date 2015-04-21 16:43:55
 */
 


class ModuleObject extends MasterObject {

	public function ModuleObject( $config ) {
		$this->MasterObject($config);

		if($config['api_version'] < 1 || false == file_exists(INCLUDE_PATH . 'api/func/loader.php')) {
			$this->Messager('该功能仅对企业永久版（企业金牌套餐、企业至尊套餐）用户开放，如需使用，可联系客服咨询升级套餐版本事宜。客服QQ：800058566', null);
		}

		$runCode = Load::moduleCode($this);
		$this->$runCode();
	}

	public function Main() {
		$this->CheckAdminPrivs('hongbao');

		$data = logic('hongbao')->get();

		include handler('template')->file('@admin/hongbao');
	}

	public function save() {
		$this->CheckAdminPrivs('hongbao');
		
		if(false != ($ret = logic('hongbao')->save(post('data')))) {
			$this->Messager($ret);
		} else {
			$this->Messager('设置成功', 'admin.php?mod=hongbao');
		}
	}

	
	public function log() {
		;
	}

}