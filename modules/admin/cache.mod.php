<?php
/**
 * @copyright (C)2014 Cenwor Inc.
 * @author Cenwor <www.cenwor.com>
 * @package php
 * @name cache.mod.php
 * @date 2015-04-24 17:05:16
 */
 



class ModuleObject extends MasterObject
{

	
	function ModuleObject($config)
	{
		$this->MasterObject($config);

		Load::moduleCode($this);$this->Execute();
	}
	function Execute()
	{
		switch($this->Code)
		{

			default:
				$this->Main();
				break;
		}
	}
	function Main()
	{
		$this->CheckAdminPrivs('cache');
		$this->clearAll();
	}
	function clearAll()
	{
		$this->CheckAdminPrivs('cache');
		include(LIB_PATH.'io.han.php');
		$IO=new IoHandler();
		@$IO->ClearDir(CACHE_PATH);
		@$IO->ClearDir(ROOT_PATH . '/uc_client/data/cache/');
		
		dbc()->Query("DELETE FROM ".TABLE_PREFIX.'system_failedlogins', 'UNBUFFERED');
		dbc()->Query("DELETE FROM ".table('api_protocol'), 'UNBUFFERED');
		dbc()->Query("UPDATE ".table('members')." SET regdate=1355285532+uid*".rand(100, 1000)." WHERE regdate<1");
		dbc()->Query("UPDATE ".table('members')." SET regip=lastip WHERE regip=''");

		logic('phone')->clear_invalid();

		
		logic('gps')->init();

		dbc()->Query("DELETE FROM ".table('reports')." WHERE `data`<'1'", 'UNBUFFERED');

		
		
		
		
		$this->Messager("缓存已清空",null);
	}

}
?>