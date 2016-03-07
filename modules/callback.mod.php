<?php

/**
 * 模块：通知回调接口
 * @copyright (C)2011 Cenwor Inc.
 * @author Moyo <dev@uuland.org>
 * @package module
 * @name callback.mod.php
 * @version 1.0
 */

class ModuleObject extends MasterObject
{
	function ModuleObject( $config )
	{
		$this->MasterObject($config);
		$runCode = Load::moduleCode($this);
		$this->$runCode();
	}
	
	
	
	function Main()
	{
	    
		$pid = get('pid');
		$pid || $pid = post('pid');
		$pid || exit($this->Ends());
		preg_match('/^[a-z0-9]+$/i', $pid) || exit($this->Ends());
		
		# 1、获取支付方式
		$payment = logic('pay')->GetOne($pid);
		$payment || exit($this->Ends());
		# 2、进行支付校验
 		$status = logic('pay')->Verify($payment);
 		$status || exit($this->Ends());
 		# 3、获取交易信息
		$trade = logic('pay')->TradeData($payment);
		$trade || exit($this->Ends());
				if ($payment['code'] == 'alipay' || $payment['code'] == 'tenpay')
		{
			if (ini('payment.lp.enabled'))
			{
				if (MEMBER_ID)
				{
										header('Location: '.rewrite('index.php?mod=buy&code=order&op=process&sign='.$trade['sign']));
					exit;
				}
			}
		}
		# 4、订单后续处理
		$parserAPI = logic('callback')->Parser($trade);
		$parserAPI->MasterIframe($this);

		if(false === logic('order')->is_virtual_order($trade['sign'])) {
						preg_match('/^[a-z_]+$/i', $status) || exit($this->Ends());
	 		$code = 'Parse_'.$status;
	 		method_exists($parserAPI, $code) || exit($this->Ends());
	 		$parserAPI->$code($payment);
		} else {
						$parserAPI->Virtual_Order_Process($payment, $trade, $status);
		}
	}
	function Main_bak()
	{
		$pid = get('pid');
		$pid || $pid = post('pid');
		$pid || exit($this->Ends());
		preg_match('/^[a-z0-9]+$/i', $pid) || exit($this->Ends());
		
		$payment = logic('pay')->GetOne($pid);
		$payment || exit($this->Ends());
		$sign = post('sign',number);
		#订单分解，如果是虚拟订单，分解为子订单数组
		$orders = logic('order')->getAllOrdersByOrderid($sign);
		$orders || exit($this->Ends());
		
		$parserAPI = logic('callback')->Parser($sign);
		$parserAPI->MasterIframe($this);
		foreach($orders as $order)
		{
		    $status = logic('pay')->Verify($payment,$order['orderid']);
		    $status || exit($this->Ends());
		    preg_match('/^[a-z_]+$/i', $status) || exit($this->Ends());
		    $statusArray[$order['orderid']] = $status;
		    $codeArray[$order['orderid']] = 'Parse_'.$status;
		    method_exists($parserAPI, $codeArray[$order['orderid']]) || exit($this->Ends());
		    #存在VERIFY_FAILED状态订单，跳转到个人订单列表中心
		        
		}    
		debug($codeArray);
		
		
		#订单合法性检查
		foreach ($orders as $order)
		{
		    $trade = logic('pay')->TradeData($payment,$order['orderid']);
		    $trade || exit($this->Ends());
		    		    $order = logic('order')->_TMP_Payed($trade, $payment);
		    if(isset($order['false']))
		        $parserAPI->$codeArray[$order['orderid']]($payment,$order['orderid']);
		        
		}
		
		
				if ($payment['code'] == 'alipay' || $payment['code'] == 'tenpay')
		{
			if (ini('payment.lp.enabled'))
			{
				if (MEMBER_ID)
				{
										header('Location: '.rewrite('index.php?mod=buy&code=order&op=process&sign='.$sign));
					exit;
				}
			}
		}

		#订单合法性检查
		foreach ($orders as $order)
		{
		    $error = false;
		    $trade = logic('pay')->TradeData($payment,$order['orderid']);
		    $trade || exit($this->Ends());
		    $order = logic('order')->_TMP_Payed($trade, $payment);
		    		    $r = $parserAPI->$codeArray[$order['orderid']]($payment,$order['orderid']);
		    if($r !== false)
		        $error[] = $r;
		    
		    $this->Messager($error?implode(',', $error):__('订单已经提交，我们会尽快为您准备发货！'), '?mod=me&code=order');
		}
		$parserAPI->$codeArray[$order['orderid']]($payment,$sign);
	}
	private function Ends()
	{
		echo 'woo.^_^.oow';
	}
}

?>