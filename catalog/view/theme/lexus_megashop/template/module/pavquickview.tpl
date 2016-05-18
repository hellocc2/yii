<?php $id = rand(); ?>
<script type="text/javascript"><!--
var pavHref = "<a class=\"pav-colorbox\" href=\"#\" style=\"display:block;\"><span class='fa fa-eye'></span><?php echo $this->language->get('quick_view'); ?></a>";
var baseUrl = "<?php echo $base; ?>";
$(document).ready(function() {
	pav_quick_view();
	// when change display layout (grid or list)
	$('.display').bind('click', function() {
		pav_quick_view();
	});
});

function pav_quick_view(){
	
	$('<?php echo $image_selector; ?>').append(pavHref);/*Append <a> tag in the block <div class="image"> for all on current page*/
	
	var quickshop_icon = $('.pav-colorbox');

		$('.pav-colorbox').each(function(index, value)
		{
			var id_product="";
			var reloadurl="";
			var current_quickview = this;
			var parent_block = $(this).parent();
			/*find <a> in the <div class="image"> then get product link of first tag*/
			if($("a",parent_block).first().attr('href')){
				var href_pro = $("a",parent_block).first().attr('href'); 
			}else{ 
				var href_pro = '';
			}
			if	(href_pro){
				var check=href_pro.match("index.php"); 
			}
			var last_index = '';
			if(check=="index.php"){	 //direct link
				var str = href_pro.split("&");
				for (var i=0;i<str.length;i++){
					if(str[i].match("product_id=") =="product_id="){
						//have limit sort des in url
						//site/index.php?route=product/product&path=35&product_id=25
						//site/index.php?route=product/product&product_id=28
						last_index = str[i];
						break;
					}
				}
				reloadurl= baseUrl+"index.php?route=pavquickview/product&"+last_index;
			}else{	//mode SEO
					var check_seo = href_pro.match("product_id=");
					if(check_seo=="product_id="){
					//site/desktops?product_id=47&sort=p.price&order=DESC&limit=100
					//site/desktops/mac?product_id=41&limit=100
					//site/desktops/mac?product_id=41
						var str = href_pro.split("&");
						for (var i=0; i<str.length; i++){
							if(str[i].match("product_id=") == "product_id="){
								var temp = str[i].split("?");
								last_index = temp[temp.length-1];
								break;
							}
						}
						reloadurl=baseUrl+"index.php?route=pavquickview/product&"+last_index;
					}else{
					//site/desktops/ipod_classic?sort=p.model&order=DESC&limit=100
					//site/desktops/test?sort=p.price&order=DESC&limit=100
					//site/ipod_classic
						var str_1 = href_pro.split("/");
						var str_2 = str_1[str_1.length-1]; 
						var temp = str_2.split("?");
						last_index = temp[0];
						var id_index = getProducIdFromURI(last_index);
						reloadurl=baseUrl+"index.php?route=pavquickview/product&"+id_index;
					}
				}

			$(this).attr('href',reloadurl);

			$("img", parent_block).hover(function () {			
				$(current_quickview).show();
				
			}, function () {
				$(current_quickview).hide();
			});
			
			 //fix bug image disapper when hover
			$(this).bind('mouseover', function() {
				$(this).show();
			}).bind('click', function() {
				$(this).hide();
			});
	   });
	$('.pav-colorbox').colorbox({
		width: '<?php echo $popup_width; ?>', 
		height: '<?php echo $popup_height; ?>',
		overlayClose: true,
		opacity: 0.5,
		title:'<?php echo $module_title; ?>',
		iframe: true
	});
}

function getProducIdFromURI(seo){
	var uri_query = "";
	$.ajax({
		url: 'index.php?route=module/pavquickview/getProducIdFromURI',
		type: 'post',
		data: 'keyword=' + seo,
		dataType: 'json',
		success: function(json) {
			uri_query = json['success'];
		},
		async: false
	});
	return uri_query;
}
//--></script> 