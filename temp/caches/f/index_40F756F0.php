<?php exit;?>a:3:{s:8:"template";a:6:{i:0;s:35:"E:/me/yii/themes/newtemps/index.dwt";i:1;s:49:"E:/me/yii/themes/newtemps/library/page_header.lbi";i:2;s:50:"E:/me/yii/themes/newtemps/library/cat_articles.lbi";i:3;s:42:"E:/me/yii/themes/newtemps/library/help.lbi";i:4;s:49:"E:/me/yii/themes/newtemps/library/page_footer.lbi";i:5;s:50:"E:/me/yii/themes/newtemps/library/page_service.lbi";}s:7:"expires";i:1459473104;s:8:"maketime";i:1459473104;}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>特产商城演示站</title>
<meta name="Keywords" content="特产商城演示站" />
<meta name="Description" content="特产商城演示站" />
<link type="text/css" rel="stylesheet" href="static/css/global.css" />
<link type="text/css" rel="stylesheet" href="static/css/1200.css" />
<link type="text/css" rel="stylesheet" href="static/css/index.css" />
<script type="text/javascript">var process_request = "正在处理您的请求...";</script>
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
        <li class="sidebar"><a href="javascript:void(0);" target="_self" onclick="javascript:try{window.external.AddFavorite(window.location.href, document.title);} catch(e){(window.sidebar)?window.sidebar.addPanel(document.title,window.location.href,''):alert('请使用按键 Ctrl+d，特产商城');}" title="收藏特产商城"></a></li>
        <li class="tweibo"><a href="#" target="_blank"></a></li>
        <li class="weibo"><a href="#" target="_blank"></a></li>
        <li class="weixi" onmouseout="this.className='weixi'" onmouseover="this.className='weixi hover'">
          <div class="weixi1">
            <div class="weixipic"> <img src="static/images/weixiPic.png" />
              <p>微信扫描二维码，随时随地与特产商城亲密接触，精彩活动、劲爆优惠触手可得！</p>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <ul class="topMainR" id="TECHAN_MEMBERZONE">554fcae493e564ee0dc75bdf2ebf94camember_info|a:1:{s:4:"name";s:11:"member_info";}554fcae493e564ee0dc75bdf2ebf94ca</ul>
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
            alert("请输入搜索关键词！");
            return false;
        }
    }
    -->
    
    </script>	  
	<form id="searchForm" name="searchForm" method="get" action="search.php" onSubmit="return checkSearchForm()" class="f_r" style="_position:relative; top:5px;">
	  <input name="keywords" type="text" id="keyword" value="" class="searchInputT"/>
	  <input type="submit" value=" " class="searchBtn" style="cursor:pointer;" />
	  <input name="category" type="hidden" id="category" value="0" />
	</form>	  
    </div>
    <div class="tel400"><img src="static/images/400.gif"></div>
  </div>
    <div class="Navigation main margin">
    <div class="menu" id="category_container">
      <h3>所有特产分类<span></span></h3>
      <div class="cate_bd">
	   
      </div>
    </div>
    <div class="nav_bd">
      <ul>
        <li><a href="./index.php">首页</a></li>
		      </ul>
    </div>
    <div class="cart_bd">
      <div class="cart_bd1" id="TECHAN_MEMBERCART">554fcae493e564ee0dc75bdf2ebf94cacart_info|a:1:{s:4:"name";s:9:"cart_info";}554fcae493e564ee0dc75bdf2ebf94ca</div>
    </div>
  </div>
  </div><div class="mfpSlide">
  <div class="slideBox main ">
    554fcae493e564ee0dc75bdf2ebf94cagetlist_ads|a:3:{s:4:"name";s:11:"getlist_ads";s:2:"id";s:1:"1";s:3:"num";s:1:"5";}554fcae493e564ee0dc75bdf2ebf94ca  </div>
</div>
<div class="main  margin clearfix">
  <div class="indexLeft">
    <div class="indexLeftYY"></div>
    <div class="Panicbuying">554fcae493e564ee0dc75bdf2ebf94caads|a:3:{s:4:"name";s:3:"ads";s:2:"id";s:1:"2";s:3:"num";s:1:"1";}554fcae493e564ee0dc75bdf2ebf94ca</div>
    <div class="Announcement">
      <div class="AnnouncementTitle"><span class="cur">最新订单</span><span>公告</span></div>
      <div class="announcementC" style="display:block">
        <div class="TheyareBuyingC">
          <ul>
		            </ul>
        </div>
      </div>
      <div class="announcementC">
        <ul class="AnnouncementList">
		
        </ul>
      </div>
    </div>
  </div>
  <div class="indexRight">
    <div class="mod_day">
      <h4>活动推荐</h4>
    </div>
    <div class="slideTxtBox">
      554fcae493e564ee0dc75bdf2ebf94cagetlist_ads2|a:3:{s:4:"name";s:12:"getlist_ads2";s:2:"id";s:1:"3";s:3:"num";s:1:"4";}554fcae493e564ee0dc75bdf2ebf94ca    </div>
  </div>
</div>
<script type="text/javascript">
jQuery(".slideBox").slide( {mainCell:".bd ul",effect:"top",autoPlay:true,interTime:8000});
</script>
<div class="main margin">
  <div class="mainTitle">
    554fcae493e564ee0dc75bdf2ebf94caget_catlist|a:2:{s:4:"name";s:11:"get_catlist";s:2:"id";s:1:"1";}554fcae493e564ee0dc75bdf2ebf94ca  </div>
  <div class="floor_bd clearfix">
    <div class="indexLeft">
      <div class="indexLeftYY"></div>
      <p>554fcae493e564ee0dc75bdf2ebf94caads|a:3:{s:4:"name";s:3:"ads";s:2:"id";s:1:"4";s:3:"num";s:1:"1";}554fcae493e564ee0dc75bdf2ebf94ca</p>
      <ul class="clearfix">
         554fcae493e564ee0dc75bdf2ebf94caget_cat_brands|a:2:{s:4:"name";s:14:"get_cat_brands";s:2:"id";s:1:"1";}554fcae493e564ee0dc75bdf2ebf94ca      </ul>
    </div>
    <div class="indexRight">
      <ul class="clearfix">
        554fcae493e564ee0dc75bdf2ebf94caget_category_goodslist|a:3:{s:4:"name";s:22:"get_category_goodslist";s:2:"id";s:1:"1";s:3:"num";s:1:"8";}554fcae493e564ee0dc75bdf2ebf94ca      </ul>
      <div class="SalesRank">
        <div class="SalesRankTitle">热销排行</div>
        554fcae493e564ee0dc75bdf2ebf94caget_top3|a:2:{s:4:"name";s:8:"get_top3";s:2:"id";s:1:"1";}554fcae493e564ee0dc75bdf2ebf94ca        <div class="SalesRankAd">554fcae493e564ee0dc75bdf2ebf94caads|a:3:{s:4:"name";s:3:"ads";s:2:"id";s:1:"5";s:3:"num";s:1:"1";}554fcae493e564ee0dc75bdf2ebf94ca</div>
        <div class="SalesRankAd1">554fcae493e564ee0dc75bdf2ebf94caads|a:3:{s:4:"name";s:3:"ads";s:2:"id";s:1:"6";s:3:"num";s:1:"1";}554fcae493e564ee0dc75bdf2ebf94ca</div>
      </div>
    </div>
  </div>
</div>
<div class="main  margin">
  <div class="mainTitle">
    554fcae493e564ee0dc75bdf2ebf94caget_catlist|a:2:{s:4:"name";s:11:"get_catlist";s:2:"id";s:1:"6";}554fcae493e564ee0dc75bdf2ebf94ca  </div>
  <div class="floor_bd clearfix">
    <div class="indexLeft">
      <div class="indexLeftYY"></div>
      <p>554fcae493e564ee0dc75bdf2ebf94caads|a:3:{s:4:"name";s:3:"ads";s:2:"id";s:1:"7";s:3:"num";s:1:"1";}554fcae493e564ee0dc75bdf2ebf94ca</p>
      <ul class="clearfix">
        554fcae493e564ee0dc75bdf2ebf94caget_cat_brands|a:2:{s:4:"name";s:14:"get_cat_brands";s:2:"id";s:1:"6";}554fcae493e564ee0dc75bdf2ebf94ca      </ul>
    </div>
    <div class="indexRight">
      <ul class="clearfix">
       554fcae493e564ee0dc75bdf2ebf94caget_category_goodslist|a:3:{s:4:"name";s:22:"get_category_goodslist";s:2:"id";s:1:"6";s:3:"num";s:1:"8";}554fcae493e564ee0dc75bdf2ebf94ca      </ul>
      <div class="SalesRank">
        <div class="SalesRankTitle">热销排行</div>
        554fcae493e564ee0dc75bdf2ebf94caget_top3|a:2:{s:4:"name";s:8:"get_top3";s:2:"id";s:1:"6";}554fcae493e564ee0dc75bdf2ebf94ca        <div class="SalesRankAd">554fcae493e564ee0dc75bdf2ebf94caads|a:3:{s:4:"name";s:3:"ads";s:2:"id";s:1:"8";s:3:"num";s:1:"1";}554fcae493e564ee0dc75bdf2ebf94ca</div>
        <div class="SalesRankAd1">554fcae493e564ee0dc75bdf2ebf94caads|a:3:{s:4:"name";s:3:"ads";s:2:"id";s:1:"9";s:3:"num";s:1:"1";}554fcae493e564ee0dc75bdf2ebf94ca</div>
      </div>
    </div>
  </div>
</div>
<div class="main  margin">
  <div class="mainTitle">
    554fcae493e564ee0dc75bdf2ebf94caget_catlist|a:2:{s:4:"name";s:11:"get_catlist";s:2:"id";s:2:"12";}554fcae493e564ee0dc75bdf2ebf94ca  </div>
  <div class="floor_bd clearfix">
    <div class="indexLeft">
      <div class="indexLeftYY"></div>
      <p>554fcae493e564ee0dc75bdf2ebf94caads|a:3:{s:4:"name";s:3:"ads";s:2:"id";s:2:"10";s:3:"num";s:1:"1";}554fcae493e564ee0dc75bdf2ebf94ca</p>
      <ul class="clearfix">
        554fcae493e564ee0dc75bdf2ebf94caget_cat_brands|a:2:{s:4:"name";s:14:"get_cat_brands";s:2:"id";s:2:"12";}554fcae493e564ee0dc75bdf2ebf94ca      </ul>
    </div>
    <div class="indexRight">
      <ul class="clearfix">
         554fcae493e564ee0dc75bdf2ebf94caget_category_goodslist|a:3:{s:4:"name";s:22:"get_category_goodslist";s:2:"id";s:2:"12";s:3:"num";s:1:"8";}554fcae493e564ee0dc75bdf2ebf94ca      </ul>
      <div class="SalesRank">
        <div class="SalesRankTitle">热销排行</div>
        554fcae493e564ee0dc75bdf2ebf94caget_top3|a:2:{s:4:"name";s:8:"get_top3";s:2:"id";s:2:"12";}554fcae493e564ee0dc75bdf2ebf94ca        <div class="SalesRankAd">554fcae493e564ee0dc75bdf2ebf94caads|a:3:{s:4:"name";s:3:"ads";s:2:"id";s:2:"11";s:3:"num";s:1:"1";}554fcae493e564ee0dc75bdf2ebf94ca</div>
        <div class="SalesRankAd1">554fcae493e564ee0dc75bdf2ebf94caads|a:3:{s:4:"name";s:3:"ads";s:2:"id";s:2:"12";s:3:"num";s:1:"1";}554fcae493e564ee0dc75bdf2ebf94ca</div>
      </div>
    </div>
  </div>
</div>
<div class="main  margin">
  <div class="mainTitle">
     554fcae493e564ee0dc75bdf2ebf94caget_catlist|a:2:{s:4:"name";s:11:"get_catlist";s:2:"id";s:2:"16";}554fcae493e564ee0dc75bdf2ebf94ca  </div>
  <div class="floor_bd clearfix">
    <div class="indexLeft">
      <div class="indexLeftYY"></div>
      <p>554fcae493e564ee0dc75bdf2ebf94caads|a:3:{s:4:"name";s:3:"ads";s:2:"id";s:2:"13";s:3:"num";s:1:"1";}554fcae493e564ee0dc75bdf2ebf94ca</p>
      <ul class="clearfix">
        554fcae493e564ee0dc75bdf2ebf94caget_cat_brands|a:2:{s:4:"name";s:14:"get_cat_brands";s:2:"id";s:2:"16";}554fcae493e564ee0dc75bdf2ebf94ca      </ul>
    </div>
    <div class="indexRight">
      <ul class="clearfix">
        554fcae493e564ee0dc75bdf2ebf94caget_category_goodslist|a:3:{s:4:"name";s:22:"get_category_goodslist";s:2:"id";s:2:"16";s:3:"num";s:1:"8";}554fcae493e564ee0dc75bdf2ebf94ca      </ul>
      <div class="SalesRank">
        <div class="SalesRankTitle">热销排行</div>
        554fcae493e564ee0dc75bdf2ebf94caget_top3|a:2:{s:4:"name";s:8:"get_top3";s:2:"id";s:2:"16";}554fcae493e564ee0dc75bdf2ebf94ca        <div class="SalesRankAd">554fcae493e564ee0dc75bdf2ebf94caads|a:3:{s:4:"name";s:3:"ads";s:2:"id";s:2:"14";s:3:"num";s:1:"1";}554fcae493e564ee0dc75bdf2ebf94ca</div>
        <div class="SalesRankAd1">554fcae493e564ee0dc75bdf2ebf94caads|a:3:{s:4:"name";s:3:"ads";s:2:"id";s:2:"15";s:3:"num";s:1:"1";}554fcae493e564ee0dc75bdf2ebf94ca</div>
      </div>
    </div>
  </div>
</div>
<div class="main  margin">
  <div class="mainTitle">
     554fcae493e564ee0dc75bdf2ebf94caget_catlist|a:2:{s:4:"name";s:11:"get_catlist";s:2:"id";s:2:"17";}554fcae493e564ee0dc75bdf2ebf94ca  </div>
  <div class="floor_bd clearfix">
    <div class="indexLeft">
      <div class="indexLeftYY"></div>
      <p>554fcae493e564ee0dc75bdf2ebf94caads|a:3:{s:4:"name";s:3:"ads";s:2:"id";s:2:"16";s:3:"num";s:1:"1";}554fcae493e564ee0dc75bdf2ebf94ca</p>
      <ul class="clearfix">
        554fcae493e564ee0dc75bdf2ebf94caget_cat_brands|a:2:{s:4:"name";s:14:"get_cat_brands";s:2:"id";s:2:"17";}554fcae493e564ee0dc75bdf2ebf94ca      </ul>
    </div>
    <div class="indexRight">
      <ul class="clearfix">
        554fcae493e564ee0dc75bdf2ebf94caget_category_goodslist|a:3:{s:4:"name";s:22:"get_category_goodslist";s:2:"id";s:2:"17";s:3:"num";s:1:"8";}554fcae493e564ee0dc75bdf2ebf94ca      </ul>
      <div class="SalesRank">
        <div class="SalesRankTitle">热销排行</div>
        554fcae493e564ee0dc75bdf2ebf94caget_top3|a:2:{s:4:"name";s:8:"get_top3";s:2:"id";s:2:"17";}554fcae493e564ee0dc75bdf2ebf94ca        <div class="SalesRankAd">554fcae493e564ee0dc75bdf2ebf94caads|a:3:{s:4:"name";s:3:"ads";s:2:"id";s:2:"17";s:3:"num";s:1:"1";}554fcae493e564ee0dc75bdf2ebf94ca</div>
        <div class="SalesRankAd1">554fcae493e564ee0dc75bdf2ebf94caads|a:3:{s:4:"name";s:3:"ads";s:2:"id";s:2:"18";s:3:"num";s:1:"1";}554fcae493e564ee0dc75bdf2ebf94ca</div>
      </div>
    </div>
  </div>
</div>
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
 <div class="weibo">
    <a href="#" target="_blank"><img src="static/images/weibo.jpg" /></a>
    <a href="#" target="_blank"><img src="static/images/tweibo.jpg" /></a>
  </div>
</div><div class="footerlink">
  <div class="main"> <b>友情链接：</b>
    <ul>
      <li>
            <a href="http://www.maifou.net/" target="_blank" title="买否网">买否网</a>
        <a href="http://www.wdwd.com/" target="_blank" title="免费开独立网店">免费开独立网店</a>
         </li>
    </ul>
  </div>
</div>
<div class="bottom">
  <p> &copy; 2005-2016 特产商城 版权所有，并保留所有权利。 </p>
  <p>
  <a href="https://ss.knet.cn/" target="_blank" rel="nofollow"><img src="static/images/footerico2.jpg"></a>
  <a href="http://www.szaic.gov.cn/" target="_blank" rel="nofollow"><img src="static/images/footerico1.jpg" /></a>
  <a href="http://szgabm.qq.com/" target="_blank" rel="nofollow"><img src="static/images/footerico3.jpg" /></a>
  <a href="http://www.sznet110.gov.cn/netalarm/index.jsp" target="_blank" rel="nofollow"><img src="static/images/footerico4.jpg" /></a>
  </p>
</div><script type="text/javascript" src="static/js/footer.js"></script>
<div class="fixedBox">
  <ul class="fixedBoxList">
    <li class="fixeBoxLi cart_bd" style="display:block;" id="cartboxs">
		554fcae493e564ee0dc75bdf2ebf94caget_cart_list|a:1:{s:4:"name";s:13:"get_cart_list";}554fcae493e564ee0dc75bdf2ebf94ca    </li>
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
</div></body>
</html>
