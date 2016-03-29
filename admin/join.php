<?php

/**
 * ECSHOP 记录申请商家管理
 * ============================================================================
 * * 版权所有 2005-2012 上海商派网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: liubo $
 * $Id: admin_logs.php 17217 2011-01-19 06:29:08Z liubo $
*/

define('IN_ECS', true);
require(dirname(__FILE__) . '/includes/init.php');

/* act操作项的初始化 */
if (empty($_REQUEST['act']))
{
    $_REQUEST['act'] = 'list';
}
else
{
    $_REQUEST['act'] = trim($_REQUEST['act']);
}

/*------------------------------------------------------ */
//-- 获取所有日志列表
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'list')
{

    $smarty->assign('ur_here',   '申请商家管理');
    $smarty->assign('full_page', 1);

    $joins_list = get_admin_joins();

    $smarty->assign('joins_list',      $joins_list['list']);
    $smarty->assign('filter',          $joins_list['filter']);
    $smarty->assign('record_count',    $joins_list['record_count']);
    $smarty->assign('page_count',      $joins_list['page_count']);

    $sort_flag  = sort_flag($log_list['filter']);
    $smarty->assign($sort_flag['tag'], $sort_flag['img']);

    assign_query_info();
    $smarty->display('join.htm');
}

/*------------------------------------------------------ */
//-- 排序、分页、查询
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'query')
{
    $joins_list = get_admin_joins();

    $smarty->assign('joins_list',        $joins_list['list']);
    $smarty->assign('filter',          $joins_list['filter']);
    $smarty->assign('record_count',    $joins_list['record_count']);
    $smarty->assign('page_count',      $joins_list['page_count']);

    $sort_flag  = sort_flag($log_list['filter']);
    $smarty->assign($sort_flag['tag'], $sort_flag['img']);

    make_json_result($smarty->fetch('join.htm'), '', array('filter' => $log_list['filter'], 'page_count' => $log_list['page_count']));
	
}

/*------------------------------------------------------ */
//-- 批量删除日志记录
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'batch_drop')
{


        $count = 0;
        foreach ($_POST['checkboxes'] AS $key => $id)
        {
            $sql = "DELETE FROM " .$ecs->table('joins'). " WHERE id = '$id'";
            $result = $db->query($sql);
            $count++;
        }
		$link[] = array('text' => '点击返回列表！', 'href' => 'join.php?act=list');
		sys_msg(sprintf('删除成功！', $count), 0, $link);
        
   
}

/* 获取管理员操作记录 */
function get_admin_joins()
{

    /* 获得总记录数据 */
    $sql = 'SELECT COUNT(*) FROM '.$GLOBALS['ecs']->table('joins');
    $filter['record_count'] = $GLOBALS['db']->getOne($sql);
    $filter = page_and_size($filter);
    /* 获取管理员日志记录 */
    $list = array();
    $sql  = 'SELECT * FROM ' .$GLOBALS['ecs']->table('joins'). ' ORDER by id desc';
    $res  = $GLOBALS['db']->selectLimit($sql, $filter['page_size'], $filter['start']);
    while ($rows = $GLOBALS['db']->fetchRow($res))
    {
		
		$str1 = $GLOBALS['db']->getOne('SELECT region_name FROM '.$GLOBALS['ecs']->table('region').'where region_id = '.$rows['province']);
		$str2 = $GLOBALS['db']->getOne('SELECT region_name FROM '.$GLOBALS['ecs']->table('region').'where region_id = '.$rows['city']);
		$str3 = $GLOBALS['db']->getOne('SELECT region_name FROM '.$GLOBALS['ecs']->table('region').'where region_id = '.$rows['district']);
		$rows['cts'] = $str1.'-'.$str2.'-'.$str3;
        $list[] = $rows;
    }

    return array('list' => $list, 'filter' => $filter, 'page_count' =>  $filter['page_count'], 'record_count' => $filter['record_count']);
}

?>