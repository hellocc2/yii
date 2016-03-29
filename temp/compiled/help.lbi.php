<div class="main">
  <div class="J_DcFt">
    <dl class="text_1">
      <dt></dt>
      <dd>
        <p class="ccc">购物保障</p>
        <p class="t">非质量问题的退货，请在收到宝贝后七天内联系客服，如属质量问题本商城承担运费。</p>
      </dd>
    </dl>
    <dl class="text_2">
      <dt></dt>
      <dd>
        <p class="ccc">关于快递</p>
        <p class="t">我们默认使用普通快递，如发其它快递、EMS，请联系我们在线客服！</p>
      </dd>
    </dl>
    <dl class="text_3">
      <dt></dt>
      <dd>
        <p class="ccc">关于发货</p>
        <p class="t">每日下午5:00以前的顾客，均可以当天发货，5:00以后的顾客，次日发货。</p>
      </dd>
    </dl>
    <dl class="text_4">
      <dt></dt>
      <dd>
        <p class="ccc">色差说明</p>
        <p class="t">本商城所有商品均属实物拍摄，尽最大可能接近实物色彩，色彩偏差异较严格者仔细考量！</p>
      </dd>
    </dl>
  </div>
</div>
<div class="footer">
  <ul>
    <li class="footer1">100%原产地发货</li>
    <li class="footer2">严筛精选 品质保证</li>
    <li class="footer3">全网最低价 为您省钱</li>
    <li class="footer4">专业物流 快速安全</li>
  </ul>
</div>
<div class="footmain clearfix">
<?php if ($this->_var['helps']): ?>
<?php $_from = $this->_var['helps']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'help_cat');if (count($_from)):
    foreach ($_from AS $this->_var['help_cat']):
?>  <dl>
    <dt><?php echo $this->_var['help_cat']['cat_name']; ?></dt>
    <dd>
	<?php $_from = $this->_var['help_cat']['article']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
      <p><a href="<?php echo $this->_var['item']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['item']['title']); ?>"><?php echo $this->_var['item']['short_title']; ?></a></p>
	 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </dd>
  </dl>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<?php endif; ?>
 <div class="weibo">
    <a href="#" target="_blank"><img src="static/images/weibo.jpg" /></a>
    <a href="#" target="_blank"><img src="static/images/tweibo.jpg" /></a>
  </div>
</div>