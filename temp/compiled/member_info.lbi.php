<div id="append_parent"></div>
<?php if ($this->_var['user_info']): ?>
<li class="fore5"><a href="help.php" target="_blank">帮助中心</a></li>
<li class="mainrno"><a href="user.php?act=order_list">我的特产</a></li>
<li class="mainrno"><a href="user.php?act=order_list">我的订单</a></li>
<li class="mainrno"><a href="user.php?act=logout">退出</a></li>
<li>您好，<?php echo $this->_var['user_info']['username']; ?>！</li>
<?php else: ?>
<li class="join"><a href="user.php?act=register" >免费注册</a></li>
<li><a href="user.php" >登录</a></li>
<?php endif; ?>