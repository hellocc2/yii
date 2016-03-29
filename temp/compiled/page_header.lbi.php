<style type="text/css">
.flowbox{position:fixed !important;_position:absolute;width:460px;top:50%;left:50%;margin:-35px 0 0 -230px;z-index:99999;height:116px;border:5px solid #999999;background:#ffffff;}
.flowhide{display:none;}
.flowbox a{color:#005EA7}
</style>
<div id='flowboxs' class='flowhide'>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr><td colspan="2" style="background:#F3F3F3; border-bottom:solid 1px #CCCCCC; height:30px; font-weight:bold; font-size:14px; text-indent:10px;">提示</td></tr>
  <tr><td width="85" align="center" valign="middle"><img src="static/images/new_cart_left.gif"></td>
    <td align="left" valign="middle" style="text-indent:16px; line-height:200%">
	<p style="font-size:14px; font-weight:bold">已将 1 件商品添加到购物车</p>
	<p style="color:#990000"><a href="flow.php">去购物车结算>></a>&nbsp;&nbsp;<a href="JavaScript:;" onClick="close_flowbox();">继续购物</a></p></td>
  </tr></table>
</div>
<script type="text/javascript">
function close_flowbox(){document.getElementById('flowboxs').className='flowhide';}
function show_flowbox(){
	get_cart();
	document.getElementById('flowboxs').className='flowbox';
}
function delete_cart(id){Ajax.call('flow.php?aaid='+id, 'step=delete_cart', new_cart, 'POST', 'JSON');}
function new_cart(result){
	document.getElementById('cartboxs').innerHTML = result.str;
	document.getElementById('cartsbox').style.display = '';
}
function boxshow(id){document.getElementById(id).style.display = '';}
function boxhide(id){document.getElementById(id).style.display = 'none';}
function get_cart(){
	Ajax.call('flow.php?1=1', 'step=get_cart', show_cart, 'POST', 'JSON');
}
function show_cart(result){
	document.getElementById('cartboxs').innerHTML = result.str;
}
</script>
<div class="top">
  <div class="main">
    <div class="topMainL">
      <ul>
        <li class="sidebar"><a href="javascript:void(0);" target="_self" onclick="javascript:try{window.external.AddFavorite(window.location.href, document.title);} catch(e){(window.sidebar)?window.sidebar.addPanel(document.title,window.location.href,''):alert('请使用按键 Ctrl+d，<?php echo $this->_var['shop_name']; ?>');}" title="收藏<?php echo $this->_var['shop_name']; ?>"></a></li>
        <li class="tweibo"><a href="#" target="_blank"></a></li>
        <li class="weibo"><a href="#" target="_blank"></a></li>
        <li class="weixi" onmouseout="this.className='weixi'" onmouseover="this.className='weixi hover'">
          <div class="weixi1">
            <div class="weixipic"> <img src="static/images/weixiPic.png" />
              <p>微信扫描二维码，随时随地与<?php echo $this->_var['shop_name']; ?>亲密接触，精彩活动、劲爆优惠触手可得！</p>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <ul class="topMainR" id="TECHAN_MEMBERZONE"><?php 
$k = array (
  'name' => 'member_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></ul>
  </div>
</div>
<div class="headerBj">
  <div class="header main">
    <div class="logo"><a href="./"><img src="static/images/logo.png" /></a></div>
    <div class="Search">
    <script type="text/javascript">
    
    <!--
    function checkSearchForm()
    {
        if(document.getElementById('keyword').value)
        {
            return true;
        }
        else
        {
            alert("<?php echo $this->_var['lang']['no_keywords']; ?>");
            return false;
        }
    }
    -->
    
    </script>	  
	<form id="searchForm" name="searchForm" method="get" action="search.php" onSubmit="return checkSearchForm()" class="f_r" style="_position:relative; top:5px;">
	  <input name="keywords" type="text" id="keyword" value="<?php echo htmlspecialchars($this->_var['search_keywords']); ?>" class="searchInputT"/>
	  <input type="submit" value=" " class="searchBtn" style="cursor:pointer;" />
	  <input name="category" type="hidden" id="category" value="0" />
	</form>	  
    </div>
    <div class="tel400"><img src="static/images/400.gif"></div>
  </div>
  <?php if ($this->_var['isclass'] != 'no'): ?>
  <div class="Navigation main margin">
    <div class="menu" id="category_container">
      <h3>所有特产分类<span></span></h3>
      <div class="cate_bd">
	  <?php $_from = $this->_var['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');if (count($_from)):
    foreach ($_from AS $this->_var['cat']):
?>
        <dl class='item_hd'>
          <dt><a href="<?php echo $this->_var['cat']['url']; ?>"><?php echo htmlspecialchars($this->_var['cat']['name']); ?></a></dt>
          <dd><?php $_from = $this->_var['cat']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');if (count($_from)):
    foreach ($_from AS $this->_var['child']):
?><a href="<?php echo $this->_var['child']['url']; ?>"><?php echo htmlspecialchars($this->_var['child']['name']); ?></a><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></dd>
        </dl>
	  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
      </div>
    </div>
    <div class="nav_bd">
      <ul>
        <li><a href="./index.php"><?php echo $this->_var['lang']['home']; ?></a></li>
		<?php $_from = $this->_var['navigator_list']['middle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');$this->_foreach['nav_middle_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_middle_list']['total'] > 0):
    foreach ($_from AS $this->_var['nav']):
        $this->_foreach['nav_middle_list']['iteration']++;
?>
        <li><a href="<?php echo $this->_var['nav']['url']; ?>" <?php if ($this->_var['nav']['opennew'] == 1): ?>target="_blank" <?php endif; ?> ><?php echo $this->_var['nav']['name']; ?></a></li>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </ul>
    </div>
    <div class="cart_bd">
      <div class="cart_bd1" id="TECHAN_MEMBERCART"><?php 
$k = array (
  'name' => 'cart_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></div>
    </div>
  </div>
  <?php endif; ?>
</div>