<?php
/**
 * @copyright (C)2014 Cenwor Inc.
 * @author Cenwor <www.cenwor.com>
 * @package php
 * @name credit.logic.php
 * @date 2015-01-26 15:00:47
 */
 


class CreditLogic
{
	public function get_list_for_me($uid){
		$sql = "SELECT * FROM ". table('credit') ." WHERE uid='". (int)$uid ."' ORDER BY id DESC";
		$sql = page_moyo($sql);
		$res = dbc(DBCMax)->query($sql)->done();
		if( $res ){
			return $res;
		}else{
			return array();
		}
	}

	public function add_score($pid=0,$uid=0,$score=0,$type='buy',$share=''){
		$info = '';
		if(!in_array($type,array('buy','reply','forward', 'signin', 'mall'))){
			$type='buy';
		}
		if($type != 'buy'){
			$set_scores = ini('credits.config');
			$score = (int)$set_scores[$type];
		}
		$products = dbc(DBCMax)->select('product')->in('name')->where('`id`='. (int)$pid)->limit(1)->done();
		if($products['name']){
			if($type == 'buy'){
				$info = '购买产品：'.$products['name'];
			}elseif($type == 'reply'){
				$info = '评论产品：'.$products['name'];
			}elseif($type == 'forward' && $share && $uid > 0){
				$chx = dbc(DBCMax)->select('credit')->where(array('uid'=>$uid,'pid'=>$pid,'type'=>'forward'))->limit(1)->done();
				if(!$chx){
					$info = '分享产品：'.$products['name'].' 到：'.$share;
				}
			}
		}
		self::log($uid, $score, $info, $type, $pid);
	}

	public function log($uid, $score, $info, $type, $pid = 0) {
		$uid = (int) $uid;
		$score = (float) $score;
		$pid = (int) $pid;
		if($uid > 0 && $score != 0 && $info) {
			$info .= '<br />当前积分：' . user($uid)->get('scores');
			$data = array(
				'uid'  => $uid,
				'pid'  => $pid,
				'info' => $info,
				'score'=> $score,
				'type' => $type,
				'gettime' => time(),
			);
			dbc(DBCMax)->insert('credit')->data($data)->done();
			dbc(DBCMax)->update('members')->data('scores=scores+'.$score)->where('uid='.$uid)->done();
		}
	}
}
?>