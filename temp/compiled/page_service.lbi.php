<script type="text/javascript" src="static/js/footer.js"></script>
<div class="fixedBox">
  <ul class="fixedBoxList">
    <li class="fixeBoxLi cart_bd" style="display:block;" id="cartboxs">
		<?php 
$k = array (
  'name' => 'get_cart_list',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
    </li>
    <li class="fixeBoxLi Service"> <span class="fixeBoxSpan"></span> <strong>在线客服</strong>
      <div class="ServiceBox">
        <div class="bjfff"></div>
        <dl onclick="javascript:;">
          <dt><img src="static/images/Service1.jpg" /></dt>
          <dd> <strong>在线QQ客服</strong>
            <p class="p1">9:00-22:00</p>
            <p class="p2"><a href="javascript:;">点击交谈</a></p>
          </dd>
        </dl>
        <dl onclick="NTKF.im_openInPageChat('kf_10103_1368001605031')">
          <dt><img src="static/images/Service2.jpg" /></dt>
          <dd> <strong>网页在线客服</strong>
            <p class="p1">9:00-22:00</p>
            <p class="p2"><a href="javascript:;">点击交谈</a></p>
          </dd>
        </dl>
      </div>
    </li>
    <li class="fixeBoxLi Home"> <a href="./"> <span class="fixeBoxSpan"></span> <strong>返回首页</strong> </a> </li>
    <li class="fixeBoxLi BackToTop"> <span class="fixeBoxSpan"></span> <strong>返回顶部</strong> </li>
  </ul>
</div>