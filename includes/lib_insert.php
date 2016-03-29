<?php

/**
 * ECSHOP 动态内容函数库
 * ============================================================================
 * * 版权所有 2005-2012 上海商派网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: liubo $
 * $Id: lib_insert.php 17217 2011-01-19 06:29:08Z liubo $
*/

if (!defined('IN_ECS'))
{
    die('Hacking attempt');
}

/**
 * 获得查询次数以及查询时间
 *
 * @access  public
 * @return  string
 */
function insert_query_info()
{
    if ($GLOBALS['db']->queryTime == '')
    {
        $query_time = 0;
    }
    else
    {
        if (PHP_VERSION >= '5.0.0')
        {
            $query_time = number_format(microtime(true) - $GLOBALS['db']->queryTime, 6);
        }
        else
        {
            list($now_usec, $now_sec)     = explode(' ', microtime());
            list($start_usec, $start_sec) = explode(' ', $GLOBALS['db']->queryTime);
            $query_time = number_format(($now_sec - $start_sec) + ($now_usec - $start_usec), 6);
        }
    }

    /* 内存占用情况 */
    if ($GLOBALS['_LANG']['memory_info'] && function_exists('memory_get_usage'))
    {
        $memory_usage = sprintf($GLOBALS['_LANG']['memory_info'], memory_get_usage() / 1048576);
    }
    else
    {
        $memory_usage = '';
    }

    /* 是否启用了 gzip */
    $gzip_enabled = gzip_enabled() ? $GLOBALS['_LANG']['gzip_enabled'] : $GLOBALS['_LANG']['gzip_disabled'];

    $online_count = $GLOBALS['db']->getOne("SELECT COUNT(*) FROM " . $GLOBALS['ecs']->table('sessions'));

    /* 加入触发cron代码 */
    $cron_method = empty($GLOBALS['_CFG']['cron_method']) ? '<img src="api/cron.php?t=' . gmtime() . '" alt="" style="width:0px;height:0px;" />' : '';

    return sprintf($GLOBALS['_LANG']['query_info'], $GLOBALS['db']->queryCount, $query_time, $online_count) . $gzip_enabled . $memory_usage . $cron_method;
}

/**
 * 调用浏览历史
 *
 * @access  public
 * @return  string
 */
function insert_history()
{
    $str = '';
    if (!empty($_COOKIE['ECS']['history']))
    {
        $where = db_create_in($_COOKIE['ECS']['history'], 'goods_id');
        $sql   = 'SELECT goods_id, goods_name, goods_thumb, shop_price FROM ' . $GLOBALS['ecs']->table('goods') .
                " WHERE $where AND is_on_sale = 1 AND is_alone_sale = 1 AND is_delete = 0";
        $query = $GLOBALS['db']->query($sql);
        $res = array();
        while ($row = $GLOBALS['db']->fetch_array($query))
        {
            $goods['goods_id'] = $row['goods_id'];
            $goods['goods_name'] = $row['goods_name'];
            $goods['short_name'] = $GLOBALS['_CFG']['goods_name_length'] > 0 ? sub_str($row['goods_name'], $GLOBALS['_CFG']['goods_name_length']) : $row['goods_name'];
            $goods['goods_thumb'] = get_image_path($row['goods_id'], $row['goods_thumb'], true);
            $goods['shop_price'] = price_format($row['shop_price']);
            $goods['url'] = build_uri('goods', array('gid'=>$row['goods_id']), $row['goods_name']);
            $str.='<dl><dt><a target="_blank" href="'.$goods['url'].'"> <img class="B_blue" src="'.$goods['goods_thumb'].'"> </a> </dt><dd><p><a target="_blank" href="'.$goods['url'].'">'.$goods['short_name'].'</a> </p><span>￥'.$goods['shop_price'].'</span></dd></dl>';
        }
    }
    return $str;
}

/**
 * 调用购物车信息
 *
 * @access  public
 * @return  string
 */
function insert_cart_info()
{
    $sql = 'SELECT SUM(goods_number) AS number, SUM(goods_price * goods_number) AS amount' .
           ' FROM ' . $GLOBALS['ecs']->table('cart') .
           " WHERE session_id = '" . SESS_ID . "' AND rec_type = '" . CART_GENERAL_GOODS . "'";
    $row = $GLOBALS['db']->GetRow($sql);

    if ($row)
    {
        $number = intval($row['number']);
        $amount = floatval($row['amount']);
    }
    else
    {
        $number = 0;
        $amount = 0;
    }

    //$str = sprintf($GLOBALS['_LANG']['cart_info'], $number, price_format($amount, false));

    return '<a href="flow.php" title="' . $GLOBALS['_LANG']['view_cart'] . '">我的购物车<span id="good_cart">' . $number . '</span>件</a>';
}

/**
 * 调用指定的广告位的广告
 *
 * @access  public
 * @param   integer $id     广告位ID
 * @param   integer $num    广告数量
 * @return  string
 */
function insert_ads($arr)
{
    static $static_res = NULL;

    $time = gmtime();
    if (!empty($arr['num']) && $arr['num'] != 1)
    {
        $sql  = 'SELECT a.ad_id, a.position_id, a.media_type, a.ad_link, a.ad_code, a.ad_name, p.ad_width, ' .
                    'p.ad_height, p.position_style, RAND() AS rnd ' .
                'FROM ' . $GLOBALS['ecs']->table('ad') . ' AS a '.
                'LEFT JOIN ' . $GLOBALS['ecs']->table('ad_position') . ' AS p ON a.position_id = p.position_id ' .
                "WHERE enabled = 1 AND start_time <= '" . $time . "' AND end_time >= '" . $time . "' ".
                    "AND a.position_id = '" . $arr['id'] . "' " .
                'ORDER BY rnd LIMIT ' . $arr['num'];
        $res = $GLOBALS['db']->GetAll($sql);
    }
    else
    {
        if ($static_res[$arr['id']] === NULL)
        {
            $sql  = 'SELECT a.ad_id, a.position_id, a.media_type, a.ad_link, a.ad_code, a.ad_name, p.ad_width, '.
                        'p.ad_height, p.position_style, RAND() AS rnd ' .
                    'FROM ' . $GLOBALS['ecs']->table('ad') . ' AS a '.
                    'LEFT JOIN ' . $GLOBALS['ecs']->table('ad_position') . ' AS p ON a.position_id = p.position_id ' .
                    "WHERE enabled = 1 AND a.position_id = '" . $arr['id'] .
                        "' AND start_time <= '" . $time . "' AND end_time >= '" . $time . "' " .
                    'ORDER BY rnd LIMIT 1';
            $static_res[$arr['id']] = $GLOBALS['db']->GetAll($sql);
        }
        $res = $static_res[$arr['id']];
    }
    $ads = array();
    $position_style = '';

    foreach ($res AS $row)
    {
        if ($row['position_id'] != $arr['id'])
        {
            continue;
        }
        $position_style = $row['position_style'];
        switch ($row['media_type'])
        {
            case 0: // 图片广告
                $src = (strpos($row['ad_code'], 'http://') === false && strpos($row['ad_code'], 'https://') === false) ?
                        DATA_DIR . "/afficheimg/$row[ad_code]" : $row['ad_code'];
                $ads[] = "<a href='affiche.php?ad_id=$row[ad_id]&amp;uri=" .urlencode($row["ad_link"]). "'
                target='_blank'><img src='$src' width='" .$row['ad_width']. "' height='$row[ad_height]'
                border='0' /></a>";
                break;
            case 1: // Flash
                $src = (strpos($row['ad_code'], 'http://') === false && strpos($row['ad_code'], 'https://') === false) ?
                        DATA_DIR . "/afficheimg/$row[ad_code]" : $row['ad_code'];
                $ads[] = "<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" " .
                         "codebase=\"http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0\"  " .
                           "width='$row[ad_width]' height='$row[ad_height]'>
                           <param name='movie' value='$src'>
                           <param name='quality' value='high'>
                           <embed src='$src' quality='high'
                           pluginspage='http://www.macromedia.com/go/getflashplayer'
                           type='application/x-shockwave-flash' width='$row[ad_width]'
                           height='$row[ad_height]'></embed>
                         </object>";
                break;
            case 2: // CODE
                $ads[] = $row['ad_code'];
                break;
            case 3: // TEXT
                $ads[] = "<a href='affiche.php?ad_id=$row[ad_id]&amp;uri=" .urlencode($row["ad_link"]). "'
                target='_blank'>" .htmlspecialchars($row['ad_code']). '</a>';
                break;
        }
    }
    $position_style = 'str:' . $position_style;

    $need_cache = $GLOBALS['smarty']->caching;
    $GLOBALS['smarty']->caching = false;

    $GLOBALS['smarty']->assign('ads', $ads);
    $val = $GLOBALS['smarty']->fetch($position_style);

    $GLOBALS['smarty']->caching = $need_cache;

    return $val;
}

/**
 * 调用会员信息
 *
 * @access  public
 * @return  string
 */
function insert_member_info()
{
    $need_cache = $GLOBALS['smarty']->caching;
    $GLOBALS['smarty']->caching = false;

    if ($_SESSION['user_id'] > 0)
    {
        $GLOBALS['smarty']->assign('user_info', get_user_info());
    }
    else
    {
        if (!empty($_COOKIE['ECS']['username']))
        {
            $GLOBALS['smarty']->assign('ecs_username', stripslashes($_COOKIE['ECS']['username']));
        }
        $captcha = intval($GLOBALS['_CFG']['captcha']);
        if (($captcha & CAPTCHA_LOGIN) && (!($captcha & CAPTCHA_LOGIN_FAIL) || (($captcha & CAPTCHA_LOGIN_FAIL) && $_SESSION['login_fail'] > 2)) && gd_version() > 0)
        {
            $GLOBALS['smarty']->assign('enabled_captcha', 1);
            $GLOBALS['smarty']->assign('rand', mt_rand());
        }
    }
    $output = $GLOBALS['smarty']->fetch('library/member_info.lbi');

    $GLOBALS['smarty']->caching = $need_cache;

    return $output;
}

/**
 * 调用评论信息
 *
 * @access  public
 * @return  string
 */
function insert_comments($arr)
{
    $need_cache = $GLOBALS['smarty']->caching;
    $need_compile = $GLOBALS['smarty']->force_compile;

    $GLOBALS['smarty']->caching = false;
    $GLOBALS['smarty']->force_compile = true;

    /* 验证码相关设置 */
    if ((intval($GLOBALS['_CFG']['captcha']) & CAPTCHA_COMMENT) && gd_version() > 0)
    {
        $GLOBALS['smarty']->assign('enabled_captcha', 1);
        $GLOBALS['smarty']->assign('rand', mt_rand());
    }
    $GLOBALS['smarty']->assign('username',     stripslashes($_SESSION['user_name']));
    $GLOBALS['smarty']->assign('email',        $_SESSION['email']);
    $GLOBALS['smarty']->assign('comment_type', $arr['type']);
    $GLOBALS['smarty']->assign('id',           $arr['id']);
    $cmt = assign_comment($arr['id'],          $arr['type']);
    $GLOBALS['smarty']->assign('comments',     $cmt['comments']);
    $GLOBALS['smarty']->assign('pager',        $cmt['pager']);


    $val = $GLOBALS['smarty']->fetch('library/comments_list.lbi');

    $GLOBALS['smarty']->caching = $need_cache;
    $GLOBALS['smarty']->force_compile = $need_compile;

    return $val;
}


/**
 * 调用商品购买记录
 *
 * @access  public
 * @return  string
 */
function insert_bought_notes($arr)
{
    $need_cache = $GLOBALS['smarty']->caching;
    $need_compile = $GLOBALS['smarty']->force_compile;

    $GLOBALS['smarty']->caching = false;
    $GLOBALS['smarty']->force_compile = true;

    /* 商品购买记录 */
    $sql = 'SELECT u.user_name, og.goods_number, oi.add_time, IF(oi.order_status IN (2, 3, 4), 0, 1) AS order_status ' .
           'FROM ' . $GLOBALS['ecs']->table('order_info') . ' AS oi LEFT JOIN ' . $GLOBALS['ecs']->table('users') . ' AS u ON oi.user_id = u.user_id, ' . $GLOBALS['ecs']->table('order_goods') . ' AS og ' .
           'WHERE oi.order_id = og.order_id AND ' . time() . ' - oi.add_time < 2592000 AND og.goods_id = ' . $arr['id'] . ' ORDER BY oi.add_time DESC LIMIT 5';
    $bought_notes = $GLOBALS['db']->getAll($sql);

    foreach ($bought_notes as $key => $val)
    {
        $bought_notes[$key]['add_time'] = local_date("Y-m-d G:i:s", $val['add_time']);
    }

    $sql = 'SELECT count(*) ' .
           'FROM ' . $GLOBALS['ecs']->table('order_info') . ' AS oi LEFT JOIN ' . $GLOBALS['ecs']->table('users') . ' AS u ON oi.user_id = u.user_id, ' . $GLOBALS['ecs']->table('order_goods') . ' AS og ' .
           'WHERE oi.order_id = og.order_id AND ' . time() . ' - oi.add_time < 2592000 AND og.goods_id = ' . $arr['id'];
    $count = $GLOBALS['db']->getOne($sql);


    /* 商品购买记录分页样式 */
    $pager = array();
    $pager['page']         = $page = 1;
    $pager['size']         = $size = 5;
    $pager['record_count'] = $count;
    $pager['page_count']   = $page_count = ($count > 0) ? intval(ceil($count / $size)) : 1;;
    $pager['page_first']   = "javascript:gotoBuyPage(1,$arr[id])";
    $pager['page_prev']    = $page > 1 ? "javascript:gotoBuyPage(" .($page-1). ",$arr[id])" : 'javascript:;';
    $pager['page_next']    = $page < $page_count ? 'javascript:gotoBuyPage(' .($page + 1) . ",$arr[id])" : 'javascript:;';
    $pager['page_last']    = $page < $page_count ? 'javascript:gotoBuyPage(' .$page_count. ",$arr[id])"  : 'javascript:;';

    $GLOBALS['smarty']->assign('notes', $bought_notes);
    $GLOBALS['smarty']->assign('pager', $pager);


    $val= $GLOBALS['smarty']->fetch('library/bought_notes.lbi');

    $GLOBALS['smarty']->caching = $need_cache;
    $GLOBALS['smarty']->force_compile = $need_compile;

    return $val;
}


/**
 * 调用在线调查信息
 *
 * @access  public
 * @return  string
 */
function insert_vote()
{
    $vote = get_vote();
    if (!empty($vote))
    {
        $GLOBALS['smarty']->assign('vote_id',     $vote['id']);
        $GLOBALS['smarty']->assign('vote',        $vote['content']);
    }
    $val = $GLOBALS['smarty']->fetch('library/vote.lbi');

    return $val;
}

function insert_get_catlist($arr){

	   $sql = 'SELECT cat_id,cat_name ,parent_id,is_show,sort_order ' .
                'FROM ' . $GLOBALS['ecs']->table('category') .
                "WHERE parent_id = ".$arr['id']." AND is_show = 1 ORDER BY sort_order ASC, cat_id ASC limit 5";
        $res = $GLOBALS['db']->getAll($sql);
		$cinfo = $GLOBALS['db']->getRow("SELECT * FROM ". $GLOBALS['ecs']->table('category') ." where cat_id = ".$arr['id']."");
		$x = 1;
		$cinfo['url']  = build_uri('category', array('cid' => $cinfo['cat_id']), $cinfo['cat_name']);
		$str='<h4><span></span><strong><a href="'.$cinfo['url'].'" target="_blank">'.$cinfo['cat_name'].'</a></strong></h4>';
		$str.='<div class="titleMenu">';
        foreach ($res AS $row){
            if ($row['is_show'])
            {
                $cat_arr[$row['cat_id']]['id']   = $row['cat_id'];
                $cat_arr[$row['cat_id']]['name'] = $row['cat_name'];
				$cat_arr[$row['cat_id']]['sort_order'] = $row['sort_order'];
                $cat_arr[$row['cat_id']]['url']  = build_uri('category', array('cid' => $row['cat_id']), $row['cat_name']);
				$str.='<a href="'.$cat_arr[$row['cat_id']]['url'].'">'.$cat_arr[$row['cat_id']]['name'].'</a>';
				if($x != count($res)){
					$str.='<span>|</span>';
				}
            }
			$x++;
        }
		$str.='</div>';
		
		return $str;
		
}


function insert_get_cat_brands($arr){

    $children = ' AND ' . get_children($arr['id']);
    $sql = "SELECT b.brand_id, b.brand_name, b.brand_logo, b.brand_desc, COUNT(*) AS goods_num, IF(b.brand_logo > '', '1', '0') AS tag ".
            "FROM " . $GLOBALS['ecs']->table('brand') . "AS b, ".
                $GLOBALS['ecs']->table('goods') . " AS g ".
            "WHERE g.brand_id = b.brand_id $children AND is_show = 1 " .
            " AND g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 ".
            "GROUP BY b.brand_id HAVING goods_num > 0 ORDER BY tag DESC, b.sort_order ASC";
    $sql .= " LIMIT 10";
    $row = $GLOBALS['db']->getAll($sql);
    foreach ($row AS $key => $val){
        $row[$key]['url'] = build_uri($app, array('cid' => $cat, 'bid' => $val['brand_id']), $val['brand_name']);
        $row[$key]['brand_desc'] = htmlspecialchars($val['brand_desc'],ENT_QUOTES);
		$str.='<li><a href="category.php?id='.$arr['id'].'&brand='.$val['brand_id'].'" target="_blank"><img src="data/brandlogo/'.$val['brand_logo'].'" width="97" height="67" border="0" /></a></li>';
    }
    return $str;
	
}


function insert_get_category_goodslist($arr){

	$num = $arr['num'];
    $sql ='SELECT g.goods_id, g.goods_name, g.goods_name_style, g.market_price, g.shop_price AS org_price, g.promote_price, ' .
                "IFNULL(mp.user_price, g.shop_price * '$_SESSION[discount]') AS shop_price, ".
                'promote_start_date, promote_end_date, g.goods_brief, g.goods_thumb, goods_img, b.brand_name ' .
            'FROM ' . $GLOBALS['ecs']->table('goods') . ' AS g ' .
            'LEFT JOIN ' . $GLOBALS['ecs']->table('brand') . ' AS b ON b.brand_id = g.brand_id ' .
            "LEFT JOIN " . $GLOBALS['ecs']->table('member_price') . " AS mp ".
                    "ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[user_rank]' ".
            'WHERE g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 ';
	$children = get_children($arr['id']);
	$sql.= " and g.is_on_sale = 1 AND g.is_alone_sale = 1 AND ".
            "g.is_delete = 0 AND ($children OR " . get_extension_goods($children) . ')';
	
    $sql .=' ORDER BY g.sort_order, g.last_update DESC';
    $res = $GLOBALS['db']->selectLimit($sql, $num);
    $idx = 0;
    $goods = array();
    while ($row = $GLOBALS['db']->fetchRow($res)){
        if ($row['promote_price'] > 0){
            $promote_price = bargain_price($row['promote_price'], $row['promote_start_date'], $row['promote_end_date']);
            $goods[$idx]['promote_price'] = $promote_price > 0 ? price_format($promote_price) : '';
        } else{
            $goods[$idx]['promote_price'] = '';
        }
        $goods[$idx]['id']           = $row['goods_id'];
        $goods[$idx]['name']         = $row['goods_name'];
        $goods[$idx]['brief']        = $row['goods_brief'];
        $goods[$idx]['brand_name']   = $row['brand_name'];
        $goods[$idx]['short_name']   = $GLOBALS['_CFG']['goods_name_length'] > 0 ?
                                       sub_str($row['goods_name'], $GLOBALS['_CFG']['goods_name_length']) : $row['goods_name'];
        $goods[$idx]['market_price'] = price_format($row['market_price']);
        $goods[$idx]['shop_price']   = price_format($row['shop_price']);
        $goods[$idx]['thumb']        = get_image_path($row['goods_id'], $row['goods_thumb'], true);
        $goods[$idx]['goods_img']    = get_image_path($row['goods_id'], $row['goods_img']);
        $goods[$idx]['url']          = build_uri('goods', array('gid' => $row['goods_id']), $row['goods_name']);
        $goods[$idx]['short_style_name'] = add_style($goods[$idx]['short_name'], $row['goods_name_style']);
		$str.='<li>
          <div class="img"><a href="'.$goods[$idx]['url'].'" /><img src="'. $goods[$idx]['thumb'].'"></a></div>
          <div class="price_wrap"><strong><span>￥</span>'.$goods[$idx]['shop_price'].'</strong><del>￥'.$goods[$idx]['market_price'].'</del></div>
          <div class="title_wrap"><a target="_blank" href="'.$goods[$idx]['url'].'">'.$goods[$idx]['short_style_name'].'</a></div>
        </li>';
        $idx++;
    }

    return $str;
}


function insert_get_top3($arr)
{
    $cats = get_children($arr['id']);
    $where = !empty($cats) ? "AND ($cats OR " . get_extension_goods($cats) . ") " : '';

    /* 排行统计的时间 */
    switch ($GLOBALS['_CFG']['top10_time'])
    {
        case 1: // 一年
            $top10_time = "AND o.order_sn >= '" . date('Ymd', gmtime() - 365 * 86400) . "'";
        break;
        case 2: // 半年
            $top10_time = "AND o.order_sn >= '" . date('Ymd', gmtime() - 180 * 86400) . "'";
        break;
        case 3: // 三个月
            $top10_time = "AND o.order_sn >= '" . date('Ymd', gmtime() - 90 * 86400) . "'";
        break;
        case 4: // 一个月
            $top10_time = "AND o.order_sn >= '" . date('Ymd', gmtime() - 30 * 86400) . "'";
        break;
        default:
            $top10_time = '';
    }

    $sql = 'SELECT g.goods_id, g.goods_name, g.shop_price, g.goods_thumb, SUM(og.goods_number) as goods_number ' .
           'FROM ' . $GLOBALS['ecs']->table('goods') . ' AS g, ' .
                $GLOBALS['ecs']->table('order_info') . ' AS o, ' .
                $GLOBALS['ecs']->table('order_goods') . ' AS og ' .
           "WHERE g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 $where $top10_time " ;
    //判断是否启用库存，库存数量是否大于0
    if ($GLOBALS['_CFG']['use_storage'] == 1)
    {
        $sql .= " AND g.goods_number > 0 ";
    }
    $sql .= ' AND og.order_id = o.order_id AND og.goods_id = g.goods_id ' .
           "AND (o.order_status = '" . OS_CONFIRMED .  "' OR o.order_status = '" . OS_SPLITED . "') " .
           "AND (o.pay_status = '" . PS_PAYED . "' OR o.pay_status = '" . PS_PAYING . "') " .
           "AND (o.shipping_status = '" . SS_SHIPPED . "' OR o.shipping_status = '" . SS_RECEIVED . "') " .
           'GROUP BY g.goods_id ORDER BY goods_number DESC, g.goods_id DESC LIMIT 3';
           
    $arr = $GLOBALS['db']->getAll($sql);
    for ($i = 0, $count = count($arr); $i < $count; $i++){
        $arr[$i]['short_name'] = $GLOBALS['_CFG']['goods_name_length'] > 0 ?
                                    sub_str($arr[$i]['goods_name'], $GLOBALS['_CFG']['goods_name_length']) : $arr[$i]['goods_name'];
        $arr[$i]['url']        = build_uri('goods', array('gid' => $arr[$i]['goods_id']), $arr[$i]['goods_name']);
        $arr[$i]['thumb'] = get_image_path($arr[$i]['goods_id'], $arr[$i]['goods_thumb'],true);
        $arr[$i]['price'] = price_format($arr[$i]['shop_price']);
		$str.='<dl>
          <dt><a href="'.$arr[$i]['url'].'" target="_blank"><img src="'.$arr[$i]['thumb'].'" /></a></dt>
          <dd>
            <div class="price_wrap"><span>￥</span>'.$arr[$i]['price'].'</div>
            <div class="title_wrap"><a href="'.$arr[$i]['url'].'">'.$arr[$i]['short_name'].'</a></div>
          </dd>
        </dl>';
    }
    return $str;
}

function insert_getlist_ads($arr){
    static $static_res = NULL;
    $time = gmtime();
	$adsinfo = $GLOBALS['db']->getRow("SELECT * FROM ". $GLOBALS['ecs']->table('ad_position') ." where position_id = ".$arr['id']."");
	$sql  = 'SELECT a.ad_id, a.position_id, a.media_type, a.ad_link, a.ad_code, a.ad_name, p.ad_width, ' .
				'p.ad_height, p.position_style, RAND() AS rnd ' .
			'FROM ' . $GLOBALS['ecs']->table('ad') . ' AS a '.
			'LEFT JOIN ' . $GLOBALS['ecs']->table('ad_position') . ' AS p ON a.position_id = p.position_id ' .
			"WHERE enabled = 1 AND start_time <= '" . $time . "' AND end_time >= '" . $time . "' ".
				"AND a.position_id = '" . $arr['id'] . "' " .
			'ORDER BY rnd LIMIT ' . $arr['num'];
	$res = $GLOBALS['db']->GetAll($sql);
	if($res){
		$i=1;
		foreach ($res AS $row){
			$str1.='<li>'.$i.'</li>';
			$str2.='<li><div class="maxBox"><a href="'.$row['ad_link'].'" target="_blank"><img src="data/afficheimg/'.$row['ad_code'].'" width="1200" height="325"/></a></div></li>';
			$i++;
		}
	}
	$str.='<div class="hd"><ul>'.$str1.'</ul></div><div class="bd"><ul>'.$str2.'</ul></div>';
    return $str;
}

function insert_getlist_ads2($arr){
    static $static_res = NULL;
    $time = gmtime();
	$adsinfo = $GLOBALS['db']->getRow("SELECT * FROM ". $GLOBALS['ecs']->table('ad_position') ." where position_id = ".$arr['id']."");
	$sql  = 'SELECT a.ad_id, a.position_id, a.media_type, a.ad_link, a.ad_code, a.ad_name, p.ad_width, ' .
				'p.ad_height, p.position_style, RAND() AS rnd ' .
			'FROM ' . $GLOBALS['ecs']->table('ad') . ' AS a '.
			'LEFT JOIN ' . $GLOBALS['ecs']->table('ad_position') . ' AS p ON a.position_id = p.position_id ' .
			"WHERE enabled = 1 AND start_time <= '" . $time . "' AND end_time >= '" . $time . "' ".
				"AND a.position_id = '" . $arr['id'] . "' " .
			'ORDER BY ad_id asc LIMIT ' . $arr['num'];
	$res = $GLOBALS['db']->GetAll($sql);
	if($res){
		$i=1;
		foreach ($res AS $row){
			if($i == 1){
				$str1.='<ul class="infoList" style="background:url(data/afficheimg/'.$row['ad_code'].');display:block"><li><a href="'.$row['ad_link'].'" target="_blank"></a></li></ul>';
				$str2.='<li class="on"><a href="javascript:;">'.$row['ad_name'].'</a></li>';
			}else{
				$str1.='<ul class="infoList" style="background:url(data/afficheimg/'.$row['ad_code'].'); no-repeat;display:none"><li><a href="'.$row['ad_link'].'" target="_blank"></a></li></ul>';
				$str2.='<li><a href="javascript:;">'.$row['ad_name'].'</a></li>';
			}
			$i++;
		}
	}
	$str.='<div class="bd">'.$str1.'</div><div class="hd"><ul>'.$str2.'</ul></div>';
    return $str;
}


function insert_get_goodspl($arr){

  return $GLOBALS['db']->getOne("select count(*) from ". $GLOBALS['ecs']->table('comment') . " where id_value = ".$arr['id']);
 
}

function insert_get_goodsxs($arr){

  return  $GLOBALS['db']->getOne("select count(*) from ". $GLOBALS['ecs']->table('order_goods') . " where goods_id = ".$arr['id']);
 
}

function insert_get_cart_list(){

	include_once('includes/lib_order.php');
    $cart_goods = get_cart_goods();
	$str.='<p class="good_cart">'.$cart_goods['total']['real_goods_count'].'</p>
			<span class="fixeBoxSpan"></span> <strong>购物车</strong>
			<div class="cartBox">
       		<div class="bjfff"></div>';
	if($cart_goods['goods_list']){
		$str.='<div class="cartBoxC "><ul>';
		foreach($cart_goods['goods_list'] as $key=>$value){
			$value['url'] =  build_uri('goods', array('gid' => $value['goods_id']), $value['goods_name']);
			$str.='<li>
					<div class="p-img"> <a target="_blank" href="'.$value['url'].'"> <img src="'.$value['goods_thumb'].'"> </a> </div>
					<div class="p-name"> <a target="_blank" href="'.$value['url'].'">'.$value['goods_name'].'</a> </div>
					<div class="p-detail"> <span class="p-price"> <strong>￥'.$value['goods_price'].'</strong> × '.$value['goods_number'].' </span> </div>
      				</li>';
		}
		$str.='</ul></div>';
		$str.='<div class="cartBoxFoot"><span>小计(不含运费)：</span> <em>￥</em> <strong>'.$cart_goods['total']['goods_price'].'</strong> 
		<a id="btn-payforgoods" href="flow.php">去购物车结算</a> </div></div>';
	}else{
		$str.='<div class="message">购物车内暂无商品，赶紧选购吧</div>';
	}
	
	return $str;
	
}
?>