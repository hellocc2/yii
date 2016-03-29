<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->_var['page_title']; ?></title>
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<link type="text/css" rel="stylesheet" href="static/css/global.css" />
<link type="text/css" rel="stylesheet" href="static/css/1200.css" />
<link type="text/css" rel="stylesheet" href="static/css/index.css" />
<script type="text/javascript">var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";</script>
<script type="text/javascript" src="static/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="static/js/index.js"></script>
<script type="text/javascript" src="static/js/jquery.pack.js"></script>
<script type="text/javascript" src="static/js/jQuery.blockUI.js"></script>
<script type="text/javascript" src="static/js/jquery.SuperSlide.js"></script>
</head>
<body>
<div class="indexmainBa">
  <div class="indexmax">
    <div class="main">
      <div class="Btn"></div>
      <a target="_blank" href="#"></a></div>
  </div>
  <div class="indexmin">
    <div class="main">
      <div class="Btn"></div>
      <a target="_blank" href="#"></a></div>
  </div>
</div>
<?php echo $this->fetch('library/page_header.lbi'); ?>
<div class="mfpSlide">
  <div class="slideBox main ">
    <?php 
$k = array (
  'name' => 'getlist_ads',
  'id' => '1',
  'num' => '5',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
  </div>
</div>
<div class="main  margin clearfix">
  <div class="indexLeft">
    <div class="indexLeftYY"></div>
    <div class="Panicbuying"><?php 
$k = array (
  'name' => 'ads',
  'id' => '2',
  'num' => '1',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></div>
    <div class="Announcement">
      <div class="AnnouncementTitle"><span class="cur">最新订单</span><span>公告</span></div>
      <div class="announcementC" style="display:block">
        <div class="TheyareBuyingC">
          <ul>
		  <?php $_from = $this->_var['order']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'order_0_26325100_1383463472');if (count($_from)):
    foreach ($_from AS $this->_var['order_0_26325100_1383463472']):
?>
            <li>
              <p class="lip1"><?php echo sub_str($this->_var['order_0_26325100_1383463472']['user_name'],8); ?>（<?php echo $this->_var['order_0_26325100_1383463472']['usercity']; ?>）<?php echo $this->_var['order_0_26325100_1383463472']['randtime']; ?>分钟前购买了<?php echo $this->_var['order_0_26325100_1383463472']['goods_name']; ?></p>
              <p class="lip2"><a target="_blank" href="<?php echo $this->_var['order_0_26325100_1383463472']['goods_url']; ?>"><?php echo $this->_var['order_0_26325100_1383463472']['goods_name']; ?></a></p>
            </li>
 		  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </ul>
        </div>
      </div>
      <div class="announcementC">
        <ul class="AnnouncementList">
		
<?php $this->assign('articles',$this->_var['articles_12']); ?><?php $this->assign('articles_cat',$this->_var['articles_cat_12']); ?><?php echo $this->fetch('library/cat_articles.lbi'); ?>

        </ul>
      </div>
    </div>
  </div>
  <div class="indexRight">
    <div class="mod_day">
      <h4>活动推荐</h4>
    </div>
    <div class="slideTxtBox">
      <?php 
$k = array (
  'name' => 'getlist_ads2',
  'id' => '3',
  'num' => '4',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
    </div>
  </div>
</div>
<script type="text/javascript">
jQuery(".slideBox").slide( {mainCell:".bd ul",effect:"top",autoPlay:true,interTime:8000});
</script>
<div class="main margin">
  <div class="mainTitle">
    <?php 
$k = array (
  'name' => 'get_catlist',
  'id' => '1',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
  </div>
  <div class="floor_bd clearfix">
    <div class="indexLeft">
      <div class="indexLeftYY"></div>
      <p><?php 
$k = array (
  'name' => 'ads',
  'id' => '4',
  'num' => '1',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></p>
      <ul class="clearfix">
         <?php 
$k = array (
  'name' => 'get_cat_brands',
  'id' => '1',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
      </ul>
    </div>
    <div class="indexRight">
      <ul class="clearfix">
        <?php 
$k = array (
  'name' => 'get_category_goodslist',
  'id' => '1',
  'num' => '8',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
      </ul>
      <div class="SalesRank">
        <div class="SalesRankTitle">热销排行</div>
        <?php 
$k = array (
  'name' => 'get_top3',
  'id' => '1',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
        <div class="SalesRankAd"><?php 
$k = array (
  'name' => 'ads',
  'id' => '5',
  'num' => '1',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></div>
        <div class="SalesRankAd1"><?php 
$k = array (
  'name' => 'ads',
  'id' => '6',
  'num' => '1',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></div>
      </div>
    </div>
  </div>
</div>
<div class="main  margin">
  <div class="mainTitle">
    <?php 
$k = array (
  'name' => 'get_catlist',
  'id' => '6',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
  </div>
  <div class="floor_bd clearfix">
    <div class="indexLeft">
      <div class="indexLeftYY"></div>
      <p><?php 
$k = array (
  'name' => 'ads',
  'id' => '7',
  'num' => '1',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></p>
      <ul class="clearfix">
        <?php 
$k = array (
  'name' => 'get_cat_brands',
  'id' => '6',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
      </ul>
    </div>
    <div class="indexRight">
      <ul class="clearfix">
       <?php 
$k = array (
  'name' => 'get_category_goodslist',
  'id' => '6',
  'num' => '8',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
      </ul>
      <div class="SalesRank">
        <div class="SalesRankTitle">热销排行</div>
        <?php 
$k = array (
  'name' => 'get_top3',
  'id' => '6',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
        <div class="SalesRankAd"><?php 
$k = array (
  'name' => 'ads',
  'id' => '8',
  'num' => '1',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></div>
        <div class="SalesRankAd1"><?php 
$k = array (
  'name' => 'ads',
  'id' => '9',
  'num' => '1',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></div>
      </div>
    </div>
  </div>
</div>
<div class="main  margin">
  <div class="mainTitle">
    <?php 
$k = array (
  'name' => 'get_catlist',
  'id' => '12',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
  </div>
  <div class="floor_bd clearfix">
    <div class="indexLeft">
      <div class="indexLeftYY"></div>
      <p><?php 
$k = array (
  'name' => 'ads',
  'id' => '10',
  'num' => '1',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></p>
      <ul class="clearfix">
        <?php 
$k = array (
  'name' => 'get_cat_brands',
  'id' => '12',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
      </ul>
    </div>
    <div class="indexRight">
      <ul class="clearfix">
         <?php 
$k = array (
  'name' => 'get_category_goodslist',
  'id' => '12',
  'num' => '8',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
      </ul>
      <div class="SalesRank">
        <div class="SalesRankTitle">热销排行</div>
        <?php 
$k = array (
  'name' => 'get_top3',
  'id' => '12',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
        <div class="SalesRankAd"><?php 
$k = array (
  'name' => 'ads',
  'id' => '11',
  'num' => '1',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></div>
        <div class="SalesRankAd1"><?php 
$k = array (
  'name' => 'ads',
  'id' => '12',
  'num' => '1',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></div>
      </div>
    </div>
  </div>
</div>
<div class="main  margin">
  <div class="mainTitle">
     <?php 
$k = array (
  'name' => 'get_catlist',
  'id' => '16',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
  </div>
  <div class="floor_bd clearfix">
    <div class="indexLeft">
      <div class="indexLeftYY"></div>
      <p><?php 
$k = array (
  'name' => 'ads',
  'id' => '13',
  'num' => '1',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></p>
      <ul class="clearfix">
        <?php 
$k = array (
  'name' => 'get_cat_brands',
  'id' => '16',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
      </ul>
    </div>
    <div class="indexRight">
      <ul class="clearfix">
        <?php 
$k = array (
  'name' => 'get_category_goodslist',
  'id' => '16',
  'num' => '8',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
      </ul>
      <div class="SalesRank">
        <div class="SalesRankTitle">热销排行</div>
        <?php 
$k = array (
  'name' => 'get_top3',
  'id' => '16',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
        <div class="SalesRankAd"><?php 
$k = array (
  'name' => 'ads',
  'id' => '14',
  'num' => '1',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></div>
        <div class="SalesRankAd1"><?php 
$k = array (
  'name' => 'ads',
  'id' => '15',
  'num' => '1',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></div>
      </div>
    </div>
  </div>
</div>
<div class="main  margin">
  <div class="mainTitle">
     <?php 
$k = array (
  'name' => 'get_catlist',
  'id' => '17',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
  </div>
  <div class="floor_bd clearfix">
    <div class="indexLeft">
      <div class="indexLeftYY"></div>
      <p><?php 
$k = array (
  'name' => 'ads',
  'id' => '16',
  'num' => '1',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></p>
      <ul class="clearfix">
        <?php 
$k = array (
  'name' => 'get_cat_brands',
  'id' => '17',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
      </ul>
    </div>
    <div class="indexRight">
      <ul class="clearfix">
        <?php 
$k = array (
  'name' => 'get_category_goodslist',
  'id' => '17',
  'num' => '8',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
      </ul>
      <div class="SalesRank">
        <div class="SalesRankTitle">热销排行</div>
        <?php 
$k = array (
  'name' => 'get_top3',
  'id' => '17',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
        <div class="SalesRankAd"><?php 
$k = array (
  'name' => 'ads',
  'id' => '17',
  'num' => '1',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></div>
        <div class="SalesRankAd1"><?php 
$k = array (
  'name' => 'ads',
  'id' => '18',
  'num' => '1',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></div>
      </div>
    </div>
  </div>
</div>
<?php echo $this->fetch('library/help.lbi'); ?>
<div class="footerlink">
  <div class="main"> <b>友情链接：</b>
    <ul>
      <li>
    <?php if ($this->_var['txt_links']): ?>
    <?php $_from = $this->_var['txt_links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'link');if (count($_from)):
    foreach ($_from AS $this->_var['link']):
?>
    <a href="<?php echo $this->_var['link']['url']; ?>" target="_blank" title="<?php echo $this->_var['link']['name']; ?>"><?php echo $this->_var['link']['name']; ?></a>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    <?php endif; ?> </li>
    </ul>
  </div>
</div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
<?php echo $this->fetch('library/page_service.lbi'); ?>
</body>
</html>
