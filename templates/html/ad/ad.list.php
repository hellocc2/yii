<?php

/**
 * 广告位列表
 * @copyright (C)2011 Cenwor Inc.
 * @author Moyo <dev@uuland.org>
 * @package ad
 * @name ad.list.php
 * @version 1.0
 */

return array(
	'howdo' => array (
		'mod_id' => 1,
		'name' => '首页单图广告位',
		'enabled' => false,
		'config' => array (
			'image' => '',
			'linker' => 'javascript:;',
			'close_allow' => 'no',
			'auto_hide_time' => '5',
			'auto_hide_allow' => 'on',
			'reshow_delay_time' => '1'
		)
	),
	'howdot' => array(
		'mod_id' => 2,
		'name' => '首页两图广告位',
		'enabled' => false,
		'config' => array(
			'list' => array (
			)
		)
	),
	'howdof' => array(
		'mod_id' => 3,
		'name' => '首页四图广告位',
		'enabled' => false,
		'config' => array(
			'list' => array (
			)
		)
	),
	'howdos' => array(
		'mod_id' => 4,
		'name' => '首页七图广告位',
		'enabled' => false,
		'config' => array(
			'list' => array (
			)
		)
	),
	'howdom' => array(
		'mod_id' => 5,
		'name' => '首页多图轮换广告位',
		'enabled' => false,
		'config' => array(
			'list' => array (
			),
			'dsp' => array (
				'time' => '3',
				'switchPath' => 'left',
				'showText' => 'false',
				'showButtons' => 'true',
			),
		)
	),
	'howdow' => array(
		'mod_id' => 7,
		'name' => '顶部多图轮换广告位',
		'enabled' => false,
		'config' => array(
			'list' => array (
			),
			'dsp' => array (
				'time' => '3',
				'switchPath' => 'left',
				'showText' => 'false',
				'showButtons' => 'true',
				'canClose' => 'false',
				'displayAll' => 'false',
			),
		)
	),
	'howd0api' => array(
		'mod_id' => 8,
		'name' => '客户端首页多图广告位',
		'enabled' => false,
		'config' => array(
			'list' => array (
			),
			'dsp' => array (
				'api' => 1,
				'time' => 3,
			),
		),
	),
	'howparallel' => array(
		'mod_id' => 6,
		'name' => '首页对联广告位',
		'enabled' => false,
		'config' => array(
			'list' => array (
			)
		)
	),
);

?>