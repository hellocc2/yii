$(function(){
  var footerlink = $('.footerlink ul li').length;
  if(footerlink>1){
	$(".footerlink").addClass("footerlinkC")
  };
  $("#category_container").hover(
    function(){
	  $(".cate_bd").stop().animate({
	    height:'525px'
	  }, 200)
	},
	function(){
	  $(".cate_bd").stop().animate({
	    height:'325px'
	  },200);
	}
  );
  $("#category_container .item_hd").hover(
    function(){
	  $(this).find('dd').stop().animate({
		height:'50px'
	  }, 200);
	  $(".cate_bd").stop().animate({
	    height:'550px'
	  }, 200);
	},
	function(){
	  $(this).find('dd').stop().animate({
		height:'25px'
	  }, 200);
	  $(".cate_bd").stop().animate({
	    height:'525px'
	  }, 200)
	}
  );
  $("#category_container dl").hover(
    function(){
	  $(this).css('background','#222');
	},
	function(){
	  $(this).css('background','');
	}
  );
  
  $('.mainTitle').each(function(index, element){
    $(element).addClass('f'+(index+1));
  });
  $('.floor_bd .indexLeft').each(function(index, element){
    $(element).addClass('f'+(index+1));
  });
  $('.SalesRank').each(function(index, element){
    $(element).addClass('f'+(index+1));
  });
  $('.slideTxtBox .hd ul').find('li').hover(function(){
    $('.slideTxtBox .hd ul').find('li').removeClass('on');
    $('.slideTxtBox .bd ul').css({display:'none'});
    $(this).addClass('on');
    $('.slideTxtBox .bd ul').eq($(this).index()).css({display:'block'});
  });
  
  $('.AnnouncementTitle').find('span').click(function(){
    $('.AnnouncementTitle').find('span').removeClass('cur');
    $('.announcementC').css({display:'none'});
    $(this).addClass('cur');
    $('.announcementC').eq($(this).index()).css({display:'block'});
  });
});


function AutoScroll1(obj) {
	$(obj).find("ul:first").animate({
		top: "-45px"
	}, 500, function() {
		$(this).css({top: "0px"}).find("li:first").appendTo(this);
	});
}
$(document).ready(function() {
	var myar = setInterval('AutoScroll1(".TheyareBuyingC")', 3000)
	$(".TheyareBuyingC").hover(function() {clearInterval(myar);}, function() {myar = setInterval('AutoScroll1(".TheyareBuyingC")', 3000)});
});

function footerlink(obj) {
	$(obj).find("ul:first").animate({
		top: "-23px"
	}, 500, function() {
		$(this).css({top: "0px"}).find("li:first").appendTo(this);
	});
}
$(document).ready(function() {
	var myar = setInterval('footerlink(".footerlinkC")', 3000)
	$(".footerlinkC").hover(function() {clearInterval(myar);}, function() {myar = setInterval('footerlink(".footerlinkC")', 8000)});
});

$(document).ready(function(){
jQuery(function(){
  jQuery(".indexmax .Btn").click(function(){
    jQuery('.indexmax').slideUp(500);
    jQuery('.indexmin').slideDown(500);
  });
  jQuery(".indexmin .Btn").click(function(){
    jQuery('.indexmin').slideUp(500);
    jQuery('.indexmax').slideDown(500);
  });
});
setTimeout(function(){
  jQuery('.indexmin').slideUp(500);
  jQuery('.indexmax').slideDown(500);
},500);
setTimeout(function(){
  jQuery('.indexmax').slideUp(500);
  jQuery('.indexmin').slideDown(500);
},3500);
});