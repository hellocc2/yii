<?php
/**
 * @copyright (C)2014 Cenwor Inc.
 * @author Cenwor <www.cenwor.com>
 * @package php
 * @name getseller.mod.php
 * @date 2015-04-21 16:43:54
 */
 

class ModuleObject extends MasterObject
{
	var $Config = array(); 	var $ID;

	function ModuleObject(& $config){
		$this->MasterObject($config);
		$this->initMemberHandler();
		$this->ID=$this->Post['id']?(int)$this->Post['id']:(int)$this->Get['id'];
		Load::moduleCode($this);$this->Execute();
	}

	function Execute(){
		switch ($this->Code){
			case 'linkproduct':
				$this->Linkproduct();
				break;
			default:
				$this->Showseller();
				break;
		}
	}

	function Showseller(){
		$id=$this->Get['city'];
		$sql='SELECT `id`, `sellername` FROM '.TABLE_PREFIX.'tttuangou_seller where `enabled` = "true" and `area` = '.intval($id);
		$query = dbc()->Query($sql);
		$seller=$query->GetAll();
		if(empty($seller)){echo __('暂无商家');exit;}
		echo '<select name="sellerid" id="sellerid">';
		foreach($seller as $i => $value){
			echo '<option value="'.$value['id'].'"';
			if ($_GET['seller'] == $value['id'])
			{
			    echo ' selected="selected"';
			}
			echo '>'.$value['sellername'].'</option>';
		}
		echo ' </select>';
		exit;
	}

	function Linkproduct(){
		$html = '';
		$id = $this->Get['city'];
		if($id > 0){
			$sellers = dbc(DBCMax)->query("SELECT id,sellername FROM `".table('seller')."` WHERE `enabled`='true' AND `area` ='".intval($id)."'")->done();
		}
		if($sellers){
			foreach($sellers as $k => $v){
				$html .= '<option value="'.$v['id'].'">'.$v['sellername'].'</option>';
			}
		}else{
			$html .= '<option value="">请选择...</option>';
		}
		echo $html;
		exit;
	}
}
?>