<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->_var['page_title']; ?></title>
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<link type="text/css" rel="stylesheet" href="static/css/global.css" />
<link type="text/css" rel="stylesheet" href="static/css/show.css" />
<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
</script>
<?php echo $this->smarty_insert_scripts(array('files'=>'common.js')); ?><?php echo $this->smarty_insert_scripts(array('files'=>'transport.js,utils.js')); ?>
<script type="text/javascript" src="static/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="static/js/global.js"></script>
<script type="text/javascript" src="static/js/Detail.js"></script>
<script type="text/javascript" src="static/js/jquery.jqzoom.js"></script>
<script type="text/javascript" src="static/js/comment.js"></script>
</head>
<body>
<?php echo $this->fetch('library/page_header.lbi'); ?>
<div class="main margin pathinfo"><?php echo $this->fetch('library/ur_here.lbi'); ?></div>
<div class="main showContent margin clearfix">
  <div class="gallery">
    <div id="detail">
      <div class="jqzoom_pm"> <img src="<?php echo $this->_var['goods']['goods_img']; ?>" alt="<?php echo $this->_var['goods']['goods_img']; ?>" /> </div>
    </div>
    <div class="img_scroll">
      <div class="Prev" ><span></span></div>
      <div class="img_list">
        <ul>
		 <?php $_from = $this->_var['pictures']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'picture');$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from AS $this->_var['picture']):
        $this->_foreach['foo']['iteration']++;
?>
          <li <?php if (($this->_foreach['foo']['iteration'] - 1) == 0): ?>class="on"<?php endif; ?>><img src="<?php echo $this->_var['picture']['img_url']; ?>" rel="<?php echo $this->_var['picture']['img_url']; ?>" maximg="<?php echo $this->_var['picture']['img_url']; ?>" /></li>
		  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>	  		  
        </ul>
      </div>
      <div class="Next" ><span></span></div>
    </div>
  </div>
  <form action="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" method="post" name="ECS_FORMBUY" id="ECS_FORMBUY" >
  <div class="property">
    <h2><?php echo $this->_var['goods']['goods_style_name']; ?></h2>
    <div class="goods_info">&nbsp;</div>
    <div class="ProductD clearfix">
      <div class="productDL">
        <dl>
          <dt>总 重 量：</dt>
          <dd><?php echo $this->_var['goods']['goods_weight']; ?></dd>
        </dl>
        <dl>
          <dt>售&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;价：</dt>
          <dd><span id="ECS_SHOPPRICE">￥<?php echo $this->_var['goods']['shop_price_formated']; ?></span><del>市场价：￥<?php echo $this->_var['goods']['market_price']; ?></del></dd>
        </dl>
        <dl>
          <dt>库&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;存：</dt>
          <dd><?php echo $this->_var['goods']['goods_number']; ?> <?php echo $this->_var['goods']['measure_unit']; ?></dd>
        </dl>
        <dl>
          <dt>上架时间：</dt>
          <dd>
            <?php echo $this->_var['goods']['add_time']; ?>
          </dd>
        </dl>
        <dl>
          <dt>销售评价：</dt>
          <dd>已售出<strong><?php 
$k = array (
  'name' => 'get_goodsxs',
  'id' => $this->_var['goods']['goods_id'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>件</strong>&nbsp;&nbsp;（<?php 
$k = array (
  'name' => 'get_goodspl',
  'id' => $this->_var['goods']['goods_id'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>人评论）</dd>
        </dl>
      </div>
    </div>
    <div class="buyinfo" id="detail_buyinfo">
      <dl>
        <dt>购买数量</dt>
        <dd>
          <div class="buyinfo1"> <a href="javascript:void(0);" onclick="updatenum('del');">-</a>
            <input id="number" name="number" type="text" value="1" />
            <a href="javascript:void(0);" onclick="updatenum('add');">+</a> </div>
          <div class="wrap_btn"> <a href="javascript:addToCart_bak(<?php echo $this->_var['goods']['goods_id']; ?>)" class="wrap_btn1" title="加入购物车"></a> 
		  <a href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" class="wrap_btn2" title="立即购买"></a> </div>
        </dd>
      </dl>
    </div>
    <div class="ProductD clearfix">
      <div class="productDL">
        <dl>
          <dt>您还可以</dt>
          <dd>
            <ul>
              <li><a href="javascript:collect(<?php echo $this->_var['goods']['goods_id']; ?>)"><span class="ico1"></span>收藏商品</a></li>
              <li class="share"><a href="javascript:;"><span class="ico3"></span>分享到</a>
                <div class="share1">
				<div class="bdshare_t" id="bdshare"> <a class="bds_tsina" title="分享到新浪微博"><span class="ico1"></span></a> <a class="bds_tqq" title="分享到腾讯微博"><span class="ico2"></span></a> <a class="bds_qzone" title="分享到QQ空间"><span class="ico3"></span></a> <a class="bds_t163" title="分享到网易微博"><span class="ico4"></span></a> <a class="bds_tsohu" title="分享到搜狐微博"><span class="ico5"></span></a> <a class="bds_renren" title="分享到人人网"><span class="ico6"></span></a> <a class="bds_kaixin001" title="分享到开心网"><span class="ico7"></span></a> <a class="bds_hi" title="分享到百度空间"><span class="ico8"></span></a> <a class="bds_baidu" title="分享到百度搜藏"><span class="ico9"></span></a> <a class="bds_tieba" title="分享到百度贴吧"><span class="ico10"></span></a> <a class="bds_douban" title="分享到豆瓣网"><span class="ico11"></span></a> <a class="bds_diandian" title="分享到点点网"><span class="ico12"></span></a> </div>
			<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=685351" ></script>
			<script type="text/javascript" id="bdshell_js"></script>
			<script type="text/javascript">
			document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
			</script>
                </div>
              </li>
            </ul>
          </dd>
        </dl>
      </div>
    </div>
  </div>
  </form>	
</div>
<div class="main clearfix">
  <div class="mainListLeft fl">
    <div class="listLeftMenu">
      <?php $_from = $this->_var['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');if (count($_from)):
    foreach ($_from AS $this->_var['cat']):
?>
      <dl class="<?php if ($this->_var['pid'] == $this->_var['cat']['id']): ?>on<?php else: ?><?php endif; ?>">
        <dt rel="<?php if ($this->_var['pid'] == $this->_var['cat']['id']): ?>on<?php else: ?>off<?php endif; ?>"><strong><a href="<?php echo $this->_var['cat']['url']; ?>"><?php echo htmlspecialchars($this->_var['cat']['name']); ?></a></strong><span></span></dt>
        <dd class="clearfix"> 
		<?php $_from = $this->_var['cat']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');if (count($_from)):
    foreach ($_from AS $this->_var['child']):
?>
		<span><a href="<?php echo $this->_var['child']['url']; ?>"><?php echo htmlspecialchars($this->_var['child']['name']); ?></a></span> 
 		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</dd>
      </dl>
	  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
    </div>
    <div class="hotSell">
      <h4>本周热销榜</h4>
	  <?php $_from = $this->_var['hot_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_03456700_1383463480');if (count($_from)):
    foreach ($_from AS $this->_var['goods_0_03456700_1383463480']):
?>
      <dl>
        <dt><a href="<?php echo $this->_var['goods_0_03456700_1383463480']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['goods_0_03456700_1383463480']['name']); ?>"><img title="<?php echo htmlspecialchars($this->_var['goods_0_03456700_1383463480']['name']); ?>" src="<?php echo $this->_var['goods_0_03456700_1383463480']['thumb']; ?>" /></a></dt>
        <dd>
          <p><a href="<?php echo $this->_var['goods_0_03456700_1383463480']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['goods_0_03456700_1383463480']['name']); ?>"><?php echo $this->_var['goods_0_03456700_1383463480']['short_style_name']; ?></a></p>
          <span>￥<?php echo $this->_var['goods_0_03456700_1383463480']['shop_price']; ?></span> </dd>
      </dl>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </div>
    <?php echo $this->fetch('library/history.lbi'); ?>
  </div>
  <div class="mainListRight fr" id="status1">
    <script type="text/javascript">
$(function(){
  $('.fixed_bar').find('li').click(function(){
	$('.fixed_bar').find('li').removeClass('active');
	$(this).addClass('active');
  });
  $(".share").hover(
    function(){
	  $(".share1").stop().animate({
	    width:'270px'
	  }, 200)
	},
	function(){
	  $(".share1").stop().animate({
	    width:'66px'
	  },200);
	}
  );
  
})
</script>
    <ul class="fixed_bar">
      <li class="status_on active"><a href="#status1">产品介绍</a></li>
      <li class="status_on"><a href="#status2">商品评价<span>(<?php 
$k = array (
  'name' => 'get_goodspl',
  'id' => $this->_var['goods']['goods_id'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>)</span></a></li>
      <li class="status_on"><a href="#shbz">售后服务</a></li>
      <div class="statusBtn"><a href="javascript:addToCart_bak(<?php echo $this->_var['goods']['goods_id']; ?>)" class="statusBtn1" title="加入购物车"></a></div>
    </ul>
    <div class="productContent">
      <div class="attributes-list">
	  <?php $_from = $this->_var['properties']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'property_group');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['property_group']):
?>
        <p class="attr-list-hd"><?php echo htmlspecialchars($this->_var['key']); ?>：</p>
        <ul class="clearfix">
		<?php $_from = $this->_var['property_group']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'property');if (count($_from)):
    foreach ($_from AS $this->_var['property']):
?>
          <li>[<?php echo htmlspecialchars($this->_var['property']['name']); ?>]：<?php echo $this->_var['property']['value']; ?></li>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </div>
      <h3 class="techanPdcontent"><strong>产品介绍</strong><span>Product Ovierview</span></h3>
      <div class="techanProducts clearfix">
      </div>
      <div class="description">
         <?php echo $this->_var['goods']['goods_desc']; ?>
      </div>
    </div>
    <div class="productContent" id="status2">
      <div class="iComment clearfix">
        <div class="rate"><strong id="goodRate">100<span>%</span></strong><br>
          <span>好评度</span></div>
        <div class="percent" id="percentRate">
          <dl>
            <dt>好评<span >(100%)</span></dt>
            <dd>
              <div style="width:100px;"></div>
            </dd>
          </dl>
          <dl>
            <dt>中评<span>(0%)</span></dt>
            <dd class="d1">
              <div style="width:0;"> </div>
            </dd>
          </dl>
          <dl>
            <dt>差评<span>(0%)</span></dt>
            <dd class="d1">
              <div style="width:0;"> </div>
            </dd>
          </dl>
        </div>
        <div class="actor">
          <dl>
            <dt>发表评价即可获得10积分，精华评论更有 <font color="red">额外奖励</font> 积分；<br />
              还有7个多倍积分名额哦，赶紧抢占吧！<br />
              只有购买过该商品的用户才能进行评价。</dt>
            <dd>
              <input onclick="send_cooment()" type="image" src="static/images/btn1.jpg" />
            </dd>
          </dl>
        </div>
      </div>
	  <div class="commentBox" style="display:none;">
		<form action="javascript:;" onsubmit="submitComment(this)" method="post" name="commentForm" id="commentForm">
		  <h3>商品评分</h3>
		  <p class="tip">请直接点击相应的星级进行评分</p>
		  <div id="star">
			<ul>
			  <li><span onClick="dorank(1)"></span>
				<p>1分</p>
				<p>非常不满意</p>
			  </li>
			  <li><span onclick="dorank(2)"></span>
				<p>2分</p>
				<p>不满意</p>
			  </li>
			  <li><span onclick="dorank(3)"></span>
				<p>3分</p>
				<p>一般</p>
			  </li>
			  <li><span onclick="dorank(4)"></span>
				<p>4分</p>
				<p>满意</p>
			  </li>
			  <li><span onclick="dorank(5)"></span>
				<p>5分</p>
				<p>非常满意</p>
			  </li>
			</ul>
			<input type="hidden" name="rank" id="rank" value="1">
			<input type="hidden" name="cmt_type" value="<?php echo $this->_var['comment_type']; ?>" />
			<input type="hidden" name="id" value="<?php echo $this->_var['id']; ?>" />
			<input type="hidden" name="email" id="email" value="null@mial.com"/>
		  </div>
		  <h4>评论内容</h4>
		  <div class="bd">
			<textarea name="content" id="content" class="textarea_long" onkeyup="checkLength(this);" ></textarea>
			<p class="g">
			  <label>&nbsp; </label>
			  <input type="submit" value="发表" class="btn_common" />
			  <span t="word_calc" class="word"><b id="sy">0</b>/1000</span> </p>
		  </div>
		</form>
		</div>
		<?php echo $this->fetch('library/comments.lbi'); ?>
      	<script type="text/javascript">
		$('.CommentTab ul').find('li').click(function(){
		  $('.CommentTab ul').find('li').removeClass('active');
		  $('.CommentText').css({display:'none'});
		  $(this).addClass('active');
		  $('.CommentText').eq($(this).index()).css({display:'block'});
		});
		</script>
    </div>
	<div id="shbz"></div>
    <div class="productContent Service">
      <h4>售后保障</h4>
      <p>非质量问题的退货，请在收到宝贝后七天内联系客服，如属质量问题，由本店承担运费。<br />        </p>
      <h3>关于快递<span>About the Courier</span></h3>
      <p>我们默认使用普通快递，如发其它快递、EMS，请联系我们在线客服！</p>
      <h3>关于发货<span>About Delivery</span></h3>
      <p>每日下午5:00以前的顾客，均可以当天发货，5:00以后的顾客，次日发货。</p>
      <h3>色差说明<span>Component Description</span></h3>
      <p style="border:0 none;">因拍摄灯光及不同显示器色差等问题可能造成商品图片与实物有色差,一切以实物为准。</p>
    </div>
    <div class="RelatedProducts">
      <h3>浏览过此商品的用户还关注过</h3>
      <ul>
	   <?php $_from = $this->_var['related_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'releated_goods_data');if (count($_from)):
    foreach ($_from AS $this->_var['releated_goods_data']):
?>
        <li>
          <div class="RelatedImg"><a href="<?php echo $this->_var['releated_goods_data']['url']; ?>"><img src="<?php echo $this->_var['releated_goods_data']['goods_thumb']; ?>" alt="<?php echo $this->_var['releated_goods_data']['goods_name']; ?>" /></a></div>
          <div class="RelatedTitle"><a href="<?php echo $this->_var['releated_goods_data']['url']; ?>" title="<?php echo $this->_var['releated_goods_data']['goods_name']; ?>"><?php echo $this->_var['releated_goods_data']['short_name']; ?></a></div>
          <div class="RelatedWrap"><strong>￥<?php echo $this->_var['releated_goods_data']['shop_price']; ?></strong><del>￥<?php echo $this->_var['releated_goods_data']['market_price']; ?></del></div>
        </li>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </ul>
    </div>
  </div>
</div>
<?php echo $this->fetch('library/help.lbi'); ?>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
<?php echo $this->fetch('library/page_service.lbi'); ?>
<script language="javascript">
function updatenum(type){
	var qty = parseInt(document.forms['ECS_FORMBUY'].elements['number'].value);
	if(type == 'del'){
		if(qty > 1){
			document.forms['ECS_FORMBUY'].elements['number'].value = (qty - 1);
		}
	}else{
		document.forms['ECS_FORMBUY'].elements['number'].value = (qty + 1);
	}
	//changePrice();
}
function dorank(rank_id){
    var rank_id;
	$("#rank").val(rank_id);
}
function send_cooment(){
    $(".commentBox").toggle();
}

function checkLength(which) {
	var maxChars = 1000; //
	if(which.value.length > maxChars){
		alert("您出入的字数超多限制!");
		which.value = which.value.substring(0,maxChars);
		return false;
	}else{
		var curr = maxChars - which.value.length; //250 减去 当前输入的
		document.getElementById("sy").innerHTML = curr.toString();
		return true;
	}
}
</script>
</body>
</html>